<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreAccessRequest;
use Illuminate\Support\Facades\Session;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view('store.coming-soon');
    }

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

     // save email
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

    // check password
    public function enter(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        // password khass yji mn settings table
        $password = config('store.password', 'evanox123'); // fallback

        if ($request->password === $password) {
            Session::put('store_access', true);
            return redirect('/'); // redirect to main store
        }

        return back()->withErrors(['password' => 'Invalid password.']);
    }
}
