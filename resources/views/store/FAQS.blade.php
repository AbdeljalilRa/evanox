@extends('layouts.store.app')

@section('title', 'Frequently Asked Questions - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 tracking-wide font-montserrat">
                FREQUENTLY ASKED QUESTIONS (FAQS)
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

            <!-- FAQ Sections -->
            <div class="space-y-12">
                
                <!-- 1. What is Evanox? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">1.</span> What is Evanox?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Evanox is a digital design brand offering limited-edition artwork, graphic packs, and exclusive visual assets for creators, brands, and designers.
                    </p>
                </section>

                <!-- 2. Are the designs limited? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">2.</span> Are the designs limited?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Yes. Each design or bundle is released with a strict license cap — usually 100 digital licenses — to preserve exclusivity and value.
                    </p>
                </section>

                <!-- 3. What do I get when I purchase a design? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">3.</span> What do I get when I purchase a design?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        You'll receive high-resolution files (PSD, PNG, JPG), along with any included mockups or extras depending on the pack. The license allows for personal or commercial use.
                    </p>
                </section>

                <!-- 4. Can I resell or redistribute Evanox designs? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">4.</span> Can I resell or redistribute Evanox designs?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        No. Reselling, redistributing, or sharing the original files in any form is strictly prohibited under our license agreement.
                    </p>
                </section>

                <!-- 5. Are refunds available? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">5.</span> Are refunds available?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Due to the nature of digital downloads, we do not offer refunds unless the product is corrupted or undelivered. Please read our 
                        <a href="{{ route('refund.policy') }}" class="text-white hover:text-gray-300 font-bold underline transition-colors duration-300">
                            Refund Policy
                        </a> for more details.
                    </p>
                </section>

                <!-- 6. What software do I need? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">6.</span> What software do I need?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Most of our designs are created for use with Adobe Photoshop. Some may also be compatible with other editing tools — always check the product description.
                    </p>
                </section>

                <!-- 7. How do I download my files? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">7.</span> How do I download my files?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        After purchase, you will receive an instant download link on the confirmation page and via email. You can also access your files anytime through your account dashboard.
                    </p>
                </section>

                <!-- 8. Can I request custom designs? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">8.</span> Can I request custom designs?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        Currently, we only offer pre-designed packs. However, feel free to contact us with special inquiries — we may consider custom work based on availability.
                    </p>
                </section>

                <!-- 9. How do I contact support? -->
                <section>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 font-montserrat text-white">
                        <span class="text-gray-400 italic">9.</span> How do I contact support?
                    </h2>
                    <p class="text-gray-300 leading-relaxed font-nunito">
                        You can reach our team via email at 
                        <a href="mailto:support@evanox.store" class="text-white hover:text-gray-300 font-bold underline transition-colors duration-300">
                            support@evanox.store
                        </a>. We aim to respond within 24–48 hours.
                    </p>
                </section>

            </div>
        </div>
    </div>

   
</div>
@endsection

@push('styles')
<style>
/* FAQs specific styles */

/* Numbered sections styling */
h2 span {
    font-style: italic;
}

/* Link hover effects */
a[href^="mailto"], a[href*="refund"] {
    transition: all 0.3s ease;
}

a[href^="mailto"]:hover, a[href*="refund"]:hover {
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