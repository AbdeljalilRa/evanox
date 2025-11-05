@extends('layouts.store.app')

@section('title', 'EVANOX - Your Orders')

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Header Section -->
    <div class="text-center w-full mx-auto pt-16 pb-12">
        <!-- Main Title -->
        <h1 class="font-extrabold italic mb-5 tracking-wide" style="font-family: 'Montserrat', sans-serif; font-size: 42px;">
            YOUR ORDERS
        </h1>
        
        <!-- Subtitle -->
        <p class="font-medium opacity-80 tracking-wider" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">
            TRACK YOUR EVANOX LEGACY
        </p>
    </div>

    <!-- Orders Container -->
    <div class="max-w-6xl mx-auto px-8 pb-20">
        
        <!-- Order Summary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-gray-900/50 border border-white/10 rounded-lg p-6 text-center">
                <h3 class="text-2xl font-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">5</h3>
                <p class="text-white/70 text-sm" style="font-family: 'Montserrat', sans-serif;">TOTAL ORDERS</p>
            </div>
            <div class="bg-gray-900/50 border border-white/10 rounded-lg p-6 text-center">
                <h3 class="text-2xl font-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">2</h3>
                <p class="text-white/70 text-sm" style="font-family: 'Montserrat', sans-serif;">PENDING</p>
            </div>
            <div class="bg-gray-900/50 border border-white/10 rounded-lg p-6 text-center">
                <h3 class="text-2xl font-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">3</h3>
                <p class="text-white/70 text-sm" style="font-family: 'Montserrat', sans-serif;">DELIVERED</p>
            </div>
        </div>

        <!-- Orders List -->
        <div class="space-y-6">
            
            <!-- Order 1 - Recent -->
            <div class="bg-gray-900/30 border border-white/20 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                        <div class="mb-4 lg:mb-0">
                            <h3 class="text-xl font-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">
                                Order #EV-2025-001
                            </h3>
                            <p class="text-white/70 text-sm" style="font-family: 'Montserrat', sans-serif;">
                                Placed on September 20, 2025
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-yellow-600/20 text-yellow-400 text-xs font-medium rounded-full border border-yellow-600/30">
                                PROCESSING
                            </span>
                            <span class="text-white font-bold text-lg" style="font-family: 'Montserrat', sans-serif;">
                                $89.99
                            </span>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="flex items-center space-x-4 p-4 bg-black/30 rounded-lg">
                            <div class="w-16 h-16 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold" style="font-family: 'Montserrat', sans-serif;">
                                    EVANOX Signature Tee
                                </h4>
                                <p class="text-white/70 text-sm">Size: L | Qty: 1</p>
                                <p class="text-white/70 text-sm">Black - Limited Edition</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-black/30 rounded-lg">
                            <div class="w-16 h-16 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold" style="font-family: 'Montserrat', sans-serif;">
                                    CENTUM Access Pass
                                </h4>
                                <p class="text-white/70 text-sm">Digital Download</p>
                                <p class="text-white/70 text-sm">Exclusive Design Pack</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Actions -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button class="px-6 py-2 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                            TRACK ORDER
                        </button>
                        <button class="px-6 py-2 border border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                            VIEW DETAILS
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order 2 - Delivered -->
            <div class="bg-gray-900/30 border border-white/20 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                        <div class="mb-4 lg:mb-0">
                            <h3 class="text-xl font-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">
                                Order #EV-2025-002
                            </h3>
                            <p class="text-white/70 text-sm" style="font-family: 'Montserrat', sans-serif;">
                                Placed on September 15, 2025
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-green-600/20 text-green-400 text-xs font-medium rounded-full border border-green-600/30">
                                DELIVERED
                            </span>
                            <span class="text-white font-bold text-lg" style="font-family: 'Montserrat', sans-serif;">
                                $129.99
                            </span>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="flex items-center space-x-4 p-4 bg-black/30 rounded-lg">
                            <div class="w-16 h-16 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold" style="font-family: 'Montserrat', sans-serif;">
                                    EVANOX Premium Collection
                                </h4>
                                <p class="text-white/70 text-sm">Size: XL | Qty: 2</p>
                                <p class="text-white/70 text-sm">White & Black Combo</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Actions -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button class="px-6 py-2 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                            REORDER
                        </button>
                        <button class="px-6 py-2 border border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                            DOWNLOAD INVOICE
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order 3 - In Transit -->
            <div class="bg-gray-900/30 border border-white/20 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                        <div class="mb-4 lg:mb-0">
                            <h3 class="text-xl font-bold text-white mb-2" style="font-family: 'Montserrat', sans-serif;">
                                Order #EV-2025-003
                            </h3>
                            <p class="text-white/70 text-sm" style="font-family: 'Montserrat', sans-serif;">
                                Placed on September 10, 2025
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-blue-600/20 text-blue-400 text-xs font-medium rounded-full border border-blue-600/30">
                                IN TRANSIT
                            </span>
                            <span class="text-white font-bold text-lg" style="font-family: 'Montserrat', sans-serif;">
                                $199.99
                            </span>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
                        <div class="flex items-center space-x-4 p-4 bg-black/30 rounded-lg">
                            <div class="w-16 h-16 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold" style="font-family: 'Montserrat', sans-serif;">
                                    EVANOX CENTUM - COMPLETE PACK
                                </h4>
                                <p class="text-white/70 text-sm">Limited Edition #47/100</p>
                                <p class="text-white/70 text-sm">The Sealed Archive + Physical Bundle</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tracking Info -->
                    <div class="mb-4 p-4 bg-blue-600/10 border border-blue-600/30 rounded-lg">
                        <p class="text-blue-400 text-sm font-medium mb-1" style="font-family: 'Montserrat', sans-serif;">
                            TRACKING UPDATE
                        </p>
                        <p class="text-white/80 text-sm">
                            Your package is on its way. Expected delivery: September 25, 2025
                        </p>
                        <p class="text-white/60 text-xs mt-1">
                            Tracking ID: EV-TR-2025-003-4792
                        </p>
                    </div>
                    
                    <!-- Order Actions -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button class="px-6 py-2 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                            TRACK PACKAGE
                        </button>
                        <button class="px-6 py-2 border border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                            CONTACT SUPPORT
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Load More Orders -->
        <div class="text-center mt-12">
            <button class="px-8 py-3 border border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                LOAD MORE ORDERS
            </button>
        </div>

        <!-- Help Section -->
        <div class="mt-16 text-center">
            <h2 class="text-2xl font-bold text-white mb-4" style="font-family: 'Montserrat', sans-serif;">
                NEED HELP WITH YOUR ORDER?
            </h2>
            <p class="text-white/70 mb-6" style="font-family: 'Montserrat', sans-serif;">
                Our support team is here to assist you with any questions about your EVANOX orders.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-6 py-3 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                    CONTACT SUPPORT
                </button>
                <button class="px-6 py-3 border border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition-colors" style="font-family: 'Montserrat', sans-serif;">
                    ORDER FAQ
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
