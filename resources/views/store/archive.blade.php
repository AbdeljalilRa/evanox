@extends('layouts.store.app')

@section('title', 'EVANOX - Archive')


@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-black text-white">
    <!-- Top Quote Section -->
    <div class="text-center w-full mx-auto mt-8 md:mt-12 mb-8 md:mb-16">
        <h1 class="font-extrabold italic mb-2 md:mb-3 uppercase text-[14px] md:text-[32px] tracking-[1.05px] md:tracking-[2.4px]" style="font-family: 'Montserrat', sans-serif;">
            "You weren't supposed to be here."
        </h1>
        <p class="font-medium italic uppercase text-[8.5px] md:text-[19px]" style="font-family: 'Montserrat', sans-serif;">
            Not everyone finds this page. Fewer stay. Even fewer are chosen.
        </p>
    </div>

    <!-- Content Section with Description and Video -->
    <div class="w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-12 items-start px-3 md:px-8">
            <!-- Left Side - Description -->
            <div class="text-white space-y-3 md:space-y-5">
                <div class="space-y-1 md:space-y-2">
                    <h2 class="font-bold uppercase text-[11px] md:text-[36px]" style="font-family: 'Montserrat', sans-serif;">
                        EVANOX CENTUM
                    </h2>
                    <h3 class="font-bold uppercase text-[11px] md:text-[36px] tracking-[0.385px] md:tracking-[1.26px]" style="font-family: 'Montserrat', sans-serif;">
                        ONLY 100 CHOSEN. EVER
                    </h3>
                </div>

                <div class="space-y-2 md:space-y-4 text-[6.8px] md:text-[22px] tracking-[0.238px] md:tracking-[0.77px]" style="font-family: 'Nunito', sans-serif;">
                    <p>
                        You were given a glimpse of this legacy — but will it choose you to be one of the <span class="font-bold">100</span> who carry it?
                    </p>
                    <p>
                        <span class="font-bold">Not everyone can control this aura emanating from him</span>, Its variety is unmatched. Its presence, undeniable.
                    </p>
                    <div class="mt-2 md:mt-4 text-[7.5px] md:text-[22px]">
                        <p class="font-bold mb-0">Will you be one of the hundred?</p>
                        <p>Or just another name left behind?</p>
                    </div>
                    <p class="font-bold text-[7.5px] md:text-[22px]">
                        May you be among the 100 chosen."
                    </p>
                </div>
            </div>

            <!-- Right Side - Video -->
            <div class="w-full">
                <div class="w-full rounded-2xl overflow-hidden" style="background-color: #212121;">
                    <div class="aspect-video relative">
                        <video
                            id="customVideo"
                            class="w-full h-full object-cover"
                            poster="/images/video-placeholder.jpg"
                        >
                            <source src="/videos/evanox-centum.mp4" type="video/mp4">
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            <p class="text-white p-4">Your browser does not support the video tag.</p>
                        </video>

                        <!-- Play Button Overlay -->
                        <div id="playButton" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 cursor-pointer">
                            <div class="w-10 h-10 md:w-16 md:h-16 bg-white bg-opacity-80 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 md:w-6 md:h-6 text-black ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Custom Controls -->
                    <div class="bg-white text-gray-900 p-2 md:p-4">
                        <div class="flex items-center space-x-2 md:space-x-4">
                            <button id="playPauseBtn" class="text-gray-400 hover:text-gray-300">
                                <svg id="playIcon" class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg id="pauseIcon" class="w-4 h-4 md:w-5 md:h-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/>
                                </svg>
                            </button>
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                                </svg>
                            </button>
                            <div class="flex-1 mx-2 md:mx-4">
                                <div class="relative">
                                    <div class="h-1 bg-gray-600 rounded-full cursor-pointer" id="progressContainer">
                                        <div id="progressBar" class="h-1 bg-gray-400 rounded-full transition-all duration-150" style="width: 25%;"></div>
                                        <div id="progressHandle" class="absolute top-1/2 transform -translate-y-1/2 w-3 h-3 bg-gray-400 rounded-full cursor-pointer" style="left: 25%; margin-left: -6px;"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                </svg>
                            </button>
                            <button class="text-gray-400 hover:text-gray-300">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
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
    <div class="text-center w-full mt-12 md:mt-24 mb-8 md:mb-16">
        <h2 class="font-bold mb-3 md:mb-6 uppercase text-[11px] md:text-[32px] tracking-[1.265px] md:tracking-[3.68px]" style="font-family: 'Montserrat', sans-serif;">
            What Is EVANOX CENTUM?
        </h2>
        <div class="mx-auto">
            <p class="font-medium italic uppercase mb-1 text-[7.2px] md:text-[19.5px]" style="font-family: 'Montserrat', sans-serif;">
                EVANOX CENTUM – The Complete Legacy Drop
            </p>
            <p class="font-medium italic uppercase text-[7.2px] md:text-[19.5px]" style="font-family: 'Montserrat', sans-serif;">
                "100 Designs. 100 Licenses. Sealed Forever."
            </p>
        </div>
    </div>

    <!-- Additional Description Section -->
    <div class="text-left w-full mt-8 md:mt-16 mb-8 md:mb-16 px-3 md:px-8">
        <div class="max-w-4xl">
            <p class="font-bold uppercase mb-0 text-[7px] md:text-[22px] leading-[10px] md:leading-[1.6]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
                It's not just a pack.
            </p>
            <p class="font-bold uppercase text-[7px] md:text-[22px] leading-[10px] md:leading-[1.6] md:whitespace-nowrap" style="font-family: 'Montserrat', sans-serif; color: #fff;">
                It's the sealed archive of Evanox — a black box of pressure, power, and untouchable digital design history.
            </p>
        </div>
    </div>

    <!-- EVANOX CENTUM Package Image -->
    <div class="text-center w-full mt-8 md:mt-16 mb-8 md:mb-16 px-4 md:px-8">
        <div class="flex justify-center">
            <img src="{{ asset('images/ex limted pack.png') }}"
                 alt="EVANOX CENTUM - The Complete Legacy Package"
                 class="w-full h-auto object-contain max-w-[300px] md:max-w-[685px]">
        </div>
    </div>

    <!-- What's in the Box Section -->
    <div class="text-center w-full mt-8 md:mt-16 mb-4 md:mb-8 px-4 md:px-8">
        <h2 class="font-bold mb-2 md:mb-4 uppercase text-[14px] md:text-[32px] tracking-[0.98px] md:tracking-[3.2px]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
            WHAT'S IN THE BOX?
        </h2>
        <p class="font-medium italic uppercase text-[8.6px] md:text-[19.5px]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
            Total Designs: +100 Artworks
        </p>
    </div>

    <!-- Product Section with Slider -->
    <section class="container mx-auto px-1 sm:px-4 py-6 md:py-12 bg-black">
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg pl-2 sm:pl-[52px]">
                        <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                            <img src="{{ asset('images/21 savage.png') }}" alt="EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="pt-2 md:pt-4">
                            <h3 class="w-full sm:w-[340px] font-montserrat font-medium text-[11px] sm:text-[17px] leading-[14px] sm:leading-[22px] text-white uppercase mb-1 md:mb-2">EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-1 md:mb-3">
                                <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                </div>
                                <span class="text-gray-400 font-montserrat font-black text-[10px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                            </div>
                            <p class="font-montserrat font-extrabold text-[13px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">79.99 USD</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg pl-2 sm:pl-[52px]">
                        <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                            <img src="{{ asset('images/BOX FACE.png') }}" alt="EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="pt-2 md:pt-4">
                            <h3 class="w-full sm:w-[340px] font-montserrat font-medium text-[11px] sm:text-[17px] leading-[14px] sm:leading-[22px] text-white uppercase mb-1 md:mb-2">EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-1 md:mb-3">
                                <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                </div>
                                <span class="text-gray-400 font-montserrat font-black text-[10px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                            </div>
                            <p class="font-montserrat font-extrabold text-[13px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">79.99 USD</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg pl-2 sm:pl-[52px]">
                        <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                            <img src="{{ asset('images/stephen.png') }}" alt="EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="pt-2 md:pt-4">
                            <h3 class="w-full sm:w-[340px] font-montserrat font-medium text-[11px] sm:text-[17px] leading-[14px] sm:leading-[22px] text-white uppercase mb-1 md:mb-2">EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-1 md:mb-3">
                                <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                </div>
                                <span class="text-gray-400 font-montserrat font-black text-[10px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                            </div>
                            <p class="font-montserrat font-extrabold text-[13px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">79.99 USD</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg pl-2 sm:pl-[52px]">
                        <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                            <img src="{{ asset('images/catch me bleu.png') }}" alt="EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="pt-2 md:pt-4">
                            <h3 class="w-full sm:w-[340px] font-montserrat font-medium text-[11px] sm:text-[17px] leading-[14px] sm:leading-[22px] text-white uppercase mb-1 md:mb-2">EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-1 md:mb-3">
                                <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                </div>
                                <span class="text-gray-400 font-montserrat font-black text-[10px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                            </div>
                            <p class="font-montserrat font-extrabold text-[13px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">79.99 USD</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next !bg-white !w-[50px] !h-[50px] !rounded-full !shadow-lg hover:!shadow-xl !transition-all !duration-300 hover:!scale-110 after:!content-none flex items-center justify-center">
                <svg class="w-[13px] h-[23px]" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
            <div class="swiper-button-prev !bg-white !w-[50px] !h-[50px] !rounded-full !shadow-lg hover:!shadow-xl !transition-all !duration-300 hover:!scale-110 after:!content-none flex items-center justify-center">
                <svg class="w-[13px] h-[23px]" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- What's Included Section -->
    <div class="w-full bg-black py-10 md:py-20 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Section Title -->
            <div class="text-center mb-8 md:mb-16">
                <h2 class="font-bold mb-2 md:mb-4 uppercase text-[12px] md:text-[32px] tracking-[1.56px] md:tracking-[4.16px]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
                    WHAT'S INCLUDED
                </h2>
                <p class="font-medium italic uppercase text-[10px] md:text-[20px]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
                    (Section Block)
                </p>
            </div>

            <!-- Collections Grid -->
            <div class="collections-grid mb-8 md:mb-16">
                <!-- LEGENDS NEVER DIE -->
                <div class="collection-card">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                        <img src="{{ asset('images/icon1.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                        <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                            LEGENDS NEVER DIE
                        </h3>
                    </div>
                    <p class="text-white capitalize text-[12px] md:text-[12.5px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                        Gold chains. Crowned heads. Eternal bars.
                        This ain't nostalgia — it's sacred digital memory. From the booth to your canvas, legends live forever.
                        LEGENDS NEVER DIE — 100 licenses. No reruns.
                    </p>
                </div>

                <!-- EVANOX BASKETBALL LAB -->
                <div class="collection-card">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                        <img src="{{ asset('images/icon2.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                        <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                            EVANOX BASKETBALL LAB
                        </h3>
                    </div>
                    <p class="text-white capitalize text-[12px] md:text-[12.5px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                        Where greatness is studied, crafted, and sealed. From rings to legends, each piece is built in the lab — forged under pressure.
                        Only 100 licenses. No edits. No mercy. EVANOX BASKETBALL LAB – pure legacy, digitized.
                    </p>
                </div>

                <!-- EYE CONTACT: HIP-HOP ICONS -->
                <div class="collection-card">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                        <img src="{{ asset('images/icon3.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                        <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                            EYE CONTACT: HIP-HOP ICONS
                        </h3>
                    </div>
                    <p class="text-white capitalize text-[12px] md:text-[12.5px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                        Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                    </p>
                </div>

                <!-- GRID GODS COLLECTION -->
                <div class="collection-card">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                        <img src="{{ asset('images/icon4.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                        <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                            GRID GODS COLLECTION
                        </h3>
                    </div>
                    <p class="text-white capitalize text-[12px] md:text-[12.5px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                        Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                    </p>
                </div>

                <!-- AIRBRUSH DREAMS -->
                <div class="collection-card">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                        <img src="{{ asset('images/icon5.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                        <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                            AIRBRUSH DREAMS
                        </h3>
                    </div>
                    <p class="text-white capitalize text-[12px] md:text-[12.5px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                        Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                    </p>
                </div>

                <!-- COLLECTION NEVER SEEN -->
                <div class="collection-card">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                        <img src="{{ asset('images/icon 6.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                        <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                            COLLECTION NEVER SEEN
                        </h3>
                    </div>
                    <p class="text-white capitalize text-[12px] md:text-[12.5px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                        Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                    </p>
                </div>
            </div>

            <!-- WORDS THAT HIT Section -->
            <div class="px-0 md:px-4">
                <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3">
                    <img src="{{ asset('images/icon7.png') }}" alt="" class="w-7 h-7 flex-shrink-0">
                    <h3 class="text-white font-black italic uppercase text-[13px] md:text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                        WORDS THAT HIT
                    </h3>
                </div>
                <p class="text-white capitalize text-[12px] md:text-[16px]" style="font-family: 'Montserrat', sans-serif; font-weight: 600; line-height: 1.5;">
                    Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                </p>
            </div>
        </div>
    </div>

    <!-- NOT ALL WHO SEE IT, OWN IT -->
    <div class="text-center mb-8 md:mb-16 mt-8 md:mt-16">
        <h2 class="font-bold mb-2 md:mb-4 uppercase text-[12px] md:text-[31px] tracking-[1.44px] md:tracking-[3.72px]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
            not all who see it,own it.
        </h2>
        <p class="font-medium italic uppercase text-[10px] md:text-[22px]" style="font-family: 'Montserrat', sans-serif; color: #fff;">
            (few ever keep it)
        </p>
    </div>

    <!-- Product Detail Section -->
    <section class="container mx-auto px-4 py-4 md:py-8">
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

                <!-- Secondary Product Images -->
                <div class="flex gap-2 md:gap-4 mb-4 md:mb-8 justify-center">
                    <div class="w-[124px] md:flex-1">
                        <img src="{{ asset('images/tee.png') }}" alt="EVANOX Product" class="w-full h-auto object-cover">
                    </div>
                    <div class="w-[96px] md:flex-1">
                        <img src="{{ asset('images/boxx rihana 2.png') }}" alt="EVANOX Product" class="w-full h-auto object-cover">
                    </div>
                    <div class="w-[87px] md:flex-1">
                        <img src="{{ asset('images/BOX FACE.png') }}" alt="EVANOX Product" class="w-full h-auto object-cover">
                    </div>
                </div>

                <!-- Product Title & Details (shown on mobile above description) -->
                <div class="block md:hidden">
                    <p class="font-semibold text-white mb-3 text-[14px]" style="font-family: 'Montserrat', sans-serif;">
                        EXCLUSIVE EVANOX CENTUM "The Complete Evanox Legacy — Sealed Forever."
                    </p>

                    <div class="flex items-center mb-3">
                        <img src="{{ asset('images/stars-rating.png') }}" alt="5 stars" class="h-3.5">
                        <span class="text-white font-black ml-2 text-[13px]" style="font-family: 'Montserrat', sans-serif;">(8)</span>
                    </div>

                    <p class="font-extrabold italic text-white mb-4 text-[15px]" style="font-family: 'Montserrat', sans-serif;">
                        First 10 owners (Founders Tier) &rarr; $999 USD
                    </p>

                    <div class="mb-6">
                        <button id="addToBagBtnMobile" data-product-id="centum-package"
                            class="w-full bg-white text-black font-extrabold py-3 rounded-[36px] hover:bg-white/90 transition-colors text-[17px]" style="font-family: 'Montserrat', sans-serif;">
                            Own The Drop
                        </button>
                    </div>

                    <!-- Mobile Description -->
                    <h3 class="text-white font-semibold italic mb-3 text-[17px]" style="font-family: 'Montserrat', sans-serif;">
                        &centerdot;Description
                    </h3>

                    <div class="text-white mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <p class="font-bold italic mb-3 text-[14px]">
                            "The Complete Evanox Legacy — Sealed Forever."
                            by EVANOX
                        </p>
                        <p class="font-semibold mb-3 text-[13px]" style="line-height: 1.5;">
                            Own the entire design vault. Over 100 premium PSD, PNG, and JPG creations — curated from every drop, every era, every vision. Only 100 digital licenses will ever exist. No restocks. No reissues. Each copy is uniquely numbered — a permanent badge of ownership in the Evanox legacy. This is not a design pack. This is history — compressed, signed, and sealed. Pressure. Vision. Legacy. You are 1 of 100.
                        </p>
                    </div>

                    <div class="text-white mb-3" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[13px]">What's Inside :</span>
                        <span class="font-semibold text-[13px]"> 8 High-resolution poster designs &nbsp; 8 Color variants (Steel Blue, Neon Pink, Electric Green, Purple Flame...) &nbsp; Glossy black wrap with electric chrome-type effect &nbsp; Clean vertical typography — bold, fast, unforgiving</span>
                    </div>

                    <div class="text-white mb-3" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[13px]">Perfect For :</span>
                        <span class="font-semibold text-[13px]"> &bull; Streetwear & racing-inspired fashion drops &bull; Fast-paced digital content, reels, and promo assets &bull; Car meets, urban brands, or high-energy design needs</span>
                    </div>

                    <div class="text-white mb-3" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[13px]">Format :</span>
                        <span class="font-semibold text-[13px]"> &bull; PNG (transparent background) & High-resolution JPG &nbsp; No PSD files included</span>
                    </div>

                    <div class="text-white mb-3" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[13px]">License :</span>
                        <span class="font-semibold text-[13px]"> Strictly limited to 100 digital licenses. No resell. No edits. No re-releases. Just rare digital visuals with velocity — owned by few, respected by many.</span>
                    </div>
                </div>

                {{-- Feature Icons Section --}}
                <div class="mt-6 md:mt-10 bg-black px-0 md:px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 md:gap-x-6 md:gap-y-12">
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon11.png') }}" alt="Design Icon" class="w-6 h-6 md:w-8 md:h-8">
                            </div>
                            <h4 class="text-white font-black italic mb-1 text-[14px]" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon22.png') }}" alt="Delivery Icon" class="w-6 h-6 md:w-8 md:h-8">
                            </div>
                            <h4 class="text-white font-black italic mb-1 text-[14px]" style="font-family: 'Montserrat', sans-serif;">Instant Digital Delivery</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Buy it. Download it. Use it. All your files are delivered instantly, so you can plug them into your project with zero delay.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon33.png') }}" alt="Setup Icon" class="w-6 h-6 md:w-8 md:h-8">
                            </div>
                            <h4 class="text-white font-black italic mb-1 text-[14px]" style="font-family: 'Montserrat', sans-serif;">Zero Setup Needed</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                What you see is what you get — ready-to-use files with no plugins, no extra steps, no confusion. Just download, drag, and create.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon44.png') }}" alt="Creators Icon" class="w-6 h-6 md:w-8 md:h-8">
                            </div>
                            <h4 class="text-white font-black italic mb-1 text-[14px]" style="font-family: 'Montserrat', sans-serif;">Made by Real Creators</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                We don't sell templates. We create statement pieces. Every design is built by professionals who live in the world of streetwear, music, and visual culture — tested, refined, and ready to hit.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon55.png') }}" alt="Access Icon" class="w-6 h-6 md:w-8 md:h-8">
                            </div>
                            <h4 class="text-white font-black italic mb-1 text-[14px]" style="font-family: 'Montserrat', sans-serif;">Lifetime Access, No Limits</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Your account gives you forever access. Re-download anytime, from anywhere — your files are always yours.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon66.png') }}" alt="Compatibility Icon" class="w-6 h-6 md:w-8 md:h-8">
                            </div>
                            <h4 class="text-white font-black italic mb-1 text-[14px]" style="font-family: 'Montserrat', sans-serif;">Program Compatibility</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                All EVANOX designs are exclusively built for Adobe Photoshop. We craft every file in layered PSD format to give you full creative control. No Illustrator. No third-party apps. Just pure Photoshop power.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details (Right Side - Desktop Only) -->
            <div class="hidden md:block w-full md:w-1/2 mt-8 md:mt-0">
                <div class="bg-black py-5 px-0">
                    <div>
                        <h1 class="font-semibold text-white text-[40px] whitespace-nowrap" style="font-family: 'Montserrat', sans-serif; line-height: 1.2;">
                            EXCLUSIVE EVANOX CENTUM
                        </h1>
                        <p class="font-semibold text-white text-[40px] whitespace-nowrap" style="font-family: 'Montserrat', sans-serif; line-height: 1.2;">
                            &ldquo;The Complete Evanox Legacy
                        </p>
                        <p class="font-semibold text-white mb-4 text-[40px] whitespace-nowrap" style="font-family: 'Montserrat', sans-serif; line-height: 1.2;">
                            &mdash; Sealed Forever.&rdquo;
                        </p>

                        <div class="flex items-center mb-4">
                            <img src="{{ asset('images/stars-rating.png') }}" alt="5 stars" class="h-6">
                            <span class="text-white font-black ml-3 text-[24px]" style="font-family: 'Montserrat', sans-serif;">(8)</span>
                        </div>

                        <p class="font-extrabold italic text-white mb-6 text-[28px] whitespace-nowrap" style="font-family: 'Montserrat', sans-serif;">
                            First 10 owners (Founders Tier) &rarr; $999 USD
                        </p>

                        <div class="mb-8">
                            <button id="addToBagBtn" data-product-id="centum-package"
                                class="w-full max-w-[631px] h-[75px] bg-white text-black font-extrabold rounded-[36px] hover:bg-white/90 transition-colors text-[27px]" style="font-family: 'Montserrat', sans-serif;">
                                Own The Drop
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="pt-6 mb-6">
                    <h3 class="text-white font-semibold italic mb-4 text-[29px]" style="font-family: 'Montserrat', sans-serif;">
                        &centerdot;Description
                    </h3>

                    <div class="text-white mb-6" style="font-family: 'Montserrat', sans-serif;">
                        <p class="font-bold italic mb-4 text-[21px]">
                            "The Complete Evanox Legacy — Sealed Forever." by EVANOX
                        </p>
                        <p class="font-semibold mb-4 text-[19px]" style="line-height: 1.5;">
                            Own the entire design vault. Over 100 premium PSD, PNG, and JPG creations — curated from every drop, every era, every vision. Only 100 digital licenses will ever exist. No restocks. No reissues. Each copy is uniquely numbered — a permanent badge of ownership in the Evanox legacy. This is not a design pack. This is history — compressed, signed, and sealed. Pressure. Vision. Legacy. You are 1 of 100.
                        </p>
                    </div>

                    <div class="text-white mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[19px]">What's Inside :</span>
                        <p class="font-semibold mt-2 text-[19px]" style="line-height: 1.5;">
                            8 High-resolution poster designs &nbsp; 8 Color variants (Steel Blue, Neon Pink, Electric Green, Purple Flame...) &nbsp; Glossy black wrap with electric chrome-type effect &nbsp; Clean vertical typography — bold, fast, unforgiving
                        </p>
                    </div>

                    <div class="text-white mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[19px]">Perfect For :</span>
                        <p class="font-semibold mt-2 text-[19px]" style="line-height: 1.5;">
                            &bull; Streetwear & racing-inspired fashion drops &bull; Fast-paced digital content, reels, and promo assets &bull; Car meets, urban brands, or high-energy design needs
                        </p>
                    </div>

                    <div class="text-white mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[19px]">Format :</span>
                        <span class="font-semibold text-[19px]"> PNG (transparent background) & High-resolution JPG. No PSD files included</span>
                    </div>

                    <div class="text-white mb-4" style="font-family: 'Montserrat', sans-serif;">
                        <span class="font-extrabold underline text-[19px]">License :</span>
                        <span class="font-semibold text-[19px]"> Strictly limited to 100 digital licenses. No resell. No edits. No re-releases. Just rare digital visuals with velocity — owned by few, respected by many.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Customer Reviews Section --}}
    <section class="container mx-auto px-4 py-8 md:py-12">
        <h2 class="text-white font-black italic mb-6 md:mb-8 text-center text-[18px] md:text-[23px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
            Customer Reviews
        </h2>
        <div class="flex items-center justify-center mb-6 md:mb-8">
            <img src="{{ asset('images/stars-rating.png') }}" alt="5 stars" class="h-4 md:h-6">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-lg p-4 md:p-6 review-card">
                <span class="text-white font-black italic text-[14px] md:text-[16px]" style="font-family: 'Montserrat', sans-serif;">| Mason R.</span>
                <p class="text-white font-semibold mt-2 md:mt-3 text-[13px] md:text-[14.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                    This design hits hard. The contrast between the message and the shimmer makes it perfect for our digital merch line. Clean, crisp, and confident — just how I like it.
                </p>
            </div>
            <div class="rounded-lg p-4 md:p-6 review-card">
                <span class="text-white font-black italic text-[14px] md:text-[16px]" style="font-family: 'Montserrat', sans-serif;">| Mason R.</span>
                <p class="text-white font-semibold mt-2 md:mt-3 text-[13px] md:text-[14.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                    This design hits hard. The contrast between the message and the shimmer makes it perfect for our digital merch line. Clean, crisp, and confident — just how I like it.
                </p>
            </div>
            <div class="rounded-lg p-4 md:p-6 review-card">
                <span class="text-white font-black italic text-[14px] md:text-[16px]" style="font-family: 'Montserrat', sans-serif;">| Mason R.</span>
                <p class="text-white font-semibold mt-2 md:mt-3 text-[13px] md:text-[14.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                    This design hits hard. The contrast between the message and the shimmer makes it perfect for our digital merch line. Clean, crisp, and confident — just how I like it.
                </p>
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
