<?php

// app/Http/Controllers/Admin/StoreAccessRequestController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StoreAccessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StoreAccessRequestController extends Controller
{
    public function index()
    {
        $requests = StoreAccessRequest::latest()->paginate(10);
        return view('admin.access_requests.index', compact('requests'));
    }

   public function sendPassword($id)
{
    $request = StoreAccessRequest::findOrFail($id);

    // Generate random password
    $rawPassword = Str::random(10);

    // Store hashed password in DB
    $request->update([
        'password' => Hash::make($rawPassword)
    ]);

    // Send raw password via email
    Mail::send('emails.access_password', [
        'email' => $request->email,
        'password' => $rawPassword
    ], function ($message) use ($request) {
        $message->to($request->email)
                ->subject('Your Store Access Password');
    });

    return back()->with('success', 'Password sent to ' . $request->email);
}

    public function bulkSendPassword(Request $request)
    {
        $requestIds = json_decode($request->request_ids);

        $requests = StoreAccessRequest::whereIn('id', $requestIds)
            ->whereNull('password')
            ->get();

        foreach ($requests as $request) {
            // Generate random password
            $password = Str::random(10);

            // Update request with hashed password
            $request->update([
                'password' => bcrypt($password)
            ]);

            // Send mail
            Mail::send('emails.access_password', [
                'email' => $request->email,
                'password' => $password
            ], function ($message) use ($request) {
                $message->to($request->email)->subject('Your Store Access Password');
            });
        }

        return back()->with('success', 'Passwords sent to selected users successfully.');
    }

    public function destroy($id)
    {
        $request = StoreAccessRequest::findOrFail($id);
        $request->delete();

        return back()->with('success', 'Request deleted.');
    }
}
