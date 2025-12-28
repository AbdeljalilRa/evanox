@extends('layouts.store.app')

@section('title', 'Privacy Policy - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 tracking-wide font-montserrat">
                PRIVACY POLICY
            </h1>
        </div>

        <!-- Content Section -->
        <div class="max-w-4xl mx-auto">
            <!-- Effective Date -->
            <div class="mb-12">
                <p class="text-gray-300 text-lg font-nunito italic">
                    Effective Date: July 24, 2025
                </p>
            </div>

            <!-- Privacy Policy Sections -->
            <div class="space-y-12">
                
                <!-- 1. Information We Collect -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">1.</span> Information We Collect
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        We collect the following types of information when you interact with our store:
                    </p>
                    <ul class="text-gray-300 leading-relaxed font-nunito space-y-3 ml-4">
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            <strong>Personal Information:</strong> Your name, email address, shipping/billing address (if applicable), and payment details.
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            <strong>Order Details:</strong> Purchase history, license downloads, product access information.
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            <strong>Technical Data:</strong> IP address, browser type, operating system, device type, and browsing behavior (collected via cookies).
                        </li>
                    </ul>
                </section>

                <!-- 2. How We Use Your Information -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">2.</span> How We Use Your Information
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        We use your data for the following purposes:
                    </p>
                    <ul class="text-gray-300 leading-relaxed font-nunito space-y-2 ml-4">
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            To process and deliver your orders
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            To send you order confirmations and updates
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            To provide customer support
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            To improve our store and user experience
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            To send promotional emails (only if you opt in)
                        </li>
                    </ul>
                </section>

                <!-- 3. How We Protect Your Information -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">3.</span> How We Protect Your Information
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        We implement strict security measures to protect your personal data, including SSL encryption and secure payment processing. We do not store your full credit card information.
                    </p>
                </section>

                <!-- 4. Third-Party Services -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">4.</span> Third-Party Services
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        We use trusted third-party tools and platforms (such as payment processors or email services) to manage some parts of our service. These providers have their own privacy policies, which we encourage you to review.
                    </p>
                </section>

                <!-- 5. Cookies -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">5.</span> Cookies
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        We use cookies and similar technologies to:
                    </p>
                    <ul class="text-gray-300 leading-relaxed font-nunito space-y-2 ml-4">
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Remember your preferences
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Track analytics (e.g. visits, page views)
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Improve our services
                        </li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed font-nunito mt-4">
                        You can disable cookies in your browser settings if you prefer not to be tracked.
                    </p>
                </section>

                <!-- 6. Your Rights -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">6.</span> Your Rights
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito mb-4">
                        You have the right to:
                    </p>
                    <ul class="text-gray-300 leading-relaxed font-nunito space-y-2 ml-4">
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Access your personal data
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Correct or update your data
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Request deletion of your data
                        </li>
                        <li class="flex items-start">
                            <span class="text-white mr-3">-</span>
                            Withdraw consent for marketing communications
                        </li>
                    </ul>
                    <p class="text-gray-300 leading-relaxed font-nunito mt-4">
                        To exercise any of these rights, please contact us at [your brand email]
                    </p>
                </section>

                <!-- 7. Changes to This Policy -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">7.</span> Changes to This Policy
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        We may update this Privacy Policy as needed to reflect legal or operational changes. If we make significant changes, we will notify you via the website or email.
                    </p>
                </section>

                <!-- 8. Contact Us -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">8.</span> Contact Us
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        If you have any questions about this Privacy Policy, you can contact us at: 
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
/* Privacy Policy specific styles */

/* Numbered sections styling */
h2 span {
    font-style: italic;
}

/* List styling */
ul li {
    position: relative;
}

/* Strong text in lists */
ul li strong {
    color: #ffffff;
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
    
    /* List items */
    ul li {
        font-size: 0.875rem !important; /* 14px */
    }
    
    /* Spacing adjustments */
    .space-y-12 > * + * {
        margin-top: 2rem !important;
    }
    
    .space-y-3 > * + * {
        margin-top: 0.5rem !important;
    }
    
    .space-y-2 > * + * {
        margin-top: 0.375rem !important;
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
    
    ul.space-y-2 > * + * {
        margin-top: 0.625rem;
    }
}
</style>
@endpush