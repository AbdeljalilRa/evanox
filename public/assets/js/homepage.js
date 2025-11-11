document.addEventListener('DOMContentLoaded', function() {
    // First main products slider
    new Swiper('.product-slider', {
        slidesPerView: 3,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: '.product-slider .swiper-button-next',
            prevEl: '.product-slider .swiper-button-prev'
        },
        pagination: {
            el: '.product-slider .swiper-pagination',
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    });

    // Initialize category sliders dynamically
    initCategorySliders();

    // Newsletter Pop-up Functionality
    initNewsletterPopup();
});

function initCategorySliders() {
    // Get all category sliders
    const categorySliders = document.querySelectorAll('[class*="product-slider-"]');
    
    categorySliders.forEach(slider => {
        const className = slider.className.match(/product-slider-(\d+)/);
        if (className) {
            const categoryId = className[1];
            
            new Swiper(`.product-slider-${categoryId}`, {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: `.product-slider-${categoryId} .swiper-button-next`,
                    prevEl: `.product-slider-${categoryId} .swiper-button-prev`
                },
                pagination: {
                    el: `.product-slider-${categoryId} .swiper-pagination`,
                    clickable: true
                },
                breakpoints: {
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    }
                }
            });
        }
    });
}

function initNewsletterPopup() {
    const popup = document.getElementById('newsletter-popup');
    const closeBtn = document.getElementById('close-popup');
    const form = document.getElementById('newsletter-form');
    const emailInput = document.getElementById('newsletter-email');
    
    console.log('Newsletter popup elements:', { popup, closeBtn, form, emailInput });
    
    // Check if popup was already closed in this session
    if (sessionStorage.getItem('newsletter-popup-closed') === 'true') {
        console.log('Popup already closed in this session');
        return;
    }

    // Show popup after 3 seconds
    setTimeout(() => {
        console.log('Showing popup...');
        showPopup();
    }, 3000);

    // Close popup handlers
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            console.log('Close button clicked');
            e.preventDefault();
            e.stopPropagation();
            hidePopup();
        });
    } else {
        console.error('Close button not found!');
    }
    
    // Close when clicking outside the modal
    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            hidePopup();
        }
    });

    // Handle form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = emailInput.value.trim();
        
        if (email && isValidEmail(email)) {
            console.log('Newsletter subscription:', email);
            
            // Show success message (you can customize this)
            alert('Thank you for subscribing! Your 20% discount will be sent to your email.');
            
            hidePopup();
        } else {
            alert('Please enter a valid email address.');
        }
    });

    // Keyboard accessibility
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
            hidePopup();
        }
    });

    function showPopup() {
        popup.classList.remove('hidden');
        setTimeout(() => {
            popup.classList.remove('opacity-0');
            const relativeElement = popup.querySelector('.relative');
            if (relativeElement) {
                relativeElement.classList.remove('scale-95');
                relativeElement.classList.add('scale-100');
            }
        }, 10);
        
        // Focus on email input for accessibility
        setTimeout(() => {
            emailInput.focus();
        }, 300);
    }

    function hidePopup() {
        console.log('hidePopup called');
        popup.classList.add('opacity-0');
        const relativeElement = popup.querySelector('.relative');
        if (relativeElement) {
            relativeElement.classList.remove('scale-100');
            relativeElement.classList.add('scale-95');
        } else {
            console.error('Relative element not found for scaling');
        }
        
        setTimeout(() => {
            popup.classList.add('hidden');
            console.log('Popup hidden');
        }, 300);

        // Remember that popup was closed
        sessionStorage.setItem('newsletter-popup-closed', 'true');
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
}