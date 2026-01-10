@extends('layouts.store.app')

@section('title', 'EVANOX - Home')

@section('content')
    <!-- Newsletter Subscription Pop-up -->
    <div id="newsletter-popup"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 flex items-center justify-center hidden transition-all duration-300 opacity-0">
        <div class="relative max-w-md mx-4 transform scale-95 transition-all duration-300">
            <!-- Background Image with Dark Overlay -->
            <div class="relative rounded-3xl overflow-hidden"
                style="background-image: url('{{ asset('images/Artboard 8.png') }}'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-black bg-opacity-70"></div>

                <!-- Close Button -->
                <button id="close-popup"
                    class="absolute top-4 right-4 text-white hover:text-gray-300 w-8 h-8 rounded-full bg-gray-800 bg-opacity-50 flex items-center justify-center text-lg font-light transition-colors duration-200 z-50 cursor-pointer">
                    ×
                </button>

                <!-- Content -->
                <div class="relative z-10 text-center p-8 text-white">
                    <h2 class="text-3xl font-bold mb-6 tracking-wide font-montserrat leading-tight">
                        WANT 20% OFF<br>YOUR FIRST DROP?
                    </h2>

                    <p class="text-gray-200 text-sm mb-4 font-nunito leading-relaxed">
                        Join the EVANOX newsletter and get 20% off your first design pack — plus early access to our limited
                        drops, creative breakdowns, and exclusive store content.
                    </p>

                    <p class="text-gray-300 text-sm mb-8 font-nunito">
                        Just drop your email below — no spam, no clutter.<br>Only real design heat.
                    </p>

                    <!-- Email Form -->
                    <form id="newsletter-form" class="space-y-4">
                        @csrf
                        <div>
                            <input type="email" id="newsletter-email" name="email" placeholder="Email" required
                                class="w-full px-6 py-4 rounded-full bg-white text-black">
                        </div>

                        <button type="submit"
                            class="bg-transparent border-2 border-white text-white py-3 px-8 rounded-full">
                            SUBMIT
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Limited Edition Pop-up -->
    <div id="limited-edition-popup"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 flex items-center justify-center hidden transition-all duration-300 opacity-0">
        <div class="relative max-w-md mx-4 transform scale-95 transition-all duration-300">
            <!-- Background Image with Dark Overlay -->
            <div class="relative rounded-3xl overflow-hidden"
                style="background-image: url('{{ asset('images/Artboard 9.png') }}'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-black bg-opacity-70"></div>

                <!-- Close Button -->
                <button id="close-limited-popup"
                    class="absolute top-4 right-4 text-white hover:text-gray-300 w-8 h-8 rounded-full bg-gray-800 bg-opacity-50 flex items-center justify-center text-lg font-light transition-colors duration-200 z-50 cursor-pointer">
                    ×
                </button>

                <!-- Content -->
                <div class="relative z-10 text-left p-8 text-white">
                    <h2 class="text-3xl font-bold mb-6 tracking-wide font-montserrat leading-tight">
                        LIMITED EDITION<br>ONLY 100 LICENSES
                    </h2>

                    <div class="space-y-4 mb-8">
                        <p class="text-gray-200 text-sm font-nunito leading-relaxed">
                            This design isn't mass-produced.<br>
                            It's part of a <strong class="text-white">one-time release</strong>, limited to just <strong
                                class="text-white">100 licenses worldwide</strong>.
                        </p>

                        <p class="text-gray-200 text-sm font-nunito leading-relaxed">
                            Once it's gone, it's gone<br>
                            <strong class="text-white">No re-releases. No second chances.</strong>
                        </p>

                        <p class="text-gray-200 text-sm font-nunito leading-relaxed">
                            We believe in creating art that holds value<br>
                            <strong class="text-white">for the few, not for everyone</strong>.<br>
                            Own something rare. Own something real.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Success Pop-up -->
    <div id="newsletter-success-popup"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 flex items-center justify-center hidden transition-all duration-300 opacity-0">
        <div class="relative max-w-md mx-4 transform scale-95 transition-all duration-300">
            <!-- Background with Dark Overlay -->
            <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-gray-900 to-black">
                <!-- Close Button -->
                <button id="close-newsletter-success-popup"
                    class="absolute top-4 right-4 text-white hover:text-gray-300 w-8 h-8 rounded-full bg-gray-800 bg-opacity-50 flex items-center justify-center text-lg font-light transition-colors duration-200 z-50 cursor-pointer">
                    ×
                </button>

                <!-- Content -->
                <div class="relative z-10 text-left p-8 text-white">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold mb-4 tracking-wide font-montserrat leading-tight">
                            SUCCESS!
                        </h2>
                    </div>

                    <div class="text-center space-y-4">
                        <p class="text-gray-200 text-base font-nunito leading-relaxed">
                            <strong class="text-white">Coupon created successfully!</strong>
                        </p>
                        
                        <p class="text-gray-200 text-sm font-nunito leading-relaxed">
                            Check your email for your <strong class="text-white">20% discount code</strong> and exclusive access to our newsletter.
                        </p>
                        
                        <div class="pt-4">
                            <button id="newsletter-success-ok" 
                                class="bg-white text-black py-3 px-8 rounded-full font-semibold hover:bg-gray-200 transition-colors duration-200">
                                GOT IT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-2 sm:px-4 py-8 sm:py-16">
        <div class="flex justify-center items-center min-h-[60vh] sm:min-h-screen">
            <div class="w-full max-w-6xl mt-8 sm:mt-16">
                <div class="bg-white p-3 sm:p-5 pb-6 sm:pb-8 shadow-xl w-full rounded-[30px] sm:rounded-[50px] md:rounded-[100px] relative">
                    <div class="flex flex-row items-center justify-between">
                        <div class="w-2/5 pr-2 sm:pr-4 md:pr-8 flex flex-col justify-center">
                            <div class="pl-2 sm:pl-4 md:pl-6 pt-2 sm:pt-4">
                                <h2
                                    class="text-[10px] sm:text-[16px] md:text-26px lg:text-42px font-bold mb-1 sm:mb-4 md:mb-6 uppercase tracking-wide font-montserrat leading-tight text-left">
                                    THE&nbsp;T&#8209;SHIRT<br>DESIGN&nbsp;DROP&nbsp;THAT<br>BUILDS&nbsp;BRANDS</h2>
                                <p class="text-[5px] sm:text-[10px] md:text-16.97px font-nunito font-normal max-w-xs leading-tight sm:leading-relaxed tracking-normal">
                                    Timeless visual design for those who lead,
                                    not follow. Crafted in limited drops. Worn by
                                    intention.
                                </p>
                            </div>
                        </div>
                        <div class="w-3/5 flex justify-center md:justify-end">
                            <img src="{{ asset('images/ex.png') }}" alt="Evanox Image"
                                class="max-h-[140px] sm:max-h-[280px] md:max-h-[460px] w-auto object-contain">
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 transform translate-y-1/2 ml-2 sm:ml-4 md:ml-16">
                        <a href="{{ route('drop') }}"
                            class="bg-white text-black px-3 py-1.5 sm:px-5 sm:py-2 md:px-8 md:py-3 rounded-full font-montserrat font-semibold text-[8px] sm:text-sm md:text-lg uppercase hover:bg-black hover:text-white transition-colors inline-block shadow-md">
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
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                @forelse($products as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('store.show', $product->slug) }}" class="block h-full">
                            <div
                                class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                                <div class="relative">
                                    @if ($product->images && $product->images->count() > 0)
                                        <img src="{{ Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) }}"
                                            alt="{{ $product->title }}" class="w-full h-auto rounded-lg">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                            class="w-full h-auto rounded-lg">
                                    @endif
                                    @php
                                        $finalPrice =
                                            $product->price - ($product->price * $product->discount_percentage) / 100;
                                    @endphp
                                </div>
                                <div class="p-4">
                                    <h3 class="text-white text-14px font-bold mb-2 uppercase">{{ $product->title }}</h3>
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-500 star-rating">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                        <span
                                            class="text-gray-400 text-10px ml-2">({{ $product->reviews_count ?? 0 }})</span>
                                    </div>
                                    <p class="text-14.42px font-bold text-white">{{ number_format($finalPrice, 2) }} $</p>
                                    @if ($product->discount_percentage > 0)
                                        <span class="text-xs text-red-400">-{{ $product->discount_percentage }}%</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="p-4 text-white text-center">No products available.</div>
                    </div>
                @endforelse
            </div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>



    <!-- Category Products Sections -->
    @foreach ($categories as $category)
        <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
            <h2 class="text-18px font-bold text-white text-center mb-1 uppercase tracking-wide font-montserrat">
                {{ $category->title }}
            </h2>
            <p class="text-14px text-white text-center mb-8 md:mb-16 font-montserrat font-normal">
                "{{ $category->sub_title ?? 'CATEGORY PRODUCTS' }}"
            </p>
            <div class="swiper product-slider-{{ $category->id }}">
                <div class="swiper-wrapper">
                    @forelse($category->products as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('store.show', $product->slug) }}" class="block h-full">
                                <div
                                    class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                                    <div class="relative">
                                        @if ($product->images && $product->images->count() > 0)
                                            <img src="{{ Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) }}"
                                                alt="{{ $product->title }}" class="w-full h-auto rounded-lg">
                                        @else
                                            <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                                class="w-full h-auto rounded-lg">
                                        @endif
                                        @php
                                            $finalPrice =
                                                $product->price -
                                                ($product->price * $product->discount_percentage) / 100;
                                        @endphp
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-white text-14px font-bold mb-2 uppercase">{{ $product->title }}
                                        </h3>
                                        <div class="flex items-center mb-3">
                                            <div class="flex text-yellow-500 star-rating">
                                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                            </div>
                                            <span
                                                class="text-gray-400 text-10px ml-2">({{ $product->reviews_count ?? 0 }})</span>
                                        </div>
                                        <p class="text-14.42px font-bold text-white">{{ number_format($finalPrice, 2) }} $
                                        </p>
                                        @if ($product->discount_percentage > 0)
                                            <span
                                                class="text-xs text-red-400">-{{ $product->discount_percentage }}%</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="p-4 text-white text-center">No products available in this category.</div>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
    @endforeach
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/homepage.js') }}"></script>
@endpush
