@extends('layouts.store.app')

@section('title', 'EVANOX - The Code')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="px-7 md:px-12 py-10 md:py-16">
        <!-- Header -->
        <div class="text-center mb-6 md:mb-8">
            <h1 class="font-black uppercase text-[20px] md:text-[24px]" style="font-family: 'Montserrat', sans-serif;">
                THE CODE &nbsp;WHY WE EXIST
            </h1>
            <p class="uppercase font-bold text-[18px] md:text-[18px] mt-2" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1.26px;">
                THE EVANOX MANIFESTO
            </p>
        </div>

        <!-- Logo -->
        <div class="flex justify-center mb-6 md:mb-10">
            <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-[159px] md:w-[213px]">
        </div>

        <!-- Tagline -->
        <div class="text-center mb-6 md:mb-8">
            <p class="uppercase font-bold text-[14px] md:text-[18px] tracking-[0.84px] md:tracking-[1.08px]" style="font-family: 'Montserrat', sans-serif;">
                Pressure. Vision. Legacy.
            </p>
            <p class="uppercase font-bold text-[17px] md:text-[20px] mt-1 tracking-[0.85px] md:tracking-[1.4px]" style="font-family: 'Montserrat', sans-serif;">
                EVANOX
            </p>
        </div>

        <!-- Manifesto Text -->
        <div class="text-center max-w-[414px] md:max-w-[845px] mx-auto">
            <p class="capitalize font-semibold text-[9px] md:text-[12px]" style="font-family: 'Montserrat', sans-serif; line-height: 1.5;">
                "We weren't built overnight. Evanox was forged in small rooms, late nights, and unshakable vision — a brand born from nothing but an idea and the will to turn it into something rare. We came from the edge — where art meets grit, where style is more than fabric and pixels, and where every design carries a story. Our sign is not decoration. It's a mark of survival, ambition, and the belief that pressure creates diamonds. Every drop, every pack, every limited run exists for one reason: to prove that value comes from scarcity, meaning, and the courage to stand apart. We create what the world hasn't seen — and once it's gone, it's gone forever.
            </p>
            <p class="capitalize font-semibold text-[9px] md:text-[12px] mt-3" style="font-family: 'Montserrat', sans-serif; line-height: 1.5;">
                This is our code:<br>
                Pressure shapes us.<br>
                Vision drives us.<br>
                Legacy is the only thing worth leaving."
            </p>
        </div>
    </div>
</div>
@endsection
