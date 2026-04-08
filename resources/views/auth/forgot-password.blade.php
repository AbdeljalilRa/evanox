@extends('layouts.auth')

@section('title', 'EVANOX - Forgot Password')

@section('content')
<!-- Header -->
<div class="text-center mb-4">
    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
        </svg>
    </div>
    <h2 class="text-2xl font-bold tracking-wide font-montserrat text-white">RESET PASSWORD</h2>
    <p class="text-gray-400 font-nunito mt-2 text-sm">
        Enter your email and we'll send you a reset link.
    </p>
</div>

<!-- Session Status -->
@if(session('status'))
    <div class="mb-3 p-2 rounded-xl bg-green-500/10 border border-green-500/20">
        <div class="flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p class="text-green-400 text-xs text-center font-nunito">{{ session('status') }}</p>
        </div>
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

<form method="POST" action="{{ route('password.email') }}" class="space-y-3">
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

    <!-- Submit Button -->
    <button type="submit" 
        class="btn-shine w-full bg-white text-black py-2.5 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] font-montserrat tracking-wide text-sm">
        SEND RESET LINK
    </button>

    <!-- Back to Login -->
    <p class="text-center text-gray-400 font-nunito text-sm">
        Remember your password? 
        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline transition-all">Sign in</a>
    </p>
</form>
@endsection
