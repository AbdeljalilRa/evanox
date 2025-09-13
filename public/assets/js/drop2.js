/**
 * Drop2 Page JavaScript
 * Handles authentication form interactions and password toggle functionality
 * Uses only Tailwind CSS classes for styling and animations
 */

document.addEventListener('DOMContentLoaded', function() {
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
 * Email validation helper function
 * @param {string} email - Email address to validate
 * @returns {boolean} - True if valid email format
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
