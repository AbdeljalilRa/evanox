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
        <div class="relative max-w-[541px] mx-4 transform scale-95 transition-all duration-300">
            <!-- Background Image with Dark Overlay -->
            <div class="relative rounded-[64px] overflow-hidden"
                style="background-image: url('{{ asset('images/limited-edition-bg.png') }}'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-black bg-opacity-70 rounded-[64px]"></div>
                <!-- White Inset Border -->
                <div class="absolute inset-0 rounded-[64px] pointer-events-none" style="box-shadow: inset 0 0 0 3px rgba(255,255,255,0.9);"></div>

                <!-- Close Button -->
                <button id="close-limited-popup"
                    class="absolute top-8 right-8 w-[27px] h-[27px] cursor-pointer z-50 hover:opacity-75 transition-opacity">
                    <img src="{{ asset('images/cancel-icon.png') }}" alt="Close" class="w-full h-full">
                </button>

                <!-- Content -->
                <div class="relative z-10 text-left px-10 pt-12 pb-10 text-white">
                    <!-- Title -->
                    <div class="mb-6">
                        <h2 class="font-bold text-[28px] uppercase text-white leading-tight" style="font-family: 'Montserrat', sans-serif; letter-spacing: 4.2px;">
                            LIMITED EDITION
                        </h2>
                        <h2 class="font-bold text-[28px] uppercase text-white leading-tight" style="font-family: 'Montserrat', sans-serif; letter-spacing: 6.16px;">
                            ONLY 100 LICENSE
                        </h2>
                    </div>

                    <!-- Body Paragraphs -->
                    <div class="space-y-5">
                        <p class="text-[14px] text-white capitalize" style="font-family: 'Nunito', sans-serif; font-weight: 500; letter-spacing: 1.4px; line-height: 1.4;">
                            This design isn't mass-produced.<br>
                            It's part of a one-time release, limited to just <strong style="font-weight: 900;">100<br>
                            licenses worldwide.</strong>
                        </p>

                        <p class="text-[14px] text-white capitalize" style="font-family: 'Nunito', sans-serif; font-weight: 500; letter-spacing: 1.4px; line-height: 1.34;">
                            Once it's gone, it's gone<br>
                            <strong style="font-weight: 700;">No re-releases. No second chances.</strong>
                        </p>

                        <p class="text-[14px] text-white capitalize" style="font-family: 'Nunito', sans-serif; font-weight: 500; letter-spacing: 1.4px; line-height: 1.34;">
                            We believe in creating art that holds value<br>
                            <strong style="font-weight: 900;">for the few, not for everyone.</strong><br>
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

    <!-- Social Proof Notification -->
    <div id="social-proof" class="fixed bottom-6 left-4 md:left-8 z-40 transition-all duration-500 translate-y-[200%] opacity-0 pointer-events-none">
        <div class="relative flex items-center">
            {{-- Product Image (overlaps left of card) --}}
            <div class="absolute -left-2 md:-left-4 z-10 w-[80px] h-[80px] md:w-[120px] md:h-[105px]">
                <img id="sp-image" src="" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            {{-- White Pill Card --}}
            <div class="bg-white rounded-[59px] pl-[85px] md:pl-[130px] pr-5 md:pr-8 py-3 md:py-4 min-w-[280px] md:min-w-[420px] shadow-2xl">
                <p id="sp-location" class="font-montserrat font-medium text-[10px] md:text-[13px] text-black/60 capitalize leading-tight mb-0.5">
                    Someone in London just purchased
                </p>
                <p id="sp-title" class="font-montserrat font-medium text-[12px] md:text-[17px] text-black uppercase leading-tight mb-0.5 line-clamp-2 max-w-[180px] md:max-w-[280px]">
                    EXCLUSIVE DESIGNNIGHT DEVIL
                </p>
                <p class="font-montserrat font-extrabold text-[11px] md:text-[15px] text-black capitalize leading-tight">
                    &ldquo;secured.&rdquo;
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex justify-center items-center pt-[70px] pb-[120px] px-4">
    <div class="relative w-full max-w-[1162px]">
        <!-- Hero Section as PNG Image - Responsive -->
        <div class="relative">
            <img src="{{ asset('images/hero-section.png') }}" alt="The T-Shirt Design Drop That Builds Brands" 
                class="w-full h-auto">
        </div>
        
        <!-- Button - Scales with image -->
        <div class="absolute bottom-0 left-0 transform translate-y-1/2 ml-4 sm:ml-6 md:ml-24">
                        <a href="{{ route('drop') }}"
                            class="bg-white text-black px-3 py-1.5 sm:px-5 sm:py-2 md:px-8 md:py-3 rounded-full font-montserrat font-bold text-[8px] sm:text-sm md:text-lg uppercase hover:bg-black hover:text-white transition-colors inline-block shadow-md">
                            GET THE DROP
                        </a>
                    </div>
    </div>
