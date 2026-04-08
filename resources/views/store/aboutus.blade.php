@extends('layouts.store.app')

@section('title', 'About Us - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="px-7 md:px-12 py-10 md:py-16">
        <!-- Header -->
        <div class="text-center mb-6 md:mb-8">
            <h1 class="font-black uppercase text-[18px] md:text-[18px]" style="font-family: 'Montserrat', sans-serif;">
                About Us
            </h1>
            <p class="uppercase font-bold text-[18px] md:text-[19px] mt-1 tracking-[1.26px] md:tracking-[1.33px]" style="font-family: 'Montserrat', sans-serif;">
                Originator of EVANOX
            </p>
        </div>

        <!-- Profile Image -->
        <div class="flex justify-center mb-6 md:mb-8">
            <div class="w-[246px] h-[245px] md:w-[247px] md:h-[246px] rounded-full overflow-hidden">
                <img src="{{ asset('images/final.png') }}" alt="Saad Kani - Founder of Evanox" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Name -->
        <div class="text-center mb-6 md:mb-8">
            <p class="uppercase font-bold text-[18px] md:text-[18px] tracking-[6.3px]" style="font-family: 'Montserrat', sans-serif;">
                SAAD KANI
            </p>
            <p class="uppercase font-bold text-[17px] md:text-[15px] mt-1 tracking-[1.87px] md:tracking-[1.65px]" style="font-family: 'Montserrat', sans-serif;">
                THE MAN BEHIND THE MARK
            </p>
        </div>

        <!-- Quote -->
        <div class="text-center max-w-[371px] md:max-w-[537px] mx-auto">
            <p class="capitalize font-semibold text-[12px] md:text-[12px]" style="font-family: 'Montserrat', sans-serif; line-height: 1.5;">
                "Saad Kani, the founder of Evanox, brings extensive experience in graphic design. He established the company to offer high-quality digital products with a modern and attractive approach that stands out from what's currently available in the market."
            </p>
        </div>
    </div>
</div>
@endsection
