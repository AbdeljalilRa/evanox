@extends('layouts.store.app')

@section('title', 'EVANOX - Home')

@section('content')
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16">
        <div class="flex justify-center items-center min-h-screen">
            <!-- Centered White Card -->
            <div class="w-full max-w-6xl mt-16"> <!-- Increased width from max-w-5xl to max-w-6xl -->
                <!-- White Card with Rounded Top & Bottom -->
                <div class="bg-white p-4 md:p-5 pb-8 shadow-xl w-full rounded-[50px] md:rounded-[100px] relative">
                    <!-- Adjusted padding and border radius for mobile -->
                    <!-- Card content with image on the right -->
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <!-- Left content area (for text) -->
                        <div class="w-full md:w-2/5 md:pr-8 flex flex-col justify-center">
                            <!-- Added flex and center alignment -->
                            <div class="px-4 md:pl-6 pt-4"> <!-- Added horizontal padding for mobile -->
                                <h2
                                    class="text-26px md:text-42px font-bold mb-4 md:mb-6 uppercase tracking-wide font-montserrat leading-tight text-left">
                                    THE&nbsp;T&#8209;SHIRT<br>DESIGN&nbsp;DROP&nbsp;THAT<br>BUILDS&nbsp;BRANDS</h2>
                                <p class="text-16.97px font-nunito font-normal max-w-xs leading-relaxed tracking-normal">
                                    Timeless visual design for those who lead,
                                    not follow. Crafted in limited drops. Worn by
                                    intention.
                                </p>
                            </div>
                        </div>

                        <!-- Right content area (image) -->
                        <div class="w-full md:w-3/5 flex justify-center md:justify-end mt-6 md:mt-0">
                            <img src="images/ex.png" alt="Evanox Image"
                                class="max-h-[280px] md:max-h-[460px] w-auto object-contain">
                            <!-- Adjusted image size for mobile -->
                        </div>
                    </div>

                    <!-- Button positioned at the bottom edge -->
                    <div class="absolute bottom-0 left-0 transform translate-y-1/2 ml-4 md:ml-16">
                        <!-- Adjusted margin for mobile -->
                        <a href="#"
                            class="bg-white text-black px-5 py-2 md:px-8 md:py-3 rounded-full font-montserrat font-semibold text-sm md:text-lg uppercase hover:bg-black hover:text-white transition-colors inline-block">
                            GET THE DROP
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Product Section with Slider -->
    <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
        <h2 class="text-18px font-bold text-white text-center mb-1 uppercase tracking-wide font-montserrat">NEW IN STORE
        </h2>
        <p class="text-14px text-white text-center mb-8 md:mb-16 font-montserrat font-normal">"TRENDING"</p>

        <!-- Swiper Slider Container -->
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <!-- Product Slide 1 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/LECLER BOX 2.png" alt="Design Pack 1" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>NIGHT DEVIL:
                                APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(42)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 2 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/box scarface2.png" alt="Design Pack 2" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>GOOD DAY
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(17)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 3 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/trikkko .png" alt="Design Pack 3" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN JOEL<br>EMBIID:
                                PROCESS REIGN</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(10)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 4 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/BOX FACE.png" alt="Design Pack 4" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>TRIKKO
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(28)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">89,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 5 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/boxx rihana 2.png" alt="Design Pack 5" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>LIMITED COLLECTION
                            </h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(35)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">49,99 USD</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Add Navigation Arrows -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Product Section with Slider 2 -->
    <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
        <h2 class="text-18px font-bold text-white text-center mb-1 uppercase tracking-wide font-montserrat">LEGEND NEVER
            DIE</h2>
        <p class="text-14px text-white text-center mb-8 md:mb-16 font-montserrat font-normal">"THE CROWNS NEVER FALL"</p>

        <!-- Swiper Slider Container -->
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <!-- Product Slide 1 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/21 savage.png" alt="Design Pack 1" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>NIGHT DEVIL:
                                APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(42)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 2 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/travis scoot.png" alt="Design Pack 2" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>GOOD DAY
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(17)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 3 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/west bopx.png" alt="Design Pack 3" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN JOEL<br>EMBIID:
                                PROCESS REIGN</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(10)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 4 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/ce ntrel cee. box2.png" alt="Design Pack 4" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>TRIKKO
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(28)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">89,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 5 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/chriis BOX.png" alt="Design Pack 5" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>LIMITED
                                COLLECTION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(35)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">49,99 USD</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Add Navigation Arrows -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Product Section with Slider 3 -->
    <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
        <h2 class="text-18px font-bold text-white text-center mb-1 uppercase tracking-wide font-montserrat">EYE CONTACT:
            HIP HOP ICONS</h2>
        <p class="text-14px text-white text-center mb-8 md:mb-16 font-montserrat font-normal">"LEGENDS FRAMED IN A SINGLE
            GLANCE"</p>

        <!-- Swiper Slider Container -->
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <!-- Product Slide 1 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/TBAC BOX.png" alt="Design Pack 1" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>NIGHT DEVIL:
                                APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(42)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 2 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/BIG FACE FUTURE.png" alt="Design Pack 2" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>GOOD DAY
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(17)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 3 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/young BOX.png" alt="Design Pack 3" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN JOEL<br>EMBIID:
                                PROCESS REIGN</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(10)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 4 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/BOX FACE.png" alt="Design Pack 4" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>TRIKKO
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(28)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">89,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 5 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/big face fifty cent BOX.png" alt="Design Pack 5" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>LIMITED
                                COLLECTION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(35)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">49,99 USD</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Add Navigation Arrows -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Product Section with Slider 4 -->
    <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
        <h2 class="text-18px font-bold text-white text-center mb-1 uppercase tracking-wide font-montserrat">EVANOX
            BASKETBALL LAB</h2>
        <p class="text-14px text-white text-center mb-8 md:mb-16 font-montserrat font-normal">"COURT LEGEND IN DESIGN
            FORM."</p>

        <!-- Swiper Slider Container -->
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                <!-- Product Slide 1 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/box cobe 12.png" alt="Design Pack 1" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>NIGHT DEVIL:
                                APOCALYPSE EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(42)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">29,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 2 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/lebron j.png" alt="Design Pack 2" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>GOOD DAY
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(17)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 3 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/stephen.png" alt="Design Pack 3" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN JOEL<br>EMBIID:
                                PROCESS REIGN</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(10)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">39,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 4 -->
                <div class="swiper-slide">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/TATUM BOX.png" alt="Design Pack 4" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN SZA:<br>TRIKKO
                                EDITION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(28)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">89,99 USD</p>
                        </div>
                    </div>
                </div>

                <!-- Product Slide 5 -->
                <div class="swiper-slide">
                    <div
                        class=" overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                        <div class="relative">
                            <img src="images/lukaaaaa232.png" alt="Design Pack 5" class="w-full h-auto">
                            <!-- <div class="absolute top-3 right-3 bg-black/50 backdrop-blur-sm p-1.5 rounded"> -->
                            <!-- <img src="images/ps-icon.png" alt="Photoshop" class="w-6 h-6"> -->
                            <!-- </div> -->
                        </div>
                        <div class="p-4">
                            <h3 class="text-white text-14px font-bold mb-2 uppercase">EXCLUSIVE DESIGN<br>LIMITED
                                COLLECTION</h3>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-500 star-rating">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>
                                <span class="text-gray-400 text-10px ml-2">(35)</span>
                            </div>
                            <p class="text-14.42px font-bold text-white">49,99 USD</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Add Navigation Arrows -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection

