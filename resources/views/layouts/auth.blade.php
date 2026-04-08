<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EVANOX')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                        nunito: ['Nunito', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .gradient-border {
            background: linear-gradient(135deg, #ffffff 0%, #666666 50%, #ffffff 100%);
            padding: 1px;
        }
        .gradient-border-inner {
            background: #000;
        }
        .input-glow:focus {
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .btn-shine:hover::before {
            left: 100%;
        }
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse-ring {
            0%, 100% { opacity: 0.1; }
            50% { opacity: 0.3; }
        }
    </style>

    @stack('styles')
</head>
<body class="font-montserrat text-white antialiased bg-black min-h-screen overflow-x-hidden overflow-y-auto">
    
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Gradient Orbs -->
        <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-gradient-to-br from-gray-800/30 to-transparent rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[600px] h-[600px] bg-gradient-to-tl from-gray-700/20 to-transparent rounded-full blur-3xl floating" style="animation-delay: -3s;"></div>
        
        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
        
        <!-- Decorative Circles -->
        <div class="absolute top-20 right-20 w-32 h-32 border border-white/10 rounded-full pulse-ring hidden lg:block"></div>
        <div class="absolute bottom-32 left-16 w-20 h-20 border border-white/5 rounded-full pulse-ring hidden lg:block" style="animation-delay: -1s;"></div>
    </div>

    <!-- Main Content -->
    <div class="relative min-h-screen flex flex-col lg:flex-row">
        
        <!-- Left Side - Branding (Hidden on mobile) -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center items-center p-12 relative lg:fixed lg:left-0 lg:top-0 lg:h-screen">
            <div class="text-center space-y-8 max-w-md">
                <!-- Lamp and Logo -->
                <a href="{{ url('/') }}" class="inline-block">
                    <div class="flex flex-col items-center">
                        <!-- Lamp Image -->
                        <div class="relative" style="z-index: 10">
                            <img src="{{ asset('images/LAMP.png') }}" alt="Lamp" class="w-48 h-auto">
                        </div>
                        <!-- Evanox Logo -->
                        <div class="-mt-12 relative" style="z-index: 20">
                            <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-48 h-auto">
                        </div>
                    </div>
                </a>
                
                {{-- <div class="w-16 h-1 bg-gradient-to-r from-transparent via-white to-transparent mx-auto"></div> --}}
                
                <p class="text-gray-400 font-nunito text-lg leading-relaxed">
                    Timeless visual design for those who lead, not follow.<br>
                    Crafted in limited drops. Worn by intention.
                </p>
                
                <!-- Feature Pills -->
                <div class="flex flex-wrap justify-center gap-3 pt-4">
                    <span class="px-4 py-2 rounded-full border border-white/20 text-sm text-gray-300">Limited Edition</span>
                    <span class="px-4 py-2 rounded-full border border-white/20 text-sm text-gray-300">Premium Quality</span>
                    <span class="px-4 py-2 rounded-full border border-white/20 text-sm text-gray-300">Exclusive Access</span>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 lg:ml-auto flex flex-col justify-center items-center p-6 sm:p-12 py-12">
            
            <!-- Mobile Logo (Shown only on mobile) -->
            <div class="lg:hidden mb-8 text-center">
                <a href="{{ url('/') }}" class="inline-block">
                    <div class="flex flex-col items-center">
                        <!-- Lamp Image -->
                        <div class="relative" style="z-index: 10">
                            <img src="{{ asset('images/LAMP.png') }}" alt="Lamp" class="w-32 h-auto">
                        </div>
                        <!-- Evanox Logo -->
                        <div class="-mt-8 relative" style="z-index: 20">
                            <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-32 h-auto">
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Form Container -->
            <div class="w-full max-w-md">
                <div class="gradient-border rounded-[40px]">
                    <div class="gradient-border-inner rounded-[40px] p-6 sm:p-8">
                        @yield('content')
                    </div>
                </div>
                
                <!-- Bottom decorative element -->
                <div class="flex justify-center mt-8">
                    <div class="flex items-center gap-2 text-gray-500 text-sm font-nunito">
                        <span class="w-8 h-px bg-gradient-to-r from-transparent to-gray-600"></span>
                        <span>Secure & Encrypted</span>
                        <span class="w-8 h-px bg-gradient-to-l from-transparent to-gray-600"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
