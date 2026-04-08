@extends('layouts.store.app')

@section('title', 'Contact Us - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="px-7 md:px-12 py-10 md:py-16">
        <!-- Header -->
        <div class="text-center mb-16 md:mb-24">
            <h1 class="font-black uppercase text-[16px] md:text-[26px]" style="font-family: 'Montserrat', sans-serif;">
                Contact Us | Evanox
            </h1>
        </div>

        <!-- Content -->
        <div>
            <!-- Question -->
            <p class="capitalize font-bold italic underline mb-8 md:mb-12 text-[13px] md:text-[24px]" style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.72px;">
                Got a question? Need help with a design? We're here for it.
            </p>

            <!-- Description -->
            <p class="capitalize font-semibold mb-10 md:mb-16 text-[11.5px] md:text-[20px]" style="font-family: 'Montserrat', sans-serif; line-height: 1.4;">
                At Evanox, we value every connection. Whether you're looking for support, have a business inquiry, or want to collaborate — don't hesitate to reach out.
            </p>

            <!-- Email Section -->
            <div class="mb-10 md:mb-16">
                <p class="capitalize font-bold italic underline mb-3 md:mb-4 text-[13px] md:text-[24px]" style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.72px;">
                    EMAIL
                </p>
                <p class="capitalize font-semibold text-[11.5px] md:text-[20px]" style="font-family: 'Montserrat', sans-serif;">
                    SUPPORT@EVANOX.STORE
                </p>
            </div>

            <!-- Social Media Icons -->
            <div class="flex justify-center items-center space-x-10 md:space-x-14 mt-16 md:mt-24">
                <a href="#" class="text-white hover:opacity-80 transition-opacity">
                    <img src="{{ asset('assets/images/social/instagram.svg') }}" alt="Instagram" class="w-[25px] h-[25px] md:w-[35px] md:h-[35px]">
                </a>
                <a href="#" class="text-white hover:opacity-80 transition-opacity">
                    <img src="{{ asset('assets/images/social/whatsapp.svg') }}" alt="WhatsApp" class="w-[25px] h-[25px] md:w-[40px] md:h-[40px]">
                </a>
                <a href="#" class="text-white hover:opacity-80 transition-opacity">
                    <img src="{{ asset('assets/images/social/tiktok.svg') }}" alt="TikTok" class="w-[22px] h-[27px] md:w-[32px] md:h-[39px]">
                </a>
                <a href="#" class="text-white hover:opacity-80 transition-opacity">
                    <img src="{{ asset('assets/images/social/x.svg') }}" alt="X" class="w-[25px] h-[25px] md:w-[39px] md:h-[35px]">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
