@extends('layouts.store.app')

@section('title', 'Terms of Service - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 tracking-wide font-montserrat">
                TERMS OF SERVICE
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

            <!-- Terms Sections -->
            <div class="space-y-12">
                
                <!-- 1. Overview -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">1.</span> Overview
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Welcome to Evanox. By accessing or using our website and services, you agree to be bound by these Terms of Service. If you do not agree with any part of these terms, you must not use our site.
                    </p>
                </section>

                <!-- 2. Use of Our Services -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">2.</span> Use of Our Services
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        You agree to use our services only for lawful purposes and in a way that does not infringe the rights of others or restrict their use of the site. All content you submit must comply with applicable laws and regulations.
                    </p>
                </section>

                <!-- 3. Intellectual Property -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">3.</span> Intellectual Property
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        All designs, logos, products, and content on this site are the intellectual property of Evanox. You may not reproduce, distribute, or exploit any part of our content without express written permission.
                    </p>
                </section>

                <!-- 4. Limited Licenses -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">4.</span> Limited Licenses
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Each digital design is sold under a limited license (100 max unless otherwise stated). You may use the files for personal or commercial purposes, but redistribution, resale, or modification of the original files is strictly prohibited.
                    </p>
                </section>

                <!-- 5. Payments and Refunds -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">5.</span> Payments and Refunds
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        All payments are processed securely. Due to the nature of digital products, all sales are final and non-refundable unless otherwise stated.
                    </p>
                </section>

                <!-- 6. Account Responsibility -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">6.</span> Account Responsibility
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        If you create an account on our site, you are responsible for maintaining the security of your account and password. Evanox is not liable for any loss or damage arising from your failure to comply with this security obligation.
                    </p>
                </section>

                <!-- 7. Changes to the Terms -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">7.</span> Changes to the Terms
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        We reserve the right to update or change these Terms at any time. Continued use of the site after such changes constitutes your acceptance of the new terms.
                    </p>
                </section>

                <!-- 8. Contact Us -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">8.</span> Contact Us
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        If you have any questions about this Terms of Service, you can contact us at: 
                        <a href="mailto:support@evanox.store" class="text-white hover:text-gray-300 font-bold underline transition-colors duration-300">
                            support@evanox.store
                        </a> (or your official email)
                    </p>
                </section>

            </div>
        </div>
    </div>


</div>
@endsection

@push('styles')
<style>
/* Terms of Service specific styles */

/* Numbered sections styling */
h2 span {
    font-style: italic;
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
}
</style>
@endpush