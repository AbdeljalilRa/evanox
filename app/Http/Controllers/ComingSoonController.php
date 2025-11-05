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

    // إدخال password للدخول
    public function enter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = strtolower($request->email);
        $access = StoreAccessRequest::whereRaw('LOWER(email) = ?', [$email])->first();

        if (!$access) {
            return back()->withErrors(['email' => 'Email not found. Please sign up first.']);
        }

        if (empty($access->password)) {
            return back()->withErrors(['password' => 'No password set for this email. Please sign up again.']);
        }

        // debug مؤقت باش نشوف القيم
        if (!Hash::check($request->password, $access->password)) {
            return back()->withErrors(['password' => 'Invalid password. Please check your email for the correct password.']);
        }

        // نجاح
        session([
            'store_access' => true,
            'user_email' => $access->email,
            'store_access_time' => now()
        ]);

        $access->last_login_at = now();
        $access->save();

        return redirect('/')->with('success', 'Welcome back!');
    }
}
