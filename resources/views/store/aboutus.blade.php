@extends('layouts.store.app')

@section('title', 'About Us - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-3 tracking-wide font-montserrat">
                ABOUT US
            </h1>
            <h2 class="text-base md:text-lg font-montserrat text-gray-300 tracking-wider">
                ORIGINATOR OF EVANOX
            </h2>
        </div>

        <!-- Main Content Section -->
        <div class="max-w-4xl mx-auto text-center">
            <!-- Profile Image -->
            <div class="mb-6">
                <div class="w-56 h-56 mx-auto rounded-full overflow-hidden">
                    <img src="{{ asset('images/final.png') }}" 
                         alt="Saad Kani - Founder of Evanox" 
                         class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Name and Brand -->
            <div class="mb-6">
                <h3 class="text-2xl md:text-3xl font-bold font-montserrat mb-1 tracking-wider">
                    SAAD KANI
                </h3>
                <p class="text-lg md:text-xl font-montserrat text-gray-300 tracking-widest">
                    EVANOX
                </p>
            </div>

            <!-- Quote Section -->
            <div class="max-w-2xl mx-auto">
                <blockquote class="text-gray-300 text-base md:text-lg leading-relaxed font-nunito italic">
                    "Saad Kani, the founder of Evanox, brings extensive experience in graphic design. He established the company to offer high-quality digital products with a modern and attractive approach that stands out from what's currently available in the market."
                </blockquote>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
/* About Us specific styles */

/* Quote styling */
blockquote {
    position: relative;
}

blockquote::before {
    content: '"';
    position: absolute;
    left: -0.5rem;
    top: -0.25rem;
    font-size: 3rem;
    color: #374151;
    font-family: 'Montserrat', sans-serif;
}

blockquote::after {
    content: '"';
    position: absolute;
    right: -0.5rem;
    bottom: -0.75rem;
    font-size: 3rem;
    color: #374151;
    font-family: 'Montserrat', sans-serif;
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    /* Header titles */
    h1 {
        font-size: 2rem !important; /* 32px */
        line-height: 1.2;
        margin-bottom: 0.75rem !important;
    }
    
    h2 {
        font-size: 0.875rem !important; /* 14px */
        margin-bottom: 2rem !important;
    }
    
    /* Profile image */
    .w-56.h-56 {
        width: 11rem !important; /* 176px */
        height: 11rem !important;
    }
    
    /* Name styling */
    h3 {
        font-size: 1.5rem !important; /* 24px */
        margin-bottom: 0.25rem !important;
    }
    
    /* Brand name */
    .text-lg.md\:text-xl {
        font-size: 1rem !important; /* 16px */
    }
    
    /* Quote */
    blockquote {
        font-size: 0.875rem !important; /* 14px */
        line-height: 1.5;
        padding: 0 0.5rem;
    }
    
    blockquote::before {
        font-size: 1.5rem;
        left: -0.125rem;
        top: -0.0625rem;
    }
    
    blockquote::after {
        font-size: 1.5rem;
        right: -0.125rem;
        bottom: -0.375rem;
    }
    
    /* Spacing adjustments */
    .mb-8 {
        margin-bottom: 2rem !important;
    }
    
    .mb-6 {
        margin-bottom: 1.5rem !important;
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
    .py-8 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
    }
    
    /* Max width adjustments */
    .max-w-4xl, .max-w-2xl {
        max-width: 100% !important;
        padding-left: 0;
        padding-right: 0;
    }
}

/* Desktop enhancements */
@media (min-width: 769px) {
    /* Compact spacing for desktop */
    .mb-8 {
        margin-bottom: 2.5rem;
    }
    
    .mb-6 {
        margin-bottom: 2rem;
    }
    
    /* Enhanced typography - more compact */
    h1 {
        font-size: 2.75rem; /* 44px */
    }
    
    h2 {
        font-size: 1.125rem; /* 18px */
    }
    
    h3 {
        font-size: 2rem; /* 32px */
    }
    
    blockquote {
        font-size: 1.125rem; /* 18px */
        line-height: 1.6;
    }
    
    /* Profile image - more compact */
    .w-56.h-56 {
        width: 15rem; /* 240px */
        height: 15rem;
    }
    
    /* Reduce container padding */
    .py-8 {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }
}

/* Letter spacing enhancements */
.tracking-widest {
    letter-spacing: 0.1em;
}

.tracking-wider {
    letter-spacing: 0.05em;
}

.tracking-wide {
    letter-spacing: 0.025em;
}
</style>
@endpush