{{-- Push additional CSS --}}
@push('styles')
    {{-- Extra styles --}}
    <style>
        .rounded-custom {
            border-radius: 30px !important;
        }

        h2 {
            letter-spacing: 0.02em;
            word-spacing: 0.05em;
        }

        p {
            line-height: 1.6;
            letter-spacing: 0.01em;
            word-spacing: 0.03em;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: white !important;
            background-color: rgba(0, 0, 0, 0.5);
            width: 40px !important;
            height: 40px !important;
            border-radius: 50%;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px !important;
        }

        .swiper-pagination-bullet {
            background: white !important;
        }

        .swiper-pagination-bullet-active {
            background: #ffffff !important;
        }

        .product-slider {
            padding-bottom: 60px;
        }

        .star-rating span {
            margin-right: 3px;
        }

        @media (max-width: 767px) {
            .product-slider {
                padding: 0 5px 50px 5px;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 30px !important;
                height: 30px !important;
            }

            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 16px !important;
            }

            .swiper-pagination {
                bottom: 10px !important;
            }

            .swiper-slide .p-4 {
                padding: 0.75rem !important;
            }

            .swiper-slide .flex.text-yellow-500 span {
                font-size: 0.75rem !important;
            }
        }
    </style>
@endpush

{{-- Push additional JS --}}
@push('scripts')
    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // Swiper init
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.product-slider', {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    }
                }
            });
        });
    </script>
@endpush
