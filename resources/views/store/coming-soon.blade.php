@extends('layouts.store.blank')

@section('title', 'EVANOX - The Drop')

@section('content')
<!-- Coming Soon Sliding Banner -->
<div class="fixed top-0 left-0 w-full bg-black text-white py-3 z-50 overflow-hidden">
    <div class="flex whitespace-nowrap animate-marquee">
        @for ($i = 0; $i < 16; $i++)
            <span class="font-bold italic uppercase text-[14px] md:text-[20px] mx-6 md:mx-8" style="font-family: 'Montserrat', sans-serif;">COMING SOON</span>
        @endfor
    </div>
</div>

<div class="flex flex-col items-center justify-center min-h-screen bg-black pt-16 md:pt-20">

    <!-- Lamp + Logo -->
    <div class="relative mb-0">
        <div class="relative flex justify-center" style="z-index: 10;">
            <img src="{{ asset('images/LAMP.png') }}" alt="Lamp" class="w-[380px] md:w-[422px] h-auto">
        </div>
        <div class="absolute inset-0 flex items-center justify-center" style="z-index: 20;">
            <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-[132px] md:w-[146px] h-auto mt-4">
        </div>
    </div>

    <!-- Sign Up Section -->
    <div class="text-center -mt-8 md:-mt-12 w-full max-w-[412px] px-6 relative z-30">
        <h2 class="font-black uppercase text-[14px] md:text-[17px] text-white mb-4" style="font-family: 'Montserrat', sans-serif; letter-spacing: -0.34px;">
            SIGN UP FOR ACCESS
        </h2>

        @if(session('success'))
            <p class="text-green-400 mb-3">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <p class="text-red-400 mb-3">{{ $errors->first() }}</p>
        @endif

        <!-- Email Form -->
        <div id="emailOnlyForm" style="display: block;">
            <form method="POST" action="{{ route('comingsoon.request') }}" class="flex items-center bg-white rounded-[45px] h-[48px] md:h-[57px] overflow-hidden">
                @csrf
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                    class="flex-1 px-6 h-full bg-transparent text-black placeholder-[#5d5a5a] outline-none capitalize font-light text-[14px] md:text-[16px]"
                    style="font-family: 'Montserrat', sans-serif;"
                >
                <button
                    type="submit"
                    class="px-6 h-full font-bold italic uppercase text-[14px] md:text-[16px] text-black tracking-[1.44px]"
                    style="font-family: 'Montserrat', sans-serif;"
                >
                    JOIN
                </button>
            </form>
        </div>

        <!-- Toggle Password Button -->
        <button
            type="button"
            id="togglePasswordBtn"
            class="capitalize font-medium text-white text-[14px] md:text-[17px] tracking-[1.19px] mt-4 hover:opacity-75 transition-opacity"
            style="font-family: 'Montserrat', sans-serif;"
        >
            Enter Using Password
        </button>

        <!-- Password Form -->
        <div id="passwordForm" style="display: none;" class="mt-4">
            <form method="POST" action="{{ route('comingsoon.enter') }}" class="space-y-3">
                @csrf
                <input
                    type="email"
                    name="email"
                    placeholder="Enter your Email"
                    required
                    class="w-full px-6 py-3 rounded-[45px] bg-white text-black placeholder-[#5d5a5a] outline-none text-[14px] md:text-[16px]"
                    style="font-family: 'Montserrat', sans-serif;"
                >
                <input
                    type="password"
                    name="password"
                    placeholder="Enter Password"
                    required
                    class="w-full px-6 py-3 rounded-[45px] bg-white text-black placeholder-[#5d5a5a] outline-none text-[14px] md:text-[16px]"
                    style="font-family: 'Montserrat', sans-serif;"
                >
                <button
                    type="submit"
                    class="w-full px-6 py-3 bg-white text-black font-bold italic uppercase rounded-[45px] text-[14px] md:text-[16px] tracking-[1.44px] hover:bg-gray-100 transition"
                    style="font-family: 'Montserrat', sans-serif;"
                >
                    ENTER
                </button>
            </form>
        </div>
    </div>

    <!-- Social Media Icons -->
    <div class="flex justify-center items-center space-x-5 md:space-x-6 mt-4 mb-16 md:mb-20">
        <a href="#" class="hover:opacity-75 transition-opacity">
            <img src="{{ asset('assets/images/social/instagram.svg') }}" alt="Instagram" class="w-[19px] h-[19px] md:w-[22px] md:h-[22px]">
        </a>
        <a href="#" class="hover:opacity-75 transition-opacity">
            <img src="{{ asset('assets/images/social/whatsapp.svg') }}" alt="WhatsApp" class="w-[22px] h-[22px] md:w-[26px] md:h-[26px]">
        </a>
        <a href="#" class="hover:opacity-75 transition-opacity">
            <img src="{{ asset('assets/images/social/tiktok.svg') }}" alt="TikTok" class="w-[17px] h-[21px] md:w-[20px] md:h-[25px]">
        </a>
        <a href="#" class="hover:opacity-75 transition-opacity">
            <img src="{{ asset('assets/images/social/x.svg') }}" alt="X" class="w-[21px] h-[19px] md:w-[25px] md:h-[22px]">
        </a>
    </div>

    <!-- Tagline and License -->
    <div class="text-center mb-8">
        <p class="capitalize font-black text-white text-[14px] md:text-[17px]" style="font-family: 'Montserrat', sans-serif;">
            Pressure. Vision. Legacy.
        </p>
        <p class="capitalize font-black text-white text-[14px] md:text-[17px]" style="font-family: 'Montserrat', sans-serif;">
            only 100 licence
        </p>
    </div>

    <!-- Copyright -->
    <div class="text-center mb-4">
        <p class="text-white uppercase text-[9.5px] md:text-[18px] tracking-[1.425px] md:tracking-[2.7px]" style="font-family: 'Satoshi', sans-serif; font-weight: 400;">
            © 2025 EVANOX. All Rights Reserved.
        </p>
    </div>
</div>

@push('styles')
<style>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 15s linear infinite;
}
</style>
@endpush

<!-- Toggle Password Form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleBtn = document.getElementById('togglePasswordBtn');
    var emailForm = document.getElementById('emailOnlyForm');
    var passwordForm = document.getElementById('passwordForm');

    if (!toggleBtn || !emailForm || !passwordForm) return;

    toggleBtn.addEventListener('click', function() {
        if (passwordForm.style.display === 'none') {
            passwordForm.style.display = 'block';
            emailForm.style.display = 'none';
            toggleBtn.textContent = 'Hide Password Form';
        } else {
            passwordForm.style.display = 'none';
            emailForm.style.display = 'block';
            toggleBtn.textContent = 'Enter Using Password';
        }
    });
});
</script>
@endsection
