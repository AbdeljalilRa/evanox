@extends('layouts.store.app')

@section('title', 'Payment Successful - EVANOX')

@section('content')
<div class="container mx-auto px-4 py-16 max-w-2xl text-center">
    <div class="bg-white/5 rounded-2xl p-8">
        <!-- Success Icon -->
        <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <!-- Success Message -->
        <h1 class="text-white font-montserrat font-black text-3xl mb-4">Payment Successful!</h1>
        <p class="text-white/80 font-montserrat text-lg mb-8">
            Thank you for your purchase. Your order has been confirmed and you will receive an email confirmation shortly.
        </p>

        <!-- Order Details -->
        <div class="bg-white/10 rounded-lg p-6 mb-8">
            <h3 class="text-white font-montserrat font-bold text-xl mb-4">Order Confirmation</h3>
            <div class="space-y-2 text-left">
                <div class="flex justify-between">
                    <span class="text-white/70">Order Number:</span>
                    <span class="text-white font-medium" id="order-number">#EV-{{ time() }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-white/70">Payment Status:</span>
                    <span class="text-green-400 font-medium">Completed</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-white/70">Estimated Delivery:</span>
                    <span class="text-white font-medium">3-5 Business Days</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4">
            <a href="/" 
                class="block w-full bg-white text-black font-montserrat font-black text-lg py-4 px-8 rounded-full hover:bg-white/90 transition-all duration-300">
                Continue Shopping
            </a>
            <a href="/orders" 
                class="block w-full border-2 border-white text-white font-montserrat font-bold text-lg py-4 px-8 rounded-full hover:bg-white hover:text-black transition-all duration-300">
                View Order History
            </a>
        </div>
    </div>
</div>
@endsection
