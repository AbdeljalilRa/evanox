@extends('layouts.store.app')

@section('title', 'Contact Us - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Main Contact Section -->
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-bold mb-8 tracking-wide font-montserrat">
                CONTACT US | EVANOX
            </h1>
        </div>

        <!-- Content Section -->
        <div class="max-w-3xl mx-auto text-center md:text-center">
            <!-- Question Section -->
            <div class="mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 font-montserrat italic leading-tight text-left md:text-center">
                    Got a question? Need help with a design?<br>
                    <span class="text-white">We're here for it.</span>
                </h2>
            </div>

            <!-- Description -->
            <div class="mb-16">
                <p class="text-gray-300 text-xl leading-relaxed font-nunito max-w-2xl mx-auto text-left md:text-center">
                    At Evanox, we value every connection. Whether you're looking for 
                    support, have a business inquiry, or want to collaborate — don't 
                    hesitate to reach out.
                </p>
            </div>

            <!-- Email Section -->
            <div class="mb-16">
                <h3 class="text-lg font-bold mb-6 font-montserrat italic text-gray-400 uppercase tracking-wider text-left md:text-center">
                    EMAIL
                </h3>
                <a href="mailto:support@evanox.store" 
                   class="text-3xl md:text-4xl font-bold font-montserrat text-white hover:text-gray-300 transition-colors duration-300 block text-left md:text-center">
                    SUPPORT@EVANOX.STORE
                </a>
            </div>

            <!-- Social Media Icons -->
            <div class="mb-20">
                <div class="flex justify-start md:justify-center space-x-8">
                    <!-- Instagram -->
                    <a href="#" class="text-white hover:text-gray-300 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.248 2.242 1.31 3.608.058 1.266.07 1.646.07 4.849s-.012 3.583-.07 4.849c-.062 1.366-.335 2.633-1.31 3.608-.975.975-2.242 1.248-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.335-3.608-1.31-.975-.975-1.248-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.849s.012-3.583.07-4.849c.062-1.366.335-2.633 1.31-3.608.975-.975 2.242-1.248 3.608-1.31 1.266-.058 1.646-.07 4.849-.07zM12 0C8.741 0 8.333.014 7.053.072 5.775.13 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384C1.347 2.681.936 3.35.63 4.14.333 4.905.13 5.775.072 7.053.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.058 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.765.297 1.636.5 2.913.558C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 1.277-.058 2.148-.261 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.337 1.384-2.126.297-.765.5-1.636.558-2.913C23.986 15.668 24 15.259 24 12c0-3.259-.014-3.667-.072-4.947-.058-1.278-.261-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.936 19.86.63 19.095.333 18.225.13 16.947.072 15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                    </a>

                    <!-- WhatsApp -->
                    <a href="#" class="text-white hover:text-gray-300 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                    </a>

                    <!-- TikTok -->
                    <a href="#" class="text-white hover:text-gray-300 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.321 5.562a5.124 5.124 0 01-.443-.258 6.228 6.228 0 01-1.137-.966c-.849-.849-1.294-1.99-1.294-3.338V0h-3.35v16.263c0 1.034-.399 2.006-1.123 2.737-.723.73-1.685 1.133-2.708 1.133s-1.985-.403-2.708-1.133c-.724-.731-1.123-1.703-1.123-2.737 0-1.034.399-2.006 1.123-2.737.723-.73 1.685-1.133 2.708-1.133.347 0 .688.067 1.01.198V9.198a7.482 7.482 0 00-1.01-.069c-2.051 0-3.976.798-5.42 2.248C2.798 12.825 2 14.762 2 16.826s.798 4.001 2.246 5.449C5.694 23.723 7.63 24.521 9.681 24.521s4.001-.798 5.449-2.246C16.578 20.827 17.376 18.891 17.376 16.826V8.482a9.294 9.294 0 005.624 1.874V6.708c-1.334 0-2.577-.456-3.679-1.146z"/>
                        </svg>
                    </a>

                    <!-- X (Twitter) -->
                    <a href="#" class="text-white hover:text-gray-300 transition-all duration-300 transform hover:scale-110">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Contact page specific styles */
/* Social media icons hover effects */
.social-icon:hover {
    transform: scale(1.1);
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    /* Header title */
    h1 {
        font-size: 1.875rem !important; /* 30px */
        line-height: 1.2;
        margin-bottom: 3rem !important;
    }
    
    /* Main question text */
    h2 {
        font-size: 1.5rem !important; /* 24px */
        line-height: 1.4;
        margin-bottom: 2rem !important;
        text-align: left !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    
    /* Description text */
    .text-xl {
        font-size: 0.875rem !important; /* 14px */
        line-height: 1.5;
        text-align: left !important;
        margin-bottom: 3rem !important;
    }
    
    /* Email label */
    .text-lg {
        font-size: 0.75rem !important; /* 12px */
        margin-bottom: 1rem !important;
        text-align: left !important;
    }
    
    /* Email address */
    .text-3xl.md\\:text-4xl {
        font-size: 1.125rem !important; /* 18px */
        text-align: left !important;
        margin-bottom: 3rem !important;
    }
    
    /* Social media icons */
    .flex.justify-center {
        justify-content: flex-start !important;
        margin-bottom: 4rem !important;
    }
    
    .flex.justify-center svg {
        width: 1.5rem !important; /* 24px */
        height: 1.5rem !important; /* 24px */
    }
    
    .space-x-8 > * + * {
        margin-left: 1.5rem !important;
    }
    
    /* Footer links */
    .grid-cols-3 {
        grid-template-columns: 1fr;
        gap: 0.75rem;
        text-align: left !important;
    }
    
    .grid-cols-3 a {
        font-size: 0.75rem !important; /* 12px */
        text-align: center !important;
    }
    
    /* Reduce top padding */
    .py-16 {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
    
    /* Max width adjustments */
    .max-w-3xl {
        max-width: 100% !important;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .max-w-2xl {
        max-width: 100% !important;
    }
}
</style>
@endpush