</main>

    <!-- Product Section with Slider -->
<section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
    <!-- Section Header -->
    <h2 class="font-montserrat font-black text-[32px] text-white text-center uppercase leading-normal mb-1">
        NEW IN STORE
    </h2>
    <p class="font-montserrat font-medium italic text-[24px] text-white text-center uppercase leading-normal mb-8 md:mb-16">
        "TRENDING."
    </p>
    
    <!-- Product Slider -->
    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            @forelse($products as $product)
                <div class="swiper-slide">
                    <a href="{{ route('store.show', $product->slug) }}" class="block">
                        <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg pl-[30px] sm:pl-[52px]">
                            <!-- Product Image - Offset to left -->
                            <div class="w-[271px] h-[237px] -ml-[57px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                                @if ($product->images && $product->images->count() > 0)
                                    <img src="{{ Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) }}"
                                        alt="{{ $product->title }}" class="w-full h-full object-cover rounded-lg">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                        class="w-full h-full object-cover rounded-lg">
                                @endif
                                @php
                                    $finalPrice = $product->price - ($product->price * $product->discount_percentage) / 100;
                                @endphp
                            </div>
                            
                            <!-- Product Info -->
                            <div class="pt-1 sm:pt-4">
                                <!-- Title -->
                                <h3 class="w-[176px] sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                                    {{ $product->title }}
                                </h3>

                                <!-- Star Rating + Reviews -->
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/stars-rating-gold.svg') }}" alt="Rating" class="w-[110px] h-[10px] sm:w-[168px] sm:h-[16px]">
                                    <span class="text-gray-400 font-montserrat font-black sm:font-normal text-[10px] sm:text-[14px] ml-1 sm:ml-2">({{ $product->reviews_count ?? 45 }})</span>
                                </div>

                                <!-- Price -->
                                <p class="font-montserrat font-extrabold text-[13px] sm:text-[20px] sm:w-[108px] leading-[14px] sm:leading-[24px] text-white uppercase">
                                    {{ number_format($finalPrice, 2) }} USD
                                </p>
                                
                                @if ($product->discount_percentage > 0)
                                    <span class="text-[9px] sm:text-xs text-red-400 font-montserrat">-{{ $product->discount_percentage }}%</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="swiper-slide">
                    <div class="p-4 text-white text-center font-montserrat">No products available.</div>
                </div>
            @endforelse
        </div>
        
        <!-- Navigation Arrows -->
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
    </div>
    
    <!-- View All Button -->
    <div class="flex justify-center mt-8">
        <a href="{{ route('collections') }}" class="bg-white text-black px-8 py-3 rounded-full font-montserrat font-semibold text-sm uppercase hover:bg-black hover:text-white border border-white transition-colors inline-block shadow-lg">
            View All
        </a>
    </div>
</section>



    <!-- Category Products Sections -->
