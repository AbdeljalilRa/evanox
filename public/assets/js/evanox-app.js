// Back to Top Component for Alpine.js
document.addEventListener('alpine:init', () => {
    Alpine.data('backToTop', () => ({
        showButton: false,
        
        init() {
            // Show/hide button based on scroll position
            window.addEventListener('scroll', () => {
                this.showButton = window.pageYOffset > 300;
            });
        },
        
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    }));
});

// Mobile menu and header scroll functionality
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const header = document.querySelector('header');
    let lastScroll = 0;

    // Mobile menu toggle
    if(mobileMenuButton){
        mobileMenuButton.addEventListener('click', function (e) {
            e.stopPropagation();
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.remove('opacity-0', 'scale-95');
                    mobileMenu.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                mobileMenu.classList.add('opacity-0', 'scale-95');
                mobileMenu.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });
    }

    // Header scroll effect
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 0) {
            header.style.transform = 'translateY(0)';
            return;
        }
        if (currentScroll > lastScroll) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;
    });
});
