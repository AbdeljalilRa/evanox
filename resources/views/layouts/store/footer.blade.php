<footer class="bg-black">
    <!-- Desktop Footer -->
    <div class="hidden md:block py-8">
        <div class="container mx-auto px-4">
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
                   © {{ now()->year }} EVANOX. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Mobile Footer - Figma specs -->
    <div class="md:hidden py-6 px-[8px]">
        <!-- Row 1: About Us | FAQs | Refund Policy -->
        <div class="flex justify-between items-center mb-3">
            <!-- About Us: left: 44px, width: 50px -->
            <a href="{{ route('about.us') }}" 
               class="text-white font-montserrat font-bold text-[10px] leading-[12px] uppercase hover:text-gray-300 transition-colors ml-[36px]">
                About Us
            </a>
            <!-- FAQs: centered, width: 26px -->
            <a href="{{ route('faqs') }}" 
               class="text-white font-montserrat font-bold text-[10px] leading-[12px] uppercase hover:text-gray-300 transition-colors">
                FAQs
            </a>
            <!-- Refund Policy: right: 28px, width: 78px -->
            <a href="{{ route('refund.policy') }}" 
               class="text-white font-montserrat font-bold text-[10px] leading-[12px] uppercase hover:text-gray-300 transition-colors mr-[20px]">
                Refund Policy
            </a>
        </div>
        
        <!-- Row 2: Privacy Policy | Terms of Service | Contact us -->
        <div class="flex justify-between items-center mb-4">
            <!-- Privacy Policy: left: 30px, width: 79px -->
            <a href="{{ route('privacy.policy') }}" 
               class="text-white font-montserrat font-bold text-[10px] leading-[12px] uppercase hover:text-gray-300 transition-colors ml-[22px]">
                privacy policy
            </a>
            <!-- Terms of Service: centered, width: 94px -->
            <a href="{{ route('terms.service') }}" 
               class="text-white font-montserrat font-bold text-[10px] leading-[12px] uppercase hover:text-gray-300 transition-colors">
                Terms of Service
            </a>
            <!-- Contact us: right: 32px, width: 70px -->
            <a href="{{ route('contact') }}" 
               class="text-white font-montserrat font-bold text-[10px] leading-[12px] uppercase hover:text-gray-300 transition-colors mr-[24px]">
                Contact us
            </a>
        </div>
        
        <!-- Copyright: Satoshi 400, 9.5px, letter-spacing 0.15em, centered -->
        <div class="text-center mt-4">
            <p class="text-white font-montserrat font-normal text-[9.5px] leading-[13px] tracking-[0.15em] uppercase">
                © {{ now()->year }} EVANOX. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>