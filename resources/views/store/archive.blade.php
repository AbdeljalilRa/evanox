@extends('layouts.store.app')

@section('title', 'EVANOX - Archive')


@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-black text-white">
    <!-- Top Quote Section -->
    <div class="text-center w-full mx-auto mb-16">
        <!-- Main Quote -->
        <h1 class="font-extrabold italic mb-5 tracking-wide" style="font-family: 'Montserrat', sans-serif; font-size: 22px;">
            "YOU WEREN'T SUPPOSED TO BE HERE."
        </h1>
        
        <!-- Subtitle -->
        <p class="font-medium italic opacity-80 tracking-wider" style="font-family: 'Montserrat', sans-serif; font-size: 12.78px;">
            NOT EVERYONE FINDS THIS PAGE. FEWER STAY. EVEN FEWER ARE CHOSEN.
        </p>
    </div>

    <!-- Content Section with Description and Video -->
    <div class="w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center px-8">
            <!-- Left Side - Description -->
            <div class="text-white space-y-6">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold" style="font-family: 'Montserrat', sans-serif;">
                        EVANOX CENTUM
                    </h2>
                    <h3 class="text-2xl font-bold" style="font-family: 'Montserrat', sans-serif;">
                        ONLY 100 CHOSEN. EVER
                    </h3>
                </div>
                
                <div class="space-y-4 text-lg leading-relaxed" style="font-family: 'Montserrat', sans-serif;">
                    <p>
                        You were given a glimpse of this legacy — but will it choose you to be one of the <span class="font-bold text-white-500">100</span> who carry it?
                    </p>
                    <p class="text-white-500">
                        Not everyone can control this aura emanating from him. Its variety is unmatched. Its presence, undeniable.
                    </p>
                    <p class="text-white-500 font-bold">
                        Will you be one of the hundred?
                    </p>
                    <p>
                        Or just another name left behind?
                    </p>
                    <p class="text-lg font-medium italic">
                        May you be among the 100 chosen."
                    </p>
                </div>
            </div>

            <!-- Right Side - Video -->
            <div class="w-full">
                <div class="w-full bg-gray-900 rounded-lg overflow-hidden">
                    <!-- Video Container -->
                    <div class="aspect-video bg-gray-800 relative">
                        <video 
                            id="customVideo"
                            class="w-full h-full object-cover" 
                            poster="/images/video-placeholder.jpg"
                        >
                            <!-- Primary source - your local MP4 -->
                            <source src="/videos/evanox-centum.mp4" type="video/mp4">
                            <!-- Fallback test video - sample MP4 for testing -->
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            <p class="text-white p-4">Your browser does not support the video tag.</p>
                        </video>
                        
                        <!-- Play Button Overlay -->
                        <div id="playButton" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 cursor-pointer">
                            <div class="w-16 h-16 bg-white bg-opacity-80 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-black ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Custom Controls -->
                    <div class="bg-white text-gray-900 p-4">
                        <div class="flex items-center space-x-4">
                            <!-- Play/Pause Button -->
                            <button id="playPauseBtn" class="text-gray-400 hover:text-gray-300">
                                <svg id="playIcon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg id="pauseIcon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>
                            
                            <!-- Previous Button -->
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/>
                                </svg>
                            </button>
                            
                            <!-- Next Button -->
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                                </svg>
                            </button>
                            
                            <!-- Progress Bar Container -->
                            <div class="flex-1 mx-4">
                                <div class="relative">
                                    <div class="h-1 bg-gray-600 rounded-full cursor-pointer" id="progressContainer">
                                        <div id="progressBar" class="h-1 bg-gray-400 rounded-full transition-all duration-150" style="width: 25%;"></div>
                                        <div id="progressHandle" class="absolute top-1/2 transform -translate-y-1/2 w-3 h-3 bg-gray-400 rounded-full cursor-pointer" style="left: 25%; margin-left: -6px;"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Volume Button -->
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                </svg>
                            </button>
                            
                            <!-- Settings Button -->
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 15.5A3.5 3.5 0 0 1 8.5 12A3.5 3.5 0 0 1 12 8.5a3.5 3.5 0 0 1 3.5 3.5 3.5 3.5 0 0 1-3.5 3.5m7.43-2.53c.04-.32.07-.64.07-.97 0-.33-.03-.66-.07-1l2.11-1.63c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.31-.61-.22l-2.49 1c-.52-.39-1.06-.73-1.69-.98l-.37-2.65A.506.506 0 0 0 14 2h-4c-.25 0-.46.18-.5.42l-.37 2.65c-.63.25-1.17.59-1.69.98l-2.49-1c-.22-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64L4.57 11c-.04.34-.07.67-.07 1 0 .33.03.65.07.97l-2.11 1.66c-.19.15-.25.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1.01c.52.4 1.06.74 1.69.99l.37 2.65c.04.24.25.42.5.42h4c.25 0 .46-.18.5-.42l.37-2.65c.63-.26 1.17-.59 1.69-.99l2.49 1.01c.22.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.66Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- What is Evanox Centum Section -->
    <div class="text-center w-full mt-24 mb-16">
        <h2 class="font-bold mb-6 tracking-wide" style="font-family: 'Montserrat', sans-serif; font-size: 22px;">
            WHAT IS EVANOX CENTUM?
        </h2>
        <div class="max-w-4xl mx-auto px-8">
            <p class="font-medium italic mb-2" style="font-family: 'Montserrat', sans-serif; font-size: 18px;">
                EVANOX CENTUM – THE COMPLETE LEGACY DROP
            </p>
            <p class="font-medium italic opacity-90" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
                "100 DESIGNS. 100 LICENSES. SEALED FOREVER."
            </p>
        </div>
    </div>

    <!-- Additional Description Section -->
    <div class="text-left w-full mt-16 mb-16 px-8">
        <div class="max-w-2xl">
            <p style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size: 18px; color: #fff; line-height: 1.6;">
                It's not just a pack.
            </p>
            <p style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size: 18px; color: #fff; line-height: 1.6; white-space: nowrap;">
                It's the sealed archive of Evanox — a black box of pressure, power, and untouchable digital design history.
            </p>
        </div>
    </div>

    <!-- EVANOX CENTUM Package Image -->
    <div class="text-center w-full mt-16 mb-16 px-8">
        <div class="flex justify-center">
            <img src="{{ asset('images/ex limted pack.png') }}" 
                 alt="EVANOX CENTUM - The Complete Legacy Package" 
                 class="max-w-lg w-full h-auto object-contain">
        </div>
    </div>

    <!-- What's in the Box Section -->
    <div class="text-center w-full mt-16 mb-16 px-8">
        <h2 class="font-bold mb-4 tracking-wide" style="font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 22px; color: #fff;">
            WHAT'S IN THE BOX?
        </h2>
        <p class="font-medium italic" style="font-family: 'Montserrat', sans-serif; font-weight: 500; font-style: italic; font-size: 16px; color: #f9f9f9;">
            TOTAL DESIGNS: +100 ARTWORKS
        </p>
    </div>

    <!-- Product Section with Slider -->
    <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <!-- Static Products Based on Your Image -->
                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="{{ asset('images/21 savage.png') }}" alt="BIG FACE CENT - Hustler Glow Drop" class="w-full h-auto rounded-lg">
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">BIG FACE CENT - Hustler Glow Drop</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(45)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29.99 $</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="{{ asset('images/BOX FACE.png') }}" alt="Big Face FUTURE - Codeine Glare Edition" class="w-full h-auto rounded-lg">
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">Big Face FUTURE - Codeine Glare Edition</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(45)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29.99 $</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="{{ asset('images/stephen.png') }}" alt="MAMBA X-RAY - 5 Rings of Vengeance" class="w-full h-auto rounded-lg">
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">MAMBA X-RAY - 5 Rings of Vengeance</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(45)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29.99 $</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="{{ asset('images/catch me bleu.png') }}" alt="EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION" class="w-full h-auto rounded-lg">
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(45)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29.99 $</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- What's Included Section -->
    <div class="w-full bg-black py-20 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Section Title -->
            <div class="text-center mb-16">
                <h2 class="font-bold mb-4 tracking-wide" style="font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 22px; color: #fff;">
                    WHAT'S INCLUDED
                </h2>
                <p class="font-medium italic" style="font-family: 'Montserrat', sans-serif; font-weight: 500; font-style: italic; font-size: 16px; color: #f9f9f9;">
                    (SECTION BLOCK)
                </p>
            </div>

            <!-- Collections Grid -->
            <div class="collections-grid mb-16">
                <!-- LEGENDS NEVER DIE -->
                <div class="collection-card">
                    <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                        LEGENDS NEVER DIE
                    </h3>
                    <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                        Cold chains. Crowned heads. Eternal bars.<br>
                        This ain't nostalgia — it's sacred digital memory.<br>
                        From the booth to your canvas, legends live forever.<br>
                        LEGENDS NEVER DIE — 100 licenses. No returns.
                    </p>
                </div>

                <!-- EVANOX BASKETBALL LAB -->
                <div class="collection-card">
                    <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                        EVANOX BASKETBALL LAB
                    </h3>
                    <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                        Where greatness is studied, crafted, and sealed.
                        From rings to legends, each piece is built in the lab —
                        forged under pressure.
                        Only 100 licenses. No edits. No mercy.
                        EVANOX BASKETBALL LAB - pure legacy, digitized.
                    </p>
                </div>

                <!-- EYE CONTACT: HIP-HOP ICONS -->
                <div class="collection-card">
                    <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                        EYE CONTACT: HIP-HOP ICONS
                    </h3>
                    <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                        Evanox delivers limited-edition digital art<br>
                        crafted to disrupt the ordinary. Each piece<br>
                        is bold, exclusive, and made to elevate your<br>
                        identity — whether it's for fashion, music, or<br>
                        content creation.
                    </p>
                </div>

                <!-- GRID GODS COLLECTION -->
                <div class="collection-card">
                    <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                        GRID GODS COLLECTION
                    </h3>
                    <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                        Evanox delivers limited-edition digital art<br>
                        crafted to disrupt the ordinary. Each piece<br>
                        is bold, exclusive, and made to elevate your<br>
                        identity — whether it's for fashion, music, or<br>
                        content creation.
                    </p>
                </div>

                <!-- AIRBRUSH DREAMS -->
                <div class="collection-card">
                    <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                        AIRBRUSH DREAMS
                    </h3>
                    <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                        Evanox delivers limited-edition digital art<br>
                        crafted to disrupt the ordinary. Each piece<br>
                        is bold, exclusive, and made to elevate your<br>
                        identity — whether it's for fashion, music, or<br>
                        content creation.
                    </p>
                </div>

                <!-- COLLECTION NEVER SEEN -->
                <div class="collection-card">
                    <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                        COLLECTION NEVER SEEN
                    </h3>
                    <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                        Evanox delivers limited-edition digital art<br>
                        crafted to disrupt the ordinary. Each piece<br>
                        is bold, exclusive, and made to elevate your<br>
                        identity — whether it's for fashion, music, or<br>
                        content creation.
                    </p>
                </div>
            </div>

            <!-- WORDS THAT HIT Section -->
            <div class="p-8">
                <h3 class="text-white font-bold text-xl mb-4 tracking-wide italic" style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-style: italic;">
                    WORDS THAT HIT
                </h3>
                <p class="text-gray-300 leading-relaxed" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px; line-height: 1.6;">
                    Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                </p>
            </div>
        </div>
    </div>

     <div class="text-center mb-16">
                <h2 class="font-bold mb-4 tracking-wide" style="font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 22px; color: #fff;">
                    NOT ALL WHO SEE IT,OWN IT.
                </h2>
                <p class="font-medium italic" style="font-family: 'Montserrat', sans-serif; font-weight: 500; font-style: italic; font-size: 16px; color: #f9f9f9;">
                    (FEW EVER KEEP IT.)
                </p>
            </div>


            <section class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row">
            <!-- Product Images Gallery (Left Side) -->
            <div class="w-full md:w-1/2 md:pr-8">
                <!-- Main Product Image -->
                <div class="mb-4">
                    <div class="bg-black overflow-hidden product-image-container">
                        <img id="mainProductImage"
                            src="{{ asset('images/ex limted pack.png') }}"
                            alt="EVANOX CENTUM Package" class="w-full h-auto object-contain">
                    </div>
                </div>

                

                {{-- Feature Icons Section --}}
                <div class="mt-10 bg-black px-4">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-12">
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon11.png') }}" alt="Design Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Designs You Won't
                                Find Anywhere Else</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Evanox delivers limited-edition digital art crafted to disrupt the ordinary.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon22.png') }}" alt="Delivery Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Instant Digital
                                Delivery</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Buy it. Download it. Use it. All your files are delivered instantly.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon33.png') }}" alt="Setup Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Zero Setup Needed
                            </h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Ready-to-use files with no plugins, no confusion. Just download and create.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon44.png') }}" alt="Creators Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Made by Real Creators
                            </h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Crafted by professionals from streetwear, music, and visual culture.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon55.png') }}" alt="Access Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Lifetime Access</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Forever access. Re-download anytime, from anywhere — your files are always yours.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon66.png') }}" alt="Compatibility Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Program Compatibility
                            </h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                All EVANOX designs are built for Adobe Photoshop in layered PSD format.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details (Right Side) -->
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <div class="bg-black py-5 px-0">
                    <div class="max-w-lg">
                        <h1 class="text-[23px] font-montserrat font-semibold text-white mb-2">
                            EVANOX CENTUM - THE COMPLETE LEGACY DROP
                        </h1>
                        <div class="flex items-center mb-5">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-white text-[15px] font-montserrat font-black">(100)</span>
                        </div>
                        <div class="mb-6">
                            <span class="text-white text-[19px] font-montserrat font-extrabold">
                                999.00 USD
                            </span>
                        </div>
                        <div>
                            <button id="addToBagBtn" data-product-id="centum-package"
                                class="w-full bg-white text-black font-montserrat font-extrabold text-[16px] py-3 px-8 rounded-full hover:bg-white/90 transition-colors">
                                Add to Bag
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="pt-6 mb-6">
                    <h3 class="text-white font-montserrat font-semibold italic text-[18px] mb-3">• Description</h3>
                    <div class="text-white font-montserrat font-bold italic text-[12px] mb-4 product-description">
                        The ultimate evolution of human consciousness lies within the mysterious compound known as EVANOX CENTUM. 
                        This isn't just a design pack — it's the sealed archive of Evanox, a black box of pressure, power, 
                        and untouchable digital design history.
                    </div>
                    
                    <div class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px] underline">What's Inside:</span><br>
                        <ul>
                            <li class="font-montserrat font-semibold text-[12px]">• 100+ Exclusive Digital Artworks</li>
                            <li class="font-montserrat font-semibold text-[12px]">• LEGENDS NEVER DIE Collection</li>
                            <li class="font-montserrat font-semibold text-[12px]">• EVANOX BASKETBALL LAB Series</li>
                            <li class="font-montserrat font-semibold text-[12px]">• EYE CONTACT: HIP-HOP ICONS</li>
                            <li class="font-montserrat font-semibold text-[12px]">• GRID GODS COLLECTION</li>
                            <li class="font-montserrat font-semibold text-[12px]">• AIRBRUSH DREAMS</li>
                            <li class="font-montserrat font-semibold text-[12px]">• COLLECTION NEVER SEEN</li>
                        </ul>
                    </div>
                    
                    <div class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px] underline">Perfect For:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Fashion designers, music artists, content creators, and those who demand exclusive digital art that disrupts the ordinary.</span>
                    </div>
                    
                    <div class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px] underline">Format:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Adobe Photoshop PSD files with layers, PNG files, high-resolution formats</span>
                    </div>
                    
                    <div class="text-white mb-4">
                        <span class="text-white font-montserrat font-extrabold text-[12px] underline">License:</span><br>
                        <span class="font-montserrat font-semibold text-[12px]">Limited commercial license - Only 100 copies available. Forever access, no returns.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>



@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/archive.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/archive.js') }}"></script>
@endpush

@endsection