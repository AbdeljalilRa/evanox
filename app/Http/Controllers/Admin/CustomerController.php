<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    // List all customers
    public function index(): View
    {
        $users = User::paginate(10);
        return view('admin.customers.index', compact('users'));
    }

    // Show create form
    public function create(): View
    {
        return view('admin.customers.create');
    }

    // Store new user
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,customer',
            'telephone' => 'nullable|string|max:255',
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['slug'] = Str::slug($data['name'] . '-' . time());
        User::create($data);

        return redirect()->route('admin.customers.index')->with('success', 'User created successfully.');
    }

    // Show customer details
    public function show(User $customer): View
    {
        return view('admin.customers.show', compact('customer'));
    }

    // Show edit form
    public function edit(User $customer): View
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // Update customer
    public function update(Request $request, User $customer): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $customer->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:customer,admin',
            'telephone' => 'nullable|string|max:255',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        // Update slug if name changed
        if ($customer->name !== $data['name']) {
            $data['slug'] = Str::slug($data['name'] . '-' . time());
        }
        
        $customer->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated!');
    }

    // Delete customer
    public function destroy(User $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'User deleted successfully.');
    }
}
