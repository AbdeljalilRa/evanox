@extends('layouts.store.app')

@section('title', 'Payment Cancelled - EVANOX')

@section('content')
<div class="min-h-screen bg-black flex items-center justify-center py-12">
    <div class="container mx-auto px-4 max-w-2xl text-center">
        <!-- Cancel Icon -->
        <div class="mb-8">
            <div class="mx-auto w-24 h-24 bg-red-500 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
        </div>

        <!-- Cancel Message -->
        <h1 class="text-white font-montserrat font-extrabold text-3xl mb-4">Payment Cancelled</h1>
        <p class="text-white/80 font-montserrat text-lg mb-8">
            Your payment was cancelled. No charges have been made to your account.
        </p>

        <!-- Information -->
        <div class="bg-gray-900 p-6 rounded-lg border border-white/10 mb-8">
            <h2 class="text-white font-montserrat font-bold text-xl mb-4">What Happened?</h2>
            <p class="text-white/70 font-montserrat text-sm mb-4">
                The payment process was cancelled or interrupted. Your items are still in your bag and ready for checkout when you're ready.
            </p>
            <ul class="text-left text-white/60 font-montserrat text-sm space-y-2">
                <li>• No payment was processed</li>
                <li>• Your cart items are preserved</li>
                <li>• You can try again at any time</li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/checkout" 
                class="bg-white text-black font-montserrat font-extrabold py-3 px-8 rounded-full hover:bg-white/90 transition-colors">
                Try Again
            </a>
            <a href="/" 
                class="bg-transparent border border-white text-white font-montserrat font-extrabold py-3 px-8 rounded-full hover:bg-white hover:text-black transition-colors">
                Continue Shopping
            </a>
        </div>

        <!-- Support -->
        <div class="mt-8 pt-8 border-t border-white/10">
            <p class="text-white/60 font-montserrat text-sm">
                Having trouble? Contact us at 
                <a href="mailto:support@evanox.com" class="text-white hover:text-white/80 underline">support@evanox.com</a>
            </p>
        </div>
    </div>
</div>
@endsection
