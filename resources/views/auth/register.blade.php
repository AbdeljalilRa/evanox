@extends('layouts.auth')

@section('title', 'EVANOX - Register')

@section('content')
<h2 class="text-3xl font-bold text-center mb-6 font-montserrat">Create Account</h2>

<!-- Validation Errors -->
@if($errors->any())
    <div class="mb-4 text-red-500 text-sm text-center">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}" class="space-y-6">
    @csrf

    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" type="password" name="password" required
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Confirm Password -->
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit" class="w-full bg-black text-white py-3 rounded-full font-semibold text-lg hover:bg-gray-900 transition-colors">
            Register
        </button>
    </div>

    <p class="mt-6 text-center text-sm text-gray-600">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Login</a>
    </p>
</form>
@endsection
