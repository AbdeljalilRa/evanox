@extends('layouts.store.app')

@section('title', 'EVANOX - Archive')


@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-black text-white px-4">
    <!-- Top Quote Section -->
    <div class="text-center max-w-4xl mx-auto mb-16">
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
    <div class="max-w-7xl mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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
                    <p>
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
            <div class="flex justify-center">
                <div class="w-full max-w-md aspect-video bg-gray-800 rounded-lg overflow-hidden">
                    <video 
                        class="w-full h-full object-cover" 
                        controls 
                        poster="/images/video-placeholder.jpg"
                    >
                        <source src="/videos/evanox-centum.mp4" type="video/mp4">
                        <p class="text-white p-4">Your browser does not support the video tag.</p>
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>