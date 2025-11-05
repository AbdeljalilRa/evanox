<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-authenticated" content="{{ auth()->check() ? 'true' : 'false' }}">
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

    {{-- Application CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/evanox-app.css') }}">

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

   
    {{-- AlpineJS Library --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    {{-- Application JavaScript --}}
    <script src="{{ asset('assets/js/evanox-app.js') }}"></script>

   
    @stack('scripts')
    
    {{-- Shopping Bag Structure --}}
    <div id="bag-overlay"></div>
    <div id="evanox-bag-panel">
        <div class="p-4 border-b border-white/10">
            <div class="flex justify-between items-center">
                <h2 class="text-white font-montserrat font-extrabold text-[16px]">YOUR BAG</h2>
                <button id="close-bag" class="text-white hover:text-white/80">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-4" id="bag-content">
            <!-- Bag content will be dynamically loaded here -->
            <div class="py-8 text-center">
                <p class="text-white/70 font-montserrat text-[14px]">Loading your bag...</p>
            </div>
        </div>
        <!-- Checkout button will be dynamically added here when the bag has items -->
    </div>
    
    {{-- CSS and JS Dependencies --}}
    <link rel="stylesheet" href="{{ asset('assets/css/shopping-bag.css') }}">
    <script src="{{ asset('assets/js/shopping-bag.js') }}"></script>
</body>
</html>
