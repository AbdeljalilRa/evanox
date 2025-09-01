@extends('layouts.store.app')

{{-- Page Title --}}
@section('title', 'EVANOX - CATCH ME IN THE FAST LANE')

{{-- Main Content Section --}}
@section('content')
    {{-- Breadcrumb Navigation --}}
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center text-white/70 font-montserrat text-[14px] font-normal">
            <a href="{{ url('/') }}" class="hover:text-white">HOME</a>
            <span class="mx-2">›</span>
            <span class="text-white">EXCLUSIVE EVANOX CENTUM "CATCH ME IN THE FAST LANE"</span>
        </div>
    </div>

    {{-- Product Details Section --}}
    <section class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row">
            {{-- Product Images Gallery (Left Side) --}}
            <div class="w-full md:w-1/2 md:pr-8">
                {{-- Main Product Image --}}
                <div class="mb-4">
                    <div class="bg-black overflow-hidden product-image-container">
                        <img id="mainProductImage" src="{{ asset('images/catch me bleu.png') }}"
                            alt="CATCH ME IN THE FAST LANE Design" class="w-full h-auto object-contain">
                    </div>
                </div>

                {{-- Thumbnail Gallery --}}
                <div class="grid grid-cols-4 gap-2">
                    <div class="rounded cursor-pointer hover:opacity-80 transition-all thumbnail-image active"
                        data-img="{{ asset('images/catch me1.png') }}">
                        <img src="{{ asset('images/catch me1.png') }}" alt="Product Box" class="w-full h-auto">
                    </div>
                    <div class="rounded cursor-pointer hover:opacity-80 transition-all thumbnail-image"
                        data-img="{{ asset('images/tee.png') }}">
                        <img src="{{ asset('images/tee.png') }}" alt="T-Shirt Example" class="w-full h-auto">
                    </div>
                    <div class="rounded cursor-pointer hover:opacity-80 transition-all thumbnail-image"
                        data-img="{{ asset('images/catch me bleu.png') }}">
                        <img src="{{ asset('images/catch me bleu.png') }}" alt="Design Example - Blue Variant"
                            class="w-full h-auto">
                    </div>
                </div>
                
                {{-- Feature Icons Section --}}
                <div class="mt-10 bg-black">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-12">
                        {{-- First Row: Design Feature and Instant Delivery --}}
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon1.png') }}" alt="Design Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece 
                                is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or 
                                content creation.
                            </p>
                        </div>
                        
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon2.png') }}" alt="Delivery Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Instant Digital Delivery</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Buy it. Download it. Use it. All your files are delivered instantly, so you can plug them into 
                                your project with zero delay.
                            </p>
                        </div>
                        
                        {{-- Second Row: Zero Setup and Real Creators --}}
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon3.png') }}" alt="Setup Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Zero Setup Needed</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                What you see is what you get — ready-to-use files with no plugins, no extra steps, no 
                                confusion. Just download, drag, and create.
                            </p>
                        </div>
                        
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon4.png') }}" alt="Creators Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Made by Real Creators</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                We don't sell templates. We create statement pieces crafted by professionals who live in the 
                                world of streetwear, music, and visual culture — tested, refined, and ready to hit.
                            </p>
                        </div>
                        
                        {{-- Third Row: Lifetime Access and Program Compatibility --}}
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon5.png') }}" alt="Access Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Lifetime Access, No Limits</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Your account gives you forever access. Re-download anytime, from anywhere — your files are 
                                always yours.
                            </p>
                        </div>
                        
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon6.png') }}" alt="Compatibility Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Program Compatibility</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                All EVANOX designs are exclusively built for Adobe Photoshop.
                                We craft every file in layered PSD format to give you full creative control.
                                No Illustrator. No third-party apps. Just pure Photoshop power.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Details (Right Side) --}}
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                {{-- Product Title --}}
                <h1 class="text-[23px] font-montserrat font-semibold text-white mb-2">EXCLUSIVE EVANOX CENTUM<br>"The Complete Evanox
                    Legacy — Sealed Forever."</h1>

                {{-- Rating --}}
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-500 mr-2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-[15px] font-montserrat font-black">(8)</span>
                </div>

                {{-- Price --}}
                <div class="mb-6">
                    <span class="text-white text-[19px] font-montserrat font-extrabold">39,99 USD</span>
                </div>

                {{-- Add to Bag Button --}}
                <div class="mb-8">
                    <button
                        class="w-full bg-white text-black font-montserrat font-extrabold text-[16px] py-3 px-8 rounded-full hover:bg-white/90 transition-colors">
                        Add to Bag
                    </button>
                </div>

                {{-- Description Section --}}
                <div class="pt-6 mb-6">
                    <h3 class="text-white font-montserrat font-semibold italic text-[18px] mb-3">•Description</h3>
                    <p class="text-white font-montserrat font-bold italic text-[12px] mb-4">
                        "The Complete Evanox Legacy — Sealed Forever."<br>
                        by EVANOX
                    </p>
                    <p class="text-white mb-4">
                        <span class="font-montserrat font-semibold text-[12px]">Own the entire design vault. Over 100 premium PSD, PNG, and JPG creations — curated from every drop,
                        every era.<br>
                        Only 100 digital licenses will ever exist. No restocks. No rereleases.<br>
                        Each design is uniquely numbered — a permanent badge of ownership in the Evanox legacy.<br>
                        This collection is compressed, signed, and sealed.<br>
                        Precision. Vision. Legacy.<br>
                        You are 1 of 100.</span>
                    </p>
                    <p class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px]">What's Inside:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">8 high-resolution poster designs</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">4 color variants (Steel Blue, Neon Pink, Electric Green, Purple Flame...)</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Glossy black wrap with electric chrome-type effect</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Clean vector designs — pixel-free, unforgiving</span>
                    </p>
                    <p class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px]">Perfect For:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Streetwear & racing-inspired fashion drops; Fast-paced digital content, reels, and promo assets; Car
                        meets, urban brands, or high-energy design needs</span>
                    </p>
                    <p class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px]">Format:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">PNG (transparent background) & High-resolution JPG</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">No PSD files included</span>
                    </p>
                    <p class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px]">License:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Strictly limited to 100 digital licenses. No resell. No edits. No re-releases. Just rare digital
                        visuals with velocity — owned by few, respected by many.</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Customer Reviews Section --}}
    <section class="container mx-auto px-4 py-12">
        <h2 class="text-white font-montserrat font-bold italic text-[14.37px] mb-8 text-center">Customer Reviews</h2>

        {{-- Average Star Rating Display --}}
        <div class="flex items-center justify-center mb-8">
            <div class="flex text-white text-2xl">
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
            </div>
        </div>

        {{-- Reviews Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Review 1 --}}
            <div class="border border-gray-800 rounded-lg p-6 review-card">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-500 mr-2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-sm">| Mason B.</span>
                </div>
                <p class="text-white/70 text-sm">
                    This design hits hard. The contrast between the message and the glimmer makes it perfect for our digital
                    merch line. Clean, crisp, and consistent — just how I like it.
                </p>
            </div>

            {{-- Review 2 --}}
            <div class="border border-gray-800 rounded-lg p-6 review-card">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-500 mr-2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-sm">| Mason P.</span>
                </div>
                <p class="text-white/70 text-sm">
                    This design hits hard. The contrast between the message and the glimmer makes it perfect for our digital
                    merch line. Clean, crisp, and consistent — just how I like it.
                </p>
            </div>

            {{-- Review 3 --}}
            <div class="border border-gray-800 rounded-lg p-6 review-card">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-500 mr-2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-sm">| Mason R.</span>
                </div>
                <p class="text-white/70 text-sm">
                    This design hits hard. The contrast between the message and the glimmer makes it perfect for our digital
                    merch line. Clean, crisp, and consistent — just how I like it.
                </p>
            </div>
        </div>
    </section>

    {{-- Related Products Section --}}
    <section class="container mx-auto px-4 py-12 border-t border-gray-800">
        <h2 class="text-xl font-bold text-white mb-8">• ALSO ROCKED BY DESIGNERS LIKE YOU</h2>

        {{-- Related Products Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            {{-- Related Product 1 --}}
            <div class="group">
                <div
                    class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg mb-3">
                    <img src="{{ asset('images/BIG FACE FUTURE.png') }}"
                        alt="Big Face FUTURE - Codeine Glare Edition" class="w-full h-auto">
                </div>
                <h3 class="text-white text-sm font-medium mb-2">Big Face FUTURE - Codeine Glare Edition</h3>
                <div class="flex items-center mb-2">
                    <div class="flex text-yellow-500 mr-1">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-xs">(48)</span>
                </div>
                <p class="text-white font-bold">29,99 USD</p>
            </div>

            {{-- Related Product 2 --}}
            <div class="group">
                <div
                    class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg mb-3">
                    <img src="{{ asset('images/big face fifty cent BOX.png') }}"
                        alt="Big Face 50 Cent Box Edition" class="w-full h-auto">
                </div>
                <h3 class="text-white text-sm font-medium mb-2">Big Face 50 Cent - Box Edition</h3>
                <div class="flex items-center mb-2">
                    <div class="flex text-yellow-500 mr-1">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-xs">(48)</span>
                </div>
                <p class="text-white font-bold">29,99 USD</p>
            </div>

            {{-- Related Product 3 --}}
            <div class="group">
                <div
                    class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg mb-3">
                    <img src="{{ asset('images/travis scoot.png') }}"
                        alt="Travis Scott Design" class="w-full h-auto">
                </div>
                <h3 class="text-white text-sm font-medium mb-2">Travis Scott - Limited Edition Design</h3>
                <div class="flex items-center mb-2">
                    <div class="flex text-yellow-500 mr-1">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-xs">(48)</span>
                </div>
                <p class="text-white font-bold">29,99 USD</p>
            </div>

            {{-- Related Product 4 --}}
            <div class="group">
                <div
                    class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg mb-3">
                    <img src="{{ asset('images/boxx rihana 2.png') }}"
                        alt="Rihanna Box Edition" class="w-full h-auto">
                </div>
                <h3 class="text-white text-sm font-medium mb-2">Rihanna - Premium Box Edition</h3>
                <div class="flex items-center mb-2">
                    <div class="flex text-yellow-500 mr-1">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <span class="text-white/70 text-xs">(48)</span>
                </div>
                <p class="text-white font-bold">29,99 USD</p>
            </div>
        </div>
    </section>
@endsection

{{-- CSS Styles --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product-details.css') }}">
@endpush

{{-- JavaScript --}}
@push('scripts')
    <script src="{{ asset('assets/js/product-gallery.js') }}"></script>
@endpush
