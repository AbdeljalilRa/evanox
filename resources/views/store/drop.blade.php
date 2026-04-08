@extends('layouts.store.blank')

@section('title', 'EVANOX - Welcome')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <!-- Lamp + Logo -->
    <div class="relative mb-0">
        <div class="relative flex justify-center" style="z-index: 10;">
            <img src="{{ asset('images/LAMP.png') }}" alt="Lamp" class="w-[380px] md:w-[422px] h-auto">
        </div>
        <div class="absolute inset-0 flex items-center justify-center" style="z-index: 20;">
            <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-[132px] md:w-[146px] h-auto mt-4">
        </div>
    </div>

    <!-- ENTRER Button -->
    <div class="text-center -mt-8 md:-mt-12 mb-4">
        <button type="button" class="inline-block bg-transparent border-none cursor-pointer">
            <div class="transition-opacity duration-300 ease-in-out hover:opacity-75">
                <h1 class="text-white font-extrabold italic uppercase text-[40px] md:text-[40px] tracking-[2.8px]" style="font-family: 'Montserrat', sans-serif;">
                    ENTRER
                </h1>
            </div>
        </button>
    </div>

    <!-- Enter text (different on mobile vs desktop) -->
    <p class="capitalize font-medium text-white text-[14px] tracking-[0.98px] mb-4 block md:hidden" style="font-family: 'Montserrat', sans-serif;">
        Enter &nbsp;The Archive
    </p>
    <p class="capitalize font-medium text-white md:text-[17px] tracking-[1.19px] mb-4 hidden md:block" style="font-family: 'Montserrat', sans-serif;">
        Enter Using Password
    </p>

    <!-- Social Media Icons -->
    <div class="flex justify-center items-center space-x-5 md:space-x-6 mb-16 md:mb-20">
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
            © {{ now()->year }} EVANOX. All Rights Reserved.
        </p>
    </div>
</div>
@endsection
