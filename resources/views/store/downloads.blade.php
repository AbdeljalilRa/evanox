@extends('layouts.store.app')

@section('title', 'My Downloads - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-wide font-montserrat">
                MY DOWNLOADS
            </h1>
            <p class="text-gray-300 font-nunito">
                Access all your purchased digital assets
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Downloads List -->
            <div class="space-y-6">
                <!-- Download Item -->
                <div class="bg-gray-900 border border-gray-700 rounded-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold font-montserrat text-white mb-2">Exclusive Design Pack Vol. 1</h3>
                            <div class="text-gray-300 font-nunito space-y-1">
                                <p><strong>Order ID:</strong> #EVNX001</p>
                                <p><strong>Purchase Date:</strong> March 15, 2024</p>
                                <p><strong>License:</strong> Commercial Use</p>
                                <p><strong>File Format:</strong> PSD, PNG, JPG</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button class="bg-white text-black px-6 py-3 rounded-lg font-bold font-montserrat hover:bg-gray-200 transition-colors text-sm">
                                DOWNLOAD FILES
                            </button>
                            <button class="border border-gray-600 text-white px-6 py-3 rounded-lg font-bold font-montserrat hover:border-white transition-colors text-sm">
                                VIEW LICENSE
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Another Download Item -->
                <div class="bg-gray-900 border border-gray-700 rounded-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold font-montserrat text-white mb-2">Limited Edition Graphics Set</h3>
                            <div class="text-gray-300 font-nunito space-y-1">
                                <p><strong>Order ID:</strong> #EVNX002</p>
                                <p><strong>Purchase Date:</strong> March 10, 2024</p>
                                <p><strong>License:</strong> Personal Use</p>
                                <p><strong>File Format:</strong> AI, SVG, PNG</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button class="bg-white text-black px-6 py-3 rounded-lg font-bold font-montserrat hover:bg-gray-200 transition-colors text-sm">
                                DOWNLOAD FILES
                            </button>
                            <button class="border border-gray-600 text-white px-6 py-3 rounded-lg font-bold font-montserrat hover:border-white transition-colors text-sm">
                                VIEW LICENSE
                            </button>
                        </div>
                    </div>
                </div>

                <!-- No Downloads State -->
                <!--
                <div class="text-center py-16">
                    <div class="mb-8">
                        <svg class="mx-auto h-24 w-24 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-montserrat text-gray-400 mb-4">No Downloads Yet</h3>
                    <p class="text-gray-500 font-nunito mb-8">Start exploring our exclusive collections and build your digital asset library.</p>
                    <a href="{{ route('collections') }}" 
                       class="inline-block bg-white text-black px-8 py-4 rounded-lg font-bold font-montserrat hover:bg-gray-200 transition-colors">
                        BROWSE COLLECTIONS
                    </a>
                </div>
                -->
            </div>

            <!-- Back to Profile -->
            <div class="text-center mt-12">
                <a href="{{ route('profile.show') }}" 
                   class="inline-block border border-gray-600 text-white px-8 py-3 rounded-lg font-bold font-montserrat hover:border-white transition-colors">
                    BACK TO PROFILE
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Downloads page specific styles */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    h1 {
        font-size: 2.5rem !important;
    }
    
    .flex-col.sm\:flex-row {
        flex-direction: column;
    }
    
    .flex-col.sm\:flex-row button {
        text-align: center;
    }
}
</style>
@endpush