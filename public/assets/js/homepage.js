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

    // Limited Edition Pop-up Functionality
    initLimitedEditionPopup();
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
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = emailInput.value.trim();
        
        if (email && isValidEmail(email)) {
            console.log('Newsletter subscription:', email);
            
            try {
                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                                document.querySelector('input[name="_token"]')?.value;
                
                // Make AJAX request to backend
                const response = await fetch('/newsletter/coupon', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    console.log('Newsletter subscription successful:', data);
                    
                    // Hide newsletter popup first
                    hidePopup();
                    
                    // Show success popup after a brief delay
                    setTimeout(() => {
                        showNewsletterSuccessPopup();
                    }, 300);
                } else {
                    console.error('Newsletter subscription failed:', data);
                    alert(data.message || 'Something went wrong. Please try again.');
                }
            } catch (error) {
                console.error('Newsletter subscription error:', error);
                alert('Network error. Please check your connection and try again.');
            }
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

function initLimitedEditionPopup() {
    const popup = document.getElementById('limited-edition-popup');
    const closeBtn = document.getElementById('close-limited-popup');
    
    console.log('Limited Edition popup elements:', { popup, closeBtn });
    
    // Check if popup was already closed in this session
    if (sessionStorage.getItem('limited-edition-popup-closed') === 'true') {
        console.log('Limited Edition popup already closed in this session');
        return;
    }

    // Show popup after 8 seconds (after newsletter popup has had time to show)
    setTimeout(() => {
        // Only show if newsletter popup is not currently visible
        const newsletterPopup = document.getElementById('newsletter-popup');
        if (newsletterPopup && newsletterPopup.classList.contains('hidden')) {
            console.log('Showing Limited Edition popup...');
            showLimitedEditionPopup();
        } else {
            // Try again after 5 more seconds
            setTimeout(() => {
                if (newsletterPopup && newsletterPopup.classList.contains('hidden')) {
                    showLimitedEditionPopup();
                }
            }, 5000);
        }
    }, 8000);

    // Close popup handlers
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            console.log('Limited Edition close button clicked');
            e.preventDefault();
            e.stopPropagation();
            hideLimitedEditionPopup();
        });
    } else {
        console.error('Limited Edition close button not found!');
    }


    
    // Close when clicking outside the modal
    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            hideLimitedEditionPopup();
        }
    });

    // Keyboard accessibility
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
            hideLimitedEditionPopup();
        }
    });

    function showLimitedEditionPopup() {
        popup.classList.remove('hidden');
        setTimeout(() => {
            popup.classList.remove('opacity-0');
            const relativeElement = popup.querySelector('.relative');
            if (relativeElement) {
                relativeElement.classList.remove('scale-95');
                relativeElement.classList.add('scale-100');
            }
        }, 10);
    }

    function hideLimitedEditionPopup() {
        console.log('hideLimitedEditionPopup called');
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
            console.log('Limited Edition popup hidden');
        }, 300);

        // Remember that popup was closed
        sessionStorage.setItem('limited-edition-popup-closed', 'true');
    }
}

// Newsletter Success Popup Functions
function showNewsletterSuccessPopup() {
    const successPopup = document.getElementById('newsletter-success-popup');
    if (!successPopup) {
        console.error('Newsletter success popup not found');
        return;
    }
    
    successPopup.classList.remove('hidden');
    setTimeout(() => {
        successPopup.classList.remove('opacity-0');
        const relativeElement = successPopup.querySelector('.relative');
        if (relativeElement) {
            relativeElement.classList.remove('scale-95');
            relativeElement.classList.add('scale-100');
        }
    }, 10);
}

function hideNewsletterSuccessPopup() {
    const successPopup = document.getElementById('newsletter-success-popup');
    if (!successPopup) {
        console.error('Newsletter success popup not found');
        return;
    }
    
    successPopup.classList.add('opacity-0');
    const relativeElement = successPopup.querySelector('.relative');
    if (relativeElement) {
        relativeElement.classList.remove('scale-100');
        relativeElement.classList.add('scale-95');
    }
    
    setTimeout(() => {
        successPopup.classList.add('hidden');
    }, 300);
}

// Initialize Newsletter Success Popup Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    const successPopup = document.getElementById('newsletter-success-popup');
    const closeBtn = document.getElementById('close-newsletter-success-popup');
    const okBtn = document.getElementById('newsletter-success-ok');
    
    if (successPopup && closeBtn) {
        // Close button event
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            hideNewsletterSuccessPopup();
        });
    }
    
    if (successPopup && okBtn) {
        // OK button event
        okBtn.addEventListener('click', function(e) {
            e.preventDefault();
            hideNewsletterSuccessPopup();
        });
    }
    
    if (successPopup) {
        // Close when clicking outside the modal
        successPopup.addEventListener('click', (e) => {
            if (e.target === successPopup) {
                hideNewsletterSuccessPopup();
            }
        });
        
        // Keyboard accessibility (ESC key)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !successPopup.classList.contains('hidden')) {
                hideNewsletterSuccessPopup();
            }
        });
    }
});