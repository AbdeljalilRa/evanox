import './bootstrap';

import Alpine from 'alpinejs';

// Back to Top Component
window.backToTop = () => ({
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
});

window.Alpine = Alpine;

Alpine.start();
