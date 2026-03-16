<footer class="py-8 bg-black">
    <div class="container mx-auto px-4">
        <!-- Footer Links Structure -->
        
        <!-- Row 1: About Us | FAQs | Contact Us -->
        <div class="flex justify-between items-center mb-4 px-[46px]">
            <a href="{{ route('about.us') }}" 
               class="text-white font-montserrat font-bold text-[18px] leading-[22px] uppercase hover:text-gray-300 transition-colors">
                About Us
            </a>
            <a href="{{ route('faqs') }}" 
               class="text-white font-montserrat font-bold text-[18px] leading-[22px] uppercase hover:text-gray-300 transition-colors">
                FAQs
            </a>
            <a href="{{ route('contact') }}" 
               class="text-white font-montserrat font-bold text-[18px] leading-[22px] uppercase hover:text-gray-300 transition-colors">
                Contact us
            </a>
        </div>
        
        <!-- Row 2: Privacy Policy | Terms of Service | Refund Policy -->
        <div class="flex justify-between items-center mb-8 px-[27px]">
            <a href="{{ route('privacy.policy') }}" 
               class="text-white font-montserrat font-bold text-[18px] leading-[22px] uppercase hover:text-gray-300 transition-colors">
                privacy policy
            </a>
            <a href="{{ route('terms.service') }}" 
               class="text-white font-montserrat font-bold text-[18px] leading-[22px] uppercase hover:text-gray-300 transition-colors">
                Terms of Service
            </a>
            <a href="{{ route('refund.policy') }}" 
               class="text-white font-montserrat font-bold text-[18px] leading-[22px] uppercase hover:text-gray-300 transition-colors">
                Refund Policy
            </a>
        </div>
        
        <!-- Copyright -->
        <div class="text-center">
            <p class="text-white font-montserrat font-normal text-[18px] leading-[24px] tracking-[0.15em] uppercase">
                © 2025 EVANOX. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>