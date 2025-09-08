@extends('layouts.store.app')

@section('title', 'Checkout - EVANOX')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Order Summary -->
        <div class="order-2 lg:order-1">
            <h2 class="text-white font-montserrat font-black text-2xl mb-6">Order Summary</h2>
            
            <div id="checkout-items" class="space-y-4 mb-6">
                <!-- Items will be populated by JavaScript -->
            </div>
            
            <div class="border-t border-white/20 pt-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-white/80 font-montserrat">Subtotal:</span>
                    <span id="checkout-subtotal" class="text-white font-montserrat font-bold">$0.00</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-white/80 font-montserrat">Shipping:</span>
                    <span class="text-white font-montserrat font-bold">FREE</span>
                </div>
                <div class="flex justify-between items-center text-lg">
                    <span class="text-white font-montserrat font-black">Total:</span>
                    <span id="checkout-total" class="text-white font-montserrat font-black">$0.00</span>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <div class="order-1 lg:order-2">
            <h2 class="text-white font-montserrat font-black text-2xl mb-6">Payment Details</h2>
            
            <form id="payment-form" class="space-y-6">
                <!-- Customer Information -->
                <div class="space-y-4">
                    <h3 class="text-white font-montserrat font-bold text-lg">Contact Information</h3>
                    
                    <div>
                        <label for="email" class="block text-white font-montserrat font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-white font-montserrat font-medium mb-2">First Name</label>
                            <input type="text" id="first_name" name="first_name" required
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                        </div>
                        <div>
                            <label for="last_name" class="block text-white font-montserrat font-medium mb-2">Last Name</label>
                            <input type="text" id="last_name" name="last_name" required
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="space-y-4">
                    <h3 class="text-white font-montserrat font-bold text-lg">Shipping Address</h3>
                    
                    <div>
                        <label for="address" class="block text-white font-montserrat font-medium mb-2">Address</label>
                        <input type="text" id="address" name="address" required
                            class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="city" class="block text-white font-montserrat font-medium mb-2">City</label>
                            <input type="text" id="city" name="city" required
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                        </div>
                        <div>
                            <label for="state" class="block text-white font-montserrat font-medium mb-2">State</label>
                            <input type="text" id="state" name="state" required
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                        </div>
                        <div>
                            <label for="zip" class="block text-white font-montserrat font-medium mb-2">ZIP Code</label>
                            <input type="text" id="zip" name="zip" required
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white/40">
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="space-y-4">
                    <h3 class="text-white font-montserrat font-bold text-lg">Payment Method</h3>
                    
        
                    
                    <!-- Stripe Elements will be mounted here -->
                    <div id="card-element" class="bg-white/10 border border-white/20 rounded-lg px-4 py-3">
                        <!-- Stripe Elements will create form elements here -->
                    </div>
                    <div id="card-errors" class="text-red-400 text-sm mt-2" role="alert"></div>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submit-payment" 
                    class="w-full bg-white text-black font-montserrat font-black text-lg py-4 px-8 rounded-full hover:bg-white/90 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span id="button-text">Complete Payment</span>
                    <span id="loading-text" class="hidden">Processing...</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Stripe
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();

    // Create card element with custom styling
    const cardElement = elements.create('card', {
        style: {
            base: {
                color: '#ffffff',
                fontFamily: 'Montserrat, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: 'rgba(255, 255, 255, 0.5)',
                },
                backgroundColor: 'transparent',
            },
            invalid: {
                color: '#ef4444',
                iconColor: '#ef4444',
            },
        },
    });

    // Mount the card element
    cardElement.mount('#card-element');

    // Handle real-time validation errors from the card Element
    cardElement.on('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Load and display checkout items
    loadCheckoutItems();

    // Handle form submission
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', handleSubmit);

    async function handleSubmit(event) {
        event.preventDefault();
        setLoading(true);

        // Get form data
        const formData = new FormData(form);
        const orderData = {
            email: formData.get('email'),
            first_name: formData.get('first_name'),
            last_name: formData.get('last_name'),
            address: formData.get('address'),
            city: formData.get('city'),
            state: formData.get('state'),
            zip: formData.get('zip'),
            items: JSON.parse(localStorage.getItem('evanoxBagItems') || '[]')
        };

        try {
            // Create payment intent
            const response = await fetch('/payment/create-intent', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    items: orderData.items
                })
            });

            const { client_secret, error } = await response.json();

            if (error) {
                showError(error);
                setLoading(false);
                return;
            }

            // Confirm payment with Stripe
            const {error: stripeError, paymentIntent} = await stripe.confirmCardPayment(client_secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: `${formData.get('first_name')} ${formData.get('last_name')}`,
                        email: formData.get('email'),
                        address: {
                            line1: formData.get('address'),
                            city: formData.get('city'),
                            state: formData.get('state'),
                            postal_code: formData.get('zip'),
                        },
                    },
                },
            });

            if (stripeError) {
                showError(stripeError.message);
                setLoading(false);
                return;
            }

            // Process payment on server
            const processResponse = await fetch('/payment/process', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    payment_intent_id: paymentIntent.id,
                    items: orderData.items
                })
            });

            const processResult = await processResponse.json();

            if (processResult.error) {
                showError(processResult.error);
                setLoading(false);
                return;
            }

            // Payment succeeded
            localStorage.removeItem('evanoxBagItems');
            window.location.href = `/payment/success?order_id=${processResult.order_id}`;
        } catch (error) {
            console.error('Error:', error);
            showError('An unexpected error occurred.');
            setLoading(false);
        }
    }

    function setLoading(isLoading) {
        const submitButton = document.getElementById('submit-payment');
        const buttonText = document.getElementById('button-text');
        const loadingText = document.getElementById('loading-text');

        submitButton.disabled = isLoading;
        
        if (isLoading) {
            buttonText.classList.add('hidden');
            loadingText.classList.remove('hidden');
        } else {
            buttonText.classList.remove('hidden');
            loadingText.classList.add('hidden');
        }
    }

    function showError(message) {
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = message;
    }

    function loadCheckoutItems() {
        const items = JSON.parse(localStorage.getItem('evanoxBagItems') || '[]');
        const checkoutItems = document.getElementById('checkout-items');
        const subtotalElement = document.getElementById('checkout-subtotal');
        const totalElement = document.getElementById('checkout-total');

        if (items.length === 0) {
            checkoutItems.innerHTML = '<p class="text-white/70">Your bag is empty</p>';
            subtotalElement.textContent = '$0.00';
            totalElement.textContent = '$0.00';
            return;
        }

        let html = '';
        let total = 0;

        items.forEach(item => {
            const priceValue = parseFloat(item.price.replace(/[^0-9.]/g, ''));
            const itemTotal = priceValue * item.quantity;
            total += itemTotal;

            html += `
                <div class="flex items-center gap-4 p-4 bg-white/5 rounded-lg">
                    <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-white font-montserrat font-medium">${item.name}</h4>
                        <p class="text-white/70 text-sm">Quantity: ${item.quantity}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-montserrat font-bold">$${itemTotal.toFixed(2)}</p>
                    </div>
                </div>
            `;
        });

        checkoutItems.innerHTML = html;
        subtotalElement.textContent = `$${total.toFixed(2)}`;
        totalElement.textContent = `$${total.toFixed(2)}`;
    }
});
</script>
@endpush
