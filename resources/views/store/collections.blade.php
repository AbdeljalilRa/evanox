@extends ('layouts.store.app')

@section('title', 'EVANOX - Collections')

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- EVANOX: PRESSURE PACKS Section -->
    <div class="text-center py-20 px-8 bg-black">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-white mb-6 tracking-wider" style="font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 22px;">
                EVANOX: PRESSURE PACKS
            </h2>
            <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-style: italic; font-weight: 500; font-size: 13.6px;">
                "ART UNDER EXTREME CONDITIONS."
            </p>
        </div>
    </div>

    <!-- Design Packs Section -->
    <div class="py-16 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Pack 1: COURT KINGS: ALL-STARS EDITION -->
                <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/BACK1.png') }}" alt="COURT KINGS: ALL-STARS EDITION" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold mb-2 uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 14px;">
                            COURT KINGS: ALL-STARS EDITION
                        </h3>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-400 text-xs" style="font-family: 'Montserrat', sans-serif;">(80)</span>
                        </div>
                        <p class="text-white font-bold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                            67,99 USD
                        </p>
                    </div>
                </div>

                <!-- Pack 2: Big Face FUTURE – Codeine Glare Edition -->
                <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/4 AP.png') }}" alt="Big Face FUTURE – Codeine Glare Edition" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold mb-2 uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 14px;">
                            Big Face FUTURE – Codeine Glare Edition
                        </h3>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-400 text-xs" style="font-family: 'Montserrat', sans-serif;">(46)</span>
                        </div>
                        <p class="text-white font-bold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                            29,99 USD
                        </p>
                    </div>
                </div>

                <!-- Pack 3: Big Face FUTURE – Codeine Glare Edition (Duplicate) -->
                <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/charles pack.png') }}" alt="Big Face FUTURE – Codeine Glare Edition" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold mb-2 uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 14px;">
                            Big Face FUTURE – Codeine Glare Edition
                        </h3>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-400 text-xs" style="font-family: 'Montserrat', sans-serif;">(46)</span>
                        </div>
                        <p class="text-white font-bold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                            29,99 USD
                        </p>
                    </div>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Pack 1: COURT KINGS: ALL-STARS EDITION -->
                <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/BIG FACE NBA.png') }}" alt="COURT KINGS: ALL-STARS EDITION" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold mb-2 uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 14px;">
                            COURT KINGS: ALL-STARS EDITION
                        </h3>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-400 text-xs" style="font-family: 'Montserrat', sans-serif;">(80)</span>
                        </div>
                        <p class="text-white font-bold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                            67,99 USD
                        </p>
                    </div>
                </div>

                <!-- Pack 2: Big Face FUTURE – Codeine Glare Edition -->
                <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/pack6.png') }}" alt="Big Face FUTURE – Codeine Glare Edition" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold mb-2 uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 14px;">
                            Big Face FUTURE – Codeine Glare Edition
                        </h3>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-400 text-xs" style="font-family: 'Montserrat', sans-serif;">(46)</span>
                        </div>
                        <p class="text-white font-bold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                            29,99 USD
                        </p>
                    </div>
                </div>

                <!-- Pack 3: Big Face FUTURE – Codeine Glare Edition (Duplicate) -->
                <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/pack3.png') }}" alt="Big Face FUTURE – Codeine Glare Edition" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold mb-2 uppercase" style="font-family: 'Montserrat', sans-serif; font-size: 14px;">
                            Big Face FUTURE – Codeine Glare Edition
                        </h3>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-400 text-xs" style="font-family: 'Montserrat', sans-serif;">(46)</span>
                        </div>
                        <p class="text-white font-bold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                            29,99 USD
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
