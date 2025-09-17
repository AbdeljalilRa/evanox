/**
 * Drop2 Page JavaScript
 * Handles authentication form interactions, password toggle functionality, and sliding banner
 * Uses only Tailwind CSS classes for styling and animations
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize sliding banner
    initializeSlidingBanner();
    
    // Get DOM elements
    const passwordToggle = document.getElementById('passwordToggle');
    const passwordSection = document.getElementById('passwordSection');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const joinBtn = document.getElementById('joinBtn');
    const enterBtn = document.getElementById('enterBtn');
    
    // Password section toggle functionality
    if (passwordToggle && passwordSection) {
        passwordToggle.addEventListener('click', function() {
            if (passwordSection.classList.contains('hidden')) {
                // Show password section with animation
                passwordSection.classList.remove('hidden');
                passwordSection.classList.add('animate-pulse');
                setTimeout(() => {
                    passwordSection.classList.remove('animate-pulse');
                }, 300);
                passwordToggle.textContent = 'Hide Password';
            } else {
                // Hide password section
                passwordSection.classList.add('hidden');
                passwordToggle.textContent = 'Enter Using Password';
            }
        });
    }
    
    // Email form submission
    if (joinBtn && emailInput) {
        joinBtn.addEventListener('click', function() {
            const email = emailInput.value.trim();
            
            if (!email) {
                alert('Please enter your email address');
                emailInput.focus();
                return;
            }
            
            if (!isValidEmail(email)) {
                alert('Please enter a valid email address');
                emailInput.focus();
                return;
            }
            
            // Handle email submission here
            console.log('Email submitted:', email);
            // You can add AJAX call or form submission logic here
        });
        
        // Enter key support for email input
        emailInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                joinBtn.click();
            }
        });
    }
    
    // Password form submission
    if (enterBtn && passwordInput) {
        enterBtn.addEventListener('click', function() {
            const password = passwordInput.value.trim();
            
            if (!password) {
                alert('Please enter your password');
                passwordInput.focus();
                return;
            }
            
            // Handle password submission here
            console.log('Password submitted');
            // You can add authentication logic here
        });
        
        // Enter key support for password input
        passwordInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                enterBtn.click();
            }
        });
    }
});

/**
 * Initialize and manage the sliding "Coming Soon" marquee banner
 */
function initializeSlidingBanner() {
    const banner = document.getElementById('comingSoonBanner');
    const slidingText = document.getElementById('slidingText');
    if (!banner || !slidingText) return;
    
    // Get the original span element
    const originalSpan = slidingText.querySelector('span');
    if (!originalSpan) return;
    
    // Clone the original span 14 more times (total of 15)
    for (let i = 0; i < 20; i++) {
        const clonedSpan = originalSpan.cloneNode(true);
        slidingText.appendChild(clonedSpan);
    }
    
    let position = 0;
    const speed = 1.5; // pixels per frame
    const textWidth = slidingText.scrollWidth;
    
    function animateSlide() {
        position -= speed;
        
        // Reset position when text has completely scrolled out
        // With 15 items, reset after 1/3 has passed to ensure seamless loop
        if (position <= -textWidth / 3) {
            position = 0;
        }
        
        slidingText.style.transform = `translateX(${position}px)`;
        requestAnimationFrame(animateSlide);
    }
    
    // Start the animation
    animateSlide();
}

/**
 * Email validation helper function
 * @param {string} email - Email address to validate
 * @returns {boolean} - True if valid email format
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
