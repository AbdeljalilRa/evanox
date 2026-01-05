@extends('layouts.auth')

@section('title', 'EVANOX - Register')

@section('content')
<!-- Header -->
<div class="text-center mb-4">
    <h2 class="text-2xl font-bold tracking-wide font-montserrat text-white">JOIN EVANOX</h2>
</div>

<!-- Validation Errors -->
@if ($errors->any())
    <div class="mb-3 p-2 rounded-xl bg-red-500/10 border border-red-500/20">
        <ul class="text-red-400 text-xs text-center font-nunito">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}" class="space-y-3">
    @csrf

    <!-- Name & Phone Row -->
    <div class="flex gap-3">
        <!-- Name -->
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                placeholder="Full Name"
                class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
        </div>

        <!-- Phone -->
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <input id="telephone" type="text" name="telephone" value="{{ old('telephone') }}"
                placeholder="Phone (optional)"
                class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
        </div>
    </div>

    <!-- Email -->
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
            placeholder="Email Address"
            class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
    </div>

    <!-- Password Row -->
    <div class="flex gap-3">
        <!-- Password -->
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <input id="password" type="password" name="password" required
                placeholder="Password"
                class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
        </div>

        <!-- Confirm Password -->
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                placeholder="Confirm Password"
                class="w-full pl-10 pr-3 py-2.5 rounded-full bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:border-white/30 focus:bg-white/10 transition-all duration-300 font-nunito text-sm">
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit"
        class="btn-shine w-full bg-white text-black py-2.5 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] font-montserrat tracking-wide text-sm">
        CREATE ACCOUNT
    </button>

    <!-- Login Link -->
    <p class="text-center text-gray-400 font-nunito text-sm">
        Already have an account?
        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline transition-all">Sign in</a>
    </p>
</form>
@endsection
