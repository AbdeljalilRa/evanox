<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreAccessRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view('store.coming-soon');
    }

    // تسجيل الإيميل
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:store_access_requests,email',
        ]);

        StoreAccessRequest::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'You have been registered! We will contact you soon.');
    }

    // طلب access
    public function requestAccess(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:store_access_requests,email',
        ]);

        StoreAccessRequest::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Thanks! You will be notified when we launch.');
    }

   public function enter(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Normalize email and trim password
        $email = strtolower(trim($request->email));
        $plainPassword = trim($request->password);

        $access = StoreAccessRequest::where('email', $email)->first();

        if (!$access) {
            return back()->withErrors(['email' => 'Email not found. Please sign up first.']);
        }

        if (empty($access->password)) {
            return back()->withErrors(['password' => 'No password set for this email.']);
        }
       

        // Check password
        if (!Hash::check($plainPassword, $access->password)) {
            return back()->withErrors(['password' => 'Invalid password. Please re-check.']);
        }

        // Successful login
        session([
            'store_access' => true,
            'user_email' => $access->email,
            'store_access_time' => now()
        ]);

        $access->update([
            'last_login_at' => now(),
        ]);

        return redirect('/')->with('success', 'Welcome back!');
    }
}
