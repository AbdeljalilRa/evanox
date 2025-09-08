@extends('layouts.store.app')

@section('title', 'Payment Successful - EVANOX')

@section('content')
<div class="min-h-screen bg-black flex items-center justify-center py-12">
    <div class="container mx-auto px-4 max-w-2xl text-center">
        <!-- Success Icon -->
        <div class="mb-8">
            <div class="mx-auto w-24 h-24 bg-green-500 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <!-- Success Message -->
        <h1 class="text-white font-montserrat font-extrabold text-3xl mb-4">Payment Successful!</h1>
        <p class="text-white/80 font-montserrat text-lg mb-8">
            Thank you for your purchase. Your order has been processed successfully.
        </p>

        @if($order)
        <!-- Order Details -->
        <div class="bg-gray-900 p-6 rounded-lg border border-white/10 mb-8 text-left">
            <h2 class="text-white font-montserrat font-bold text-xl mb-4">Order Details</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-white/70 font-montserrat text-sm">Order Number</p>
                    <p class="text-white font-montserrat font-medium">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div>
                    <p class="text-white/70 font-montserrat text-sm">Order Date</p>
                    <p class="text-white font-montserrat font-medium">{{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-white/70 font-montserrat text-sm">Total Amount</p>
                    <p class="text-white font-montserrat font-medium">${{ number_format($order->total, 2) }}</p>
                </div>
                <div>
                    <p class="text-white/70 font-montserrat text-sm">Payment Status</p>
                    <p class="text-green-400 font-montserrat font-medium">{{ $order->formatted_payment_status }}</p>
                </div>
            </div>

            <!-- Order Items -->
            @if($order->orderItems->count() > 0)
            <div class="border-t border-white/10 pt-4">
                <h3 class="text-white font-montserrat font-medium mb-3">Items Ordered</h3>
                @foreach($order->orderItems as $item)
                <div class="flex justify-between items-center py-2 border-b border-white/5 last:border-b-0">
                    <div>
                        <p class="text-white font-montserrat text-sm">Digital Product</p>
                        <p class="text-white/70 font-montserrat text-xs">Qty: {{ $item->quantity }}</p>
                    </div>
                    <p class="text-white font-montserrat">${{ number_format($item->subtotal, 2) }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @endif

        <!-- Next Steps -->
        <div class="bg-blue-900/20 border border-blue-500/30 rounded-lg p-6 mb-8">
            <h3 class="text-blue-400 font-montserrat font-bold text-lg mb-2">What's Next?</h3>
            <p class="text-blue-300/80 font-montserrat text-sm">
                A confirmation email has been sent to your email address with your order details and download links.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" 
                class="bg-white text-black font-montserrat font-extrabold py-3 px-8 rounded-full hover:bg-white/90 transition-colors">
                Continue Shopping
            </a>
            @auth
            <a href="/profile/orders" 
                class="bg-transparent border border-white text-white font-montserrat font-extrabold py-3 px-8 rounded-full hover:bg-white hover:text-black transition-colors">
                View Orders
            </a>
            @endauth
        </div>

        <!-- Support -->
        <div class="mt-8 pt-8 border-t border-white/10">
            <p class="text-white/60 font-montserrat text-sm">
                Need help? Contact us at 
                <a href="mailto:support@evanox.com" class="text-white hover:text-white/80 underline">support@evanox.com</a>
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Clear any remaining cart items
    localStorage.removeItem('evanoxBagItems');
    
    // Update bag count in navigation
    const bagCount = document.querySelector('.bag-count');
    if (bagCount) {
        bagCount.textContent = '0';
        bagCount.classList.add('hidden');
    }
});
</script>
@endpush
