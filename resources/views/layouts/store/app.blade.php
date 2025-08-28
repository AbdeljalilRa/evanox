<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EVANOX - T-Shirt Design')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tailwind config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                        nunito: ['Nunito', 'sans-serif'],
                    },
                    fontSize: {
                        '26px': '1.625rem',
                        '42px': '2.625rem',
                        '16.97px': '1.06rem',
                        '18px': '1.125rem',
                        '14px': '0.875rem',
                        '14.42px': '0.9rem',
                        '10px': '0.625rem',
                    }
                }
            }
        }
    </script>

    {{-- Custom CSS for smooth scrolling and back to top button --}}
    <style>
        /* Smooth scroll behavior for the entire page */
        html {
            scroll-behavior: smooth;
        }

        /* Back to top button custom transitions */
        [x-cloak] { display: none !important; }
        
        /* Custom shadow for the back to top button */
        .back-to-top-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-black font-montserrat">

    {{-- Header --}}
    <header class="fixed w-full top-0 z-50 bg-black/95 backdrop-blur-sm transition-transform duration-300">
        @include('layouts.store.navbar')
    </header>

    {{-- Page content --}}
    <main class="pt-20">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.store.footer')

    {{-- Back to Top Button --}}
    <div x-data="backToTop()" x-show="showButton" x-transition class="fixed bottom-6 right-6 z-50">
        <button 
            @click="scrollToTop()" 
            class="bg-white hover:bg-gray-100 text-black p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-gray-300"
            aria-label="Back to top"
            title="Back to top"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
            </svg>
        </button>
    </div>

   
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        // Back to Top Component for Alpine.js
        document.addEventListener('alpine:init', () => {
            Alpine.data('backToTop', () => ({
                showButton: false,
                
                init() {
                    // Show/hide button based on scroll position
                    window.addEventListener('scroll', () => {
                        this.showButton = window.pageYOffset > 300;
                    });
                },
                
                scrollToTop() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            }));
        });

        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const header = document.querySelector('header');
            let lastScroll = 0;

            // Mobile menu toggle
            if(mobileMenuButton){
                mobileMenuButton.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.remove('hidden');
                        setTimeout(() => {
                            mobileMenu.classList.remove('opacity-0', 'scale-95');
                            mobileMenu.classList.add('opacity-100', 'scale-100');
                        }, 10);
                    } else {
                        mobileMenu.classList.add('opacity-0', 'scale-95');
                        mobileMenu.classList.remove('opacity-100', 'scale-100');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                        }, 300);
                    }
                });
            }

            // Header scroll effect
            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                if (currentScroll <= 0) {
                    header.style.transform = 'translateY(0)';
                    return;
                }
                if (currentScroll > lastScroll) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                lastScroll = currentScroll;
            });
        });
    </script>

   
    @stack('scripts')
</body>
</html>
