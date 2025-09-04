@extends('layouts.store.app')

@section('title', 'EVANOX - The Code')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-white font-montserrat font-black text-3xl mb-2">THE CODE WHY WE EXIST</h1>
            <h2 class="text-white font-montserrat font-bold text-xl">THE EVANOX MANIFESTO</h2>
        </div>

        <div class="flex justify-center mb-16">
            <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-64">
        </div>

        <div class="text-center max-w-4xl mx-auto mb-16">
            <h3 class="text-white font-montserrat font-bold text-2xl mb-6">PRESSURE. VISION. LEGACY.</h3>
            <h4 class="text-white font-montserrat font-bold text-xl mb-10">EVANOX</h4>

            <p class="text-white font-montserrat font-semibold text-base mb-4">
                We weren't built overnight.<br>
                Evanox was forged in small rooms, late nights, and unshakable passion — a brand born from nothing but an idea and the will to turn it into something rare.
            </p>
            <p class="text-white font-montserrat font-semibold text-base mb-4">
                We came from the edge — where art meets grit, where style is more than fabric and pixels, and where every design carries a story. Our sign is not decoration. It's a mark of survival, ambition, and the belief that pressure creates diamonds.
            </p>
            <p class="text-white font-montserrat font-semibold text-base mb-4">
                Every drop, every pack, every limited run exists for a reason: to push creative boundaries with scarcity, meaning, and the courage to stand apart.<br>
                We create what the world hasn't seen — and once it's gone, it's gone forever.
            </p>

            <div class="mt-12">
                <p class="text-white font-montserrat font-semibold text-base mb-2">This is our code:</p>
                <p class="text-white font-montserrat text-base mb-2">Pressure shapes us.</p>
                <p class="text-white font-montserrat text-base mb-2">Vision drives us.</p>
                <p class="text-white font-montserrat text-base mb-8">Legacy is the only thing worth leaving.</p>
            </div>
        </div>


    </div>
@endsection
