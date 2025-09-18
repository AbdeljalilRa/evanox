<?php

namespace App\Http\Controllers;

use App\Models\AccessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AccessRequestController extends Controller
{
    /**
     * Store a new access request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        try {
            // Check if email already exists
            $existingRequest = AccessRequest::where('email', $request->email)->first();
            
            if ($existingRequest) {
                if ($existingRequest->is_approved) {
                    return response()->json([
                        'success' => false,
                        'message' => 'You already have access. Check your email for the password.'
                    ], 400);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Your access request is pending approval.'
                    ], 400);
                }
            }

            // Create new access request
            AccessRequest::create([
                'email' => $request->email,
                'is_approved' => false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Access request submitted successfully. You will be notified once approved.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again.'
            ], 500);
        }
    }

    /**
     * Show all access requests for admin.
     */
    public function index()
    {
        $accessRequests = AccessRequest::latest()->paginate(20);
        return view('admin.access-requests.index', compact('accessRequests'));
    }

    /**
     * Approve an access request and send password to user.
     */
    public function approve(AccessRequest $accessRequest)
    {
        try {
            // Generate a random password
            $password = Str::random(12);

            // Update the access request
            $accessRequest->update([
                'is_approved' => true,
                'password' => $password,
            ]);

            // Send email with password (for now, we'll just log it)
            // In a real application, you would send an email
            \Log::info("Access approved for {$accessRequest->email} with password: {$password}");

            return redirect()->back()->with('success', 'Access request approved and password sent to user.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to approve access request.');
        }
    }

    /**
     * Verify password for store access.
     */
    public function verifyPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $accessRequest = AccessRequest::approved()
            ->where('password', $request->password)
            ->first();

        if ($accessRequest) {
            // Store password in session for access
            session(['store_access_password' => $request->password]);
            
            return response()->json([
                'success' => true,
                'message' => 'Access granted. Redirecting to store...'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid password. Please try again.'
        ], 400);
    }
}