@foreach ($categories as $category)
    <section class="container mx-auto px-1 sm:px-4 py-20 bg-black">
        <!-- Section Header -->
        <h2 class="font-montserrat font-black text-[32px] text-white text-center uppercase leading-normal mb-1">
            {{ $category->title }}
        </h2>
        <p class="font-montserrat font-medium italic text-[24px] text-white text-center uppercase leading-normal mb-8 md:mb-16">
            "{{ $category->sub_title ?? 'CATEGORY PRODUCTS' }}"
        </p>
        
        <!-- Product Slider -->
        <div class="swiper product-slider-{{ $category->id }}">
            <div class="swiper-wrapper">
                @forelse($category->products as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('store.show', $product->slug) }}" class="block">
                            <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg pl-[30px] sm:pl-[52px]">
                                <!-- Product Image - Offset to left -->
                                <div class="w-[271px] h-[237px] -ml-[57px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                                    @if ($product->images && $product->images->count() > 0)
                                        <img src="{{ Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) }}"
                                            alt="{{ $product->title }}" class="w-full h-full object-cover rounded-lg">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                            class="w-full h-full object-cover rounded-lg">
                                    @endif
                                    @php
                                        $finalPrice = $product->price - ($product->price * $product->discount_percentage) / 100;
                                    @endphp
                                </div>
                                
                                <!-- Product Info -->
                                <div class="pt-1 sm:pt-4">
                                    <!-- Title -->
                                    <h3 class="w-[176px] sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                                        {{ $product->title }}
                                    </h3>

                                    <!-- Star Rating + Reviews -->
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[14px] sm:gap-[5px]">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                        <span class="text-gray-400 font-montserrat font-black sm:font-normal text-[10px] sm:text-[14px] ml-1 sm:ml-2">({{ $product->reviews_count ?? 45 }})</span>
                                    </div>

                                    <!-- Price -->
                                    <p class="font-montserrat font-extrabold text-[13px] sm:text-[20px] sm:w-[108px] leading-[14px] sm:leading-[24px] text-white uppercase">
                                        {{ number_format($finalPrice, 2) }} USD
                                    </p>
                                    
                                    @if ($product->discount_percentage > 0)
                                        <span class="text-[9px] sm:text-xs text-red-400 font-montserrat">-{{ $product->discount_percentage }}%</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="p-4 text-white text-center font-montserrat">No products available in this category.</div>
                    </div>
                @endforelse
            </div>
            
            <!-- Navigation Arrows -->
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
        </div>
        
        <!-- View All Button -->
        <div class="flex justify-center mt-8">
            <a href="{{ route('collections.show', $category->slug) }}" class="bg-white text-black px-8 py-3 rounded-full font-montserrat font-semibold text-sm uppercase hover:bg-black hover:text-white border border-white transition-colors inline-block shadow-lg">
                View All
            </a>
        </div>
    </section>
@endforeach
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/homepage.js') }}"></script>

    <!-- Social Proof Notification Rotation -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var notifications = [
            @foreach($products->take(8) as $product)
            {
                title: @json($product->title),
                image: @json($product->images && $product->images->count() > 0 ? Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(60)) : asset('images/no-image.png'))
            },
            @endforeach
        ];

        if (notifications.length === 0) return;

        var locations = [
            'London', 'Paris', 'New York', 'Tokyo', 'Dubai',
            'Los Angeles', 'Berlin', 'Toronto', 'Sydney', 'Milan',
            'Amsterdam', 'Stockholm', 'Seoul', 'Miami', 'Barcelona'
        ];

        var el = document.getElementById('social-proof');
        var spImage = document.getElementById('sp-image');
        var spTitle = document.getElementById('sp-title');
        var spLocation = document.getElementById('sp-location');
        var currentIndex = 0;

        function getRandomLocation() {
            return locations[Math.floor(Math.random() * locations.length)];
        }

        function showNotification() {
            var n = notifications[currentIndex];
            spImage.src = n.image;
            spImage.alt = n.title;
            spTitle.textContent = n.title;
            spLocation.textContent = 'Someone in ' + getRandomLocation() + ' just purchased';

            el.classList.remove('translate-y-[200%]', 'opacity-0');
            el.classList.add('translate-y-0', 'opacity-100');

            setTimeout(function() {
                el.classList.remove('translate-y-0', 'opacity-100');
                el.classList.add('translate-y-[200%]', 'opacity-0');

                currentIndex = (currentIndex + 1) % notifications.length;
            }, 12000);
        }

        // First notification after 5 seconds
        setTimeout(function() {
            showNotification();
            // Then every 15 seconds
            setInterval(showNotification, 15000);
        }, 5000);
    });
    </script>
@endpush
