@extends('layouts.store.blank')

@section('title', 'EVANOX - The Drop')

@push('scripts')
    <script src="{{ asset('assets/js/drop2.js') }}"></script>
@endpush

@section('content')
<!-- Coming Soon Sliding Banner -->
<div id="comingSoonBanner" class="fixed top-0 left-0 w-full bg-black text-white py-3 px-4 z-50 overflow-hidden">
    <div class="flex items-center justify-center">
        <div id="slidingText" class="flex whitespace-nowrap animate-pulse">
            <span class="font-bold text-lg mr-16 font-neue">COMING SOON</span>
        </div>
    </div>
</div>

<div class="flex flex-col items-center justify-center h-screen overflow-hidden pt-16 bg-black">

    <!-- Lamp -->
    <div class="relative z-10">
        <div class="flex justify-center">
            <img src="{{ asset('images/LAMP.png') }}" alt="Lamp" class="w-48 h-auto">
        </div>
    </div>

    <!-- Logo -->
    <div class="mb-5 flex justify-center -mt-12 relative z-20">
        <img src="{{ asset('images/svg.png') }}" alt="EVANOX Logo" class="w-48 h-auto">
    </div>

    <!-- Sign Up Form -->
    <div class="text-center mb-5 w-full max-w-md px-4 relative z-30">
        <h2 class="text-white font-bold text-lg mb-4 font-neue">SIGN UP FOR ACCESS</h2>

        @if(session('success'))
            <p class="text-green-400 mb-3">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <p class="text-red-400 mb-3">{{ $errors->first() }}</p>
        @endif

        <!-- Email Form -->
        <div id="emailOnlyForm" style="display: block;">
            <form method="POST" action="{{ route('comingsoon.request') }}" class="flex items-center mb-3">
                @csrf
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Email"
                    required
                    class="flex-1 px-4 py-2.5 rounded-l-full bg-white text-black placeholder-gray-500 outline-none"
                >
                <button 
                    type="submit" 
                    class="px-6 py-2.5 bg-white text-black font-bold rounded-r-full hover:bg-gray-100 transition"
                >
                    JOIN
                </button>
            </form>
        </div>

        <!-- Toggle Password Button -->
        <button 
            type="button" 
            id="togglePasswordBtn"
            class="text-white underline hover:opacity-75 transition mt-2"
        >
            Enter Using Password
        </button>

        <!-- Password Form -->
        <div id="passwordForm" style="display: none;" class="mt-3">
            <form method="POST" action="{{ route('comingsoon.enter') }}">
                @csrf
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Enter your Email"
                    required
                    class="w-full px-4 py-2.5 rounded-full bg-white text-black placeholder-gray-500 outline-none mb-3"
                >
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Enter Password"
                    required
                    class="w-full px-4 py-2.5 rounded-full bg-white text-black placeholder-gray-500 outline-none mb-3"
                >
                <button 
                    type="submit" 
                    class="w-full px-4 py-2.5 bg-white text-black font-bold rounded-full hover:bg-gray-100 transition"
                >
                    ENTER
                </button>
            </form>
        </div>
    </div>

    <!-- Socials -->
    <div class="flex justify-center space-x-4 mb-6 relative z-20">
        <a href="#" class="text-white hover:opacity-75"><i class="fab fa-instagram w-5 h-5"></i></a>
        <a href="#" class="text-white hover:opacity-75"><i class="fab fa-whatsapp w-5 h-5"></i></a>
        <a href="#" class="text-white hover:opacity-75"><i class="fab fa-tiktok w-5 h-5"></i></a>
        <a href="#" class="text-white hover:opacity-75"><i class="fab fa-x-twitter w-5 h-5"></i></a>
    </div>

    <!-- Footer -->
    <div class="text-center mb-4 relative z-20">
        <p class="text-white font-black text-base mb-1">PRESSURE. VISION. LEGACY.</p>
        <p class="text-white font-bold text-sm">ONLY 100 LICENCE</p>
    </div>
    <div class="text-center relative z-20">
        <p class="text-white text-xs font-satoshi">© 2025 EVANOX. All rights Reserved</p>
    </div>

</div>

<!-- Simple JavaScript toggle without dependencies -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Wait for DOM to be fully loaded
    var toggleBtn = document.getElementById('togglePasswordBtn');
    var emailForm = document.getElementById('emailOnlyForm');
    var passwordForm = document.getElementById('passwordForm');
    
    // Check if elements exist
    if (!toggleBtn || !emailForm || !passwordForm) {
        console.error('Required elements not found!');
        return;
    }
    
    // Add click handler
    toggleBtn.addEventListener('click', function() {
        // Toggle visibility
        if (passwordForm.style.display === 'none') {
            // Show password form, hide email form
            passwordForm.style.display = 'block';
            emailForm.style.display = 'none';
            toggleBtn.textContent = 'Hide Password Form';
        } else {
            // Show email form, hide password form
            passwordForm.style.display = 'none';
            emailForm.style.display = 'block';
            toggleBtn.textContent = 'Enter Using Password';
        }
    });
});
</script>

@endsection