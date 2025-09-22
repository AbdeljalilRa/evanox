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
</div>


<script src="{{ asset('assets/js/archive.js') }}"></script>
@endsection