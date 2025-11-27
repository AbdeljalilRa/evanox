@extends('layouts.auth')

@section('title', 'EVANOX - Login')

@section('content')
<h2 class="text-3xl font-bold text-center mb-6 font-montserrat">Login to EVANOX</h2>

<!-- Session Status -->
@if(session('status'))
    <div class="mb-4 text-green-500 text-sm text-center">
        {{ session('status') }}
    </div>
@endif

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

<form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" type="password" name="password" required
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Remember Me & Forgot Password -->
    <div class="flex items-center justify-between mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-black shadow-sm focus:ring-black">
            <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>

        @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:underline">Forgot your password?</a>
        @endif
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit" class="w-full bg-black text-white py-3 rounded-full font-semibold text-lg hover:bg-gray-900 transition-colors">
            Log in
        </button>
    </div>

    <p class="mt-6 text-center text-sm text-gray-600">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-black font-semibold hover:underline">Register</a>
    </p>
</form>
@endsection
