<?php

// app/Http/Controllers/Admin/StoreAccessRequestController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StoreAccessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        $items = StoreAccessRequest::whereIn('id', $requestIds)
            ->get();

        foreach ($items as $item) {

            // Generate safe 10-char password (hex)
            $plainPassword = bin2hex(random_bytes(5));

            // Save proper bcrypt hash and normalized email
            $item->update([
                'password' => Hash::make($plainPassword),
                'email' => strtolower(trim($item->email))
            ]);
            // Optional: log for debugging
            Log::info('store-access-password', [
                'id' => $item->id,
                'email' => $item->email,
                'plain' => $plainPassword
            ]);

            // Send email with exact plain password
            Mail::send('emails.access_password', [
                'email' => $item->email,
                'password' => $plainPassword,
            ], function ($message) use ($item) {
                $message->to($item->email)->subject('Your Store Access Password');
            });
        }

        return back()->with('success', 'Passwords sent successfully.');
    }


    public function destroy($id)
    {
        $request = StoreAccessRequest::findOrFail($id);
        $request->delete();

        return back()->with('success', 'Request deleted.');
    }
}
