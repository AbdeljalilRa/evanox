@extends('layouts.store.app')

@section('title', 'EVANOX - Home')

@section('content')
    <!-- Newsletter Subscription Pop-up -->
    <div id="newsletter-popup" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 flex items-center justify-center hidden transition-all duration-300 opacity-0">
        <div class="relative max-w-md mx-4 transform scale-95 transition-all duration-300">
            <!-- Background Image with Dark Overlay -->
            <div class="relative rounded-3xl overflow-hidden" style="background-image: url('{{ asset('images/Artboard 8.png') }}'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-black bg-opacity-70"></div>
                
                <!-- Close Button -->
                <button id="close-popup" class="absolute top-4 right-4 text-white hover:text-gray-300 w-8 h-8 rounded-full bg-gray-800 bg-opacity-50 flex items-center justify-center text-lg font-light transition-colors duration-200 z-50 cursor-pointer">
                    ×
                </button>
                
                <!-- Content -->
                <div class="relative z-10 text-center p-8 text-white">
                    <h2 class="text-3xl font-bold mb-6 tracking-wide font-montserrat leading-tight">
                        WANT 20% OFF<br>YOUR FIRST DROP?
                    </h2>
                    
                    <p class="text-gray-200 text-sm mb-4 font-nunito leading-relaxed">
                        Join the EVANOX newsletter and get 20% off your first design pack — plus early access to our limited drops, creative breakdowns, and exclusive store content.
                    </p>
                    
                    <p class="text-gray-300 text-sm mb-8 font-nunito">
                        Just drop your email below — no spam, no clutter.<br>Only real design heat.
                    </p>
                    
                    <!-- Email Form -->
                    <form id="newsletter-form" class="space-y-4">
                        <div>
                            <input 
                                type="email" 
                                id="newsletter-email" 
                                placeholder="Email" 
                                required
                                class="w-full px-6 py-4 rounded-full bg-white text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400 text-center font-nunito"
                            >
                        </div>
                        
                        <button 
                            type="submit" 
                            class="bg-transparent border-2 border-white text-white py-3 px-8 rounded-full font-montserrat font-semibold text-sm uppercase tracking-wider hover:bg-white hover:text-black transition-all duration-300"
                        >
                            SUBMIT
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16">
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-6xl mt-16">
                <div class="bg-white p-4 md:p-5 pb-8 shadow-xl w-full rounded-[50px] md:rounded-[100px] relative">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="w-full md:w-2/5 md:pr-8 flex flex-col justify-center">
                            <div class="px-4 md:pl-6 pt-4">
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
                        <div class="w-full md:w-3/5 flex justify-center md:justify-end mt-6 md:mt-0">
                            <img src="{{ asset('images/ex.png') }}" alt="Evanox Image"
                                class="max-h-[280px] md:max-h-[460px] w-auto object-contain">
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 transform translate-y-1/2 ml-4 md:ml-16">
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
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                @forelse($products as $product)
                    <div class="swiper-slide">
                        <a href="{{ route('store.show', $product->slug) }}" class="block h-full">
                            <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                                <div class="relative">
                                    @if($product->images && $product->images->count() > 0)
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                                             alt="{{ $product->title }}"
                                             class="w-full h-auto rounded-lg">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" 
                                             alt="No image"
                                             class="w-full h-auto rounded-lg">
                                    @endif
                                    @php
                                        $finalPrice = $product->price - ($product->price * $product->discount_percentage) / 100;
                                    @endphp
                                </div>
                                <div class="p-4">
                                    <h3 class="text-white text-14px font-bold mb-2 uppercase">{{ $product->title }}</h3>
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-500 star-rating">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                        <span class="text-gray-400 text-10px ml-2">({{ $product->reviews_count ?? 0 }})</span>
                                    </div>
                                    <p class="text-14.42px font-bold text-white">{{ number_format($finalPrice, 2) }} $</p>
                                    @if($product->discount_percentage > 0)
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
    @foreach($categories as $category)
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
                                <div class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 h-full rounded-lg">
                                    <div class="relative">
                                        @if($product->images && $product->images->count() > 0)
                                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                                                 alt="{{ $product->title }}"
                                                 class="w-full h-auto rounded-lg">
                                        @else
                                            <img src="{{ asset('images/no-image.png') }}" 
                                                 alt="No image"
                                                 class="w-full h-auto rounded-lg">
                                        @endif
                                        @php
                                            $finalPrice = $product->price - ($product->price * $product->discount_percentage) / 100;
                                        @endphp
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-white text-14px font-bold mb-2 uppercase">{{ $product->title }}</h3>
                                        <div class="flex items-center mb-3">
                                            <div class="flex text-yellow-500 star-rating">
                                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                            </div>
                                            <span class="text-gray-400 text-10px ml-2">({{ $product->reviews_count ?? 0 }})</span>
                                        </div>
                                        <p class="text-14.42px font-bold text-white">{{ number_format($finalPrice, 2) }} $</p>
                                        @if($product->discount_percentage > 0)
                                            <span class="text-xs text-red-400">-{{ $product->discount_percentage }}%</span>
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

        /* Newsletter Popup Styles */
        #newsletter-popup {
            transition: opacity 0.3s ease-in-out;
        }

        #newsletter-popup .relative {
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        }

        #newsletter-popup .rounded-3xl {
            min-height: 500px;
            width: 100%;
            max-width: 400px;
        }

        #newsletter-popup input {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #newsletter-popup input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        #newsletter-popup button[type="submit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        #newsletter-popup h2 {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Responsive adjustments for popup */
        @media (max-width: 640px) {
            #newsletter-popup .rounded-3xl {
                margin: 1rem;
                min-height: 450px;
                max-width: calc(100% - 2rem);
            }
            
            #newsletter-popup .p-8 {
                padding: 2rem 1.5rem;
            }
            
            #newsletter-popup h2 {
                font-size: 1.75rem;
                line-height: 1.2;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // First main products slider
            new Swiper('.product-slider', {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: '.product-slider .swiper-button-next',
                    prevEl: '.product-slider .swiper-button-prev'
                },
                pagination: {
                    el: '.product-slider .swiper-pagination',
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

            // Dynamically initialize Swiper for each category slider
            @foreach ($categories as $category)
                new Swiper('.product-slider-{{ $category->id }}', {
                    slidesPerView: 3,
                    spaceBetween: 10,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    navigation: {
                        nextEl: '.product-slider-{{ $category->id }} .swiper-button-next',
                        prevEl: '.product-slider-{{ $category->id }} .swiper-button-prev'
                    },
                    pagination: {
                        el: '.product-slider-{{ $category->id }} .swiper-pagination',
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
            @endforeach

            // Newsletter Pop-up Functionality
            initNewsletterPopup();
        });

        function initNewsletterPopup() {
            const popup = document.getElementById('newsletter-popup');
            const closeBtn = document.getElementById('close-popup');
            const form = document.getElementById('newsletter-form');
            const emailInput = document.getElementById('newsletter-email');
            
            console.log('Newsletter popup elements:', { popup, closeBtn, form, emailInput });
            
            // Check if popup was already closed in this session
            if (sessionStorage.getItem('newsletter-popup-closed') === 'true') {
                console.log('Popup already closed in this session');
                return;
            }

            // Show popup after 3 seconds
            setTimeout(() => {
                console.log('Showing popup...');
                showPopup();
            }, 3000);

            // Close popup handlers
            if (closeBtn) {
                closeBtn.addEventListener('click', function(e) {
                    console.log('Close button clicked');
                    e.preventDefault();
                    e.stopPropagation();
                    hidePopup();
                });
            } else {
                console.error('Close button not found!');
            }
            
            // Close when clicking outside the modal
            popup.addEventListener('click', (e) => {
                if (e.target === popup) {
                    hidePopup();
                }
            });

            // Handle form submission
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const email = emailInput.value.trim();
                
                if (email && isValidEmail(email)) {
                    console.log('Newsletter subscription:', email);
                    
                    // Show success message (you can customize this)
                    alert('Thank you for subscribing! Your 20% discount will be sent to your email.');
                    
                    hidePopup();
                } else {
                    alert('Please enter a valid email address.');
                }
            });

            // Keyboard accessibility
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
                    hidePopup();
                }
            });

            function showPopup() {
                popup.classList.remove('hidden');
                setTimeout(() => {
                    popup.classList.remove('opacity-0');
                    popup.querySelector('.relative').classList.remove('scale-95');
                    popup.querySelector('.relative').classList.add('scale-100');
                }, 10);
                
                // Focus on email input for accessibility
                setTimeout(() => {
                    emailInput.focus();
                }, 300);
            }

            function hidePopup() {
                console.log('hidePopup called');
                popup.classList.add('opacity-0');
                const relativeElement = popup.querySelector('.relative');
                if (relativeElement) {
                    relativeElement.classList.remove('scale-100');
                    relativeElement.classList.add('scale-95');
                } else {
                    console.error('Relative element not found for scaling');
                }
                
                setTimeout(() => {
                    popup.classList.add('hidden');
                    console.log('Popup hidden');
                }, 300);

                // Remember that popup was closed
                sessionStorage.setItem('newsletter-popup-closed', 'true');
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
        }
    </script>
@endpush
