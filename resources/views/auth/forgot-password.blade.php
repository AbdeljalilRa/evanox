@extends('layouts.auth')

@section('title', 'EVANOX - Forgot Password')

@section('content')
<h2 class="text-3xl font-bold text-center mb-6 font-montserrat">Forgot Password</h2>

<p class="mb-4 text-sm text-gray-600 text-center">
    No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
</p>

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

<form method="POST" action="{{ route('password.email') }}" class="space-y-6">
    @csrf

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
            class="mt-1 block w-full rounded-full px-6 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black">
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit" class="w-full bg-black text-white py-3 rounded-full font-semibold text-lg hover:bg-gray-900 transition-colors">
            Email Password Reset Link
        </button>
    </div>

    <p class="mt-6 text-center text-sm text-gray-600">
        Remembered your password? 
        <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Login</a>
    </p>
</form>
@endsection
