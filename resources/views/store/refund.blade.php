@extends('layouts.store.app')

@section('title', 'Refund Policy - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 tracking-wide font-montserrat">
                REFUND POLICY
            </h1>
        </div>

        <!-- Content Section -->
        <div class="max-w-4xl mx-auto">
            <!-- Effective Date -->
            <div class="mb-12">
                <p class="text-gray-300 text-lg font-nunito italic">
                    Effective Date: July 25, 2025
                </p>
            </div>

            <!-- Policy Sections -->
            <div class="space-y-12">
                
                <!-- 1. Digital Product Policy -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400">1.</span> Digital Product Policy
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        Due to the nature of digital products, all sales made on Evanox are final. Once a digital file has been downloaded or accessed, we are unable to offer refunds, exchanges, or cancellations.
                    </p>
                </section>

                <!-- 2. Exceptions -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400">2.</span> Exceptions
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        Refunds may be issued under the following rare conditions:
                    </p>
                    <ul class="text-gray-300 leading-relaxed font-nunito space-y-3 ml-4">
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            You were charged multiple times for the same product
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            You received a corrupted or unusable file and support was unable to fix the issue.
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            The product was never delivered or made available for download due to a system error.
                        </li>
                    </ul>
                </section>

                <!-- 3. No Refunds For -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400">3.</span> No Refunds For
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        We do not offer refunds for:
                    </p>
                    <ul class="text-gray-300 leading-relaxed font-nunito space-y-3 ml-4">
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Change of mind after purchase
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Incompatibility with your software (please read compatibility details before purchasing)
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Download issues related to poor internet connection or device limitations
                        </li>
                    </ul>
                </section>

                <!-- 4. Requesting a Refund -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400">4.</span> Requesting a Refund
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        To request a refund under exceptional circumstances, please contact us within 7 days of your purchase at: 
                        <a href="mailto:support@evanox.store" class="text-white hover:text-gray-300 font-bold underline transition-colors duration-300">
                            support@evanox.store
                        </a>
                    </p>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Include your order number and a detailed description of the issue.
                    </p>
                </section>

                <!-- 5. Chargebacks -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400">5.</span> Chargebacks
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Initiating a chargeback without first contacting our support team may result in the loss of access to all Evanox products and termination of your license agreement.
                    </p>
                </section>

                <!-- 6. Contact Us -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400">6.</span> Contact Us
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        If you have any questions about this policy, contact our support team: 
                        <a href="mailto:support@evanox.store" class="text-white hover:text-gray-300 font-bold underline transition-colors duration-300">
                            support@evanox.store
                        </a>
                    </p>
                </section>

            </div>
        </div>
    </div>

    
</div>
@endsection

@push('styles')
<style>
/* Refund Policy specific styles */

/* Numbered sections styling */
h2 span {
    font-style: italic;
}

/* List styling */
ul li {
    position: relative;
}

/* Link hover effects */
a[href^="mailto"] {
    transition: all 0.3s ease;
}

a[href^="mailto"]:hover {
    text-decoration-color: rgba(255, 255, 255, 0.7);
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    /* Header title */
    h1 {
        font-size: 2rem !important; /* 32px */
        line-height: 1.2;
        margin-bottom: 2rem !important;
    }
    
    /* Effective date */
    .text-lg {
        font-size: 0.875rem !important; /* 14px */
        margin-bottom: 2rem !important;
    }
    
    /* Section headings */
    h2 {
        font-size: 1.25rem !important; /* 20px */
        line-height: 1.4;
        margin-bottom: 1rem !important;
    }
    
    /* Body text */
    .text-gray-300 {
        font-size: 0.875rem !important; /* 14px */
        line-height: 1.6;
    }
    
    /* Spacing adjustments */
    .space-y-12 > * + * {
        margin-top: 2rem !important;
    }
    
    .mb-12 {
        margin-bottom: 2rem !important;
    }
    
    .mb-16 {
        margin-bottom: 3rem !important;
    }
    
    /* Footer links */
    .grid-cols-3 {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    .grid-cols-3 a {
        font-size: 0.75rem !important; /* 12px */
    }
    
    /* Padding adjustments */
    .py-16 {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
    
    /* Max width adjustments */
    .max-w-4xl {
        max-width: 100% !important;
        padding-left: 0;
        padding-right: 0;
    }
}

/* Desktop enhancements */
@media (min-width: 769px) {
    /* Better spacing for desktop */
    .space-y-12 > * + * {
        margin-top: 3rem;
    }
    
    /* Larger text for better readability */
    .text-gray-300 {
        font-size: 1rem;
        line-height: 1.7;
    }
    
    /* Enhanced list spacing */
    ul.space-y-3 > * + * {
        margin-top: 0.875rem;
    }
}
</style>
@endpush