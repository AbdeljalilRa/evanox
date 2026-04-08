@extends('layouts.auth')

@section('title', 'EVANOX - Login')

@section('content')
<!-- Header -->
<div class="text-center mb-4">
    <h2 class="text-2xl font-bold tracking-wide font-montserrat text-white">WELCOME BACK</h2>
</div>

<!-- Session Status -->
@if(session('status'))
    <div class="mb-3 p-2 rounded-xl bg-green-500/10 border border-green-500/20">
        <p class="text-green-400 text-xs text-center font-nunito">{{ session('status') }}</p>
    </div>
@endif

<!-- Validation Errors -->
@if($errors->any())
    <div class="mb-3 p-2 rounded-xl bg-red-500/10 border border-red-500/20">
        <ul class="text-red-400 text-xs text-center font-nunito">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-3">
    @csrf

    <!-- Email -->
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
            placeholder="Email Address"
            class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
    </div>

    <!-- Password -->
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>
        <input id="password" type="password" name="password" required
            placeholder="Password"
            class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
    </div>

    <!-- Remember Me & Forgot Password -->
    <div class="flex items-center justify-between px-1">
        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
            <div class="relative">
                <input id="remember_me" type="checkbox" name="remember" class="peer sr-only">
                <div class="w-4 h-4 rounded border border-white/20 bg-white/5 peer-checked:bg-white peer-checked:border-white transition-all duration-200"></div>
                <svg class="absolute top-0.5 left-0.5 w-3 h-3 text-black opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <span class="ml-2 text-xs text-gray-400 group-hover:text-gray-300 transition-colors font-nunito">Remember me</span>
        </label>

        @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-xs text-gray-400 hover:text-white transition-colors font-nunito">
                Forgot password?
            </a>
        @endif
    </div>

    <!-- Submit Button -->
    <button type="submit" 
        class="btn-shine w-full bg-white text-black py-2.5 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] font-montserrat tracking-wide text-sm">
        SIGN IN
    </button>

    <!-- Register Link -->
    <p class="text-center text-gray-400 font-nunito text-sm">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-white font-semibold hover:underline transition-all">Create one</a>
    </p>
</form>
@endsection
