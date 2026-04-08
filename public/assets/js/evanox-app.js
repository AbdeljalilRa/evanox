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

    // Profile dropdown functionality
    const profileButton = document.getElementById('profile-button');
    const profileMenu = document.getElementById('profile-menu');
    
    if (profileButton && profileMenu) {
        profileButton.addEventListener('click', function (e) {
            e.stopPropagation();
            
            if (profileMenu.classList.contains('opacity-0')) {
                // Show menu
                profileMenu.classList.remove('opacity-0', 'invisible', 'scale-95');
                profileMenu.classList.add('opacity-100', 'visible', 'scale-100');
            } else {
                // Hide menu
                profileMenu.classList.add('opacity-0', 'invisible', 'scale-95');
                profileMenu.classList.remove('opacity-100', 'visible', 'scale-100');
            }
        });
        
        // Close profile menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!profileButton.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.classList.add('opacity-0', 'invisible', 'scale-95');
                profileMenu.classList.remove('opacity-100', 'visible', 'scale-100');
            }
        });
    }

    // Collections dropdown functionality (Desktop)
    const collectionsButton = document.getElementById('collections-button');
    const collectionsMenu = document.getElementById('collections-menu');
    const collectionsArrow = document.getElementById('collections-arrow');
    
    if (collectionsButton && collectionsMenu) {
        collectionsButton.addEventListener('click', function (e) {
            e.stopPropagation();
            
            if (collectionsMenu.classList.contains('opacity-0')) {
                // Show menu
                collectionsMenu.classList.remove('opacity-0', 'invisible', 'scale-95');
                collectionsMenu.classList.add('opacity-100', 'visible', 'scale-100');
                collectionsArrow.classList.add('rotate-180');
            } else {
                // Hide menu
                collectionsMenu.classList.add('opacity-0', 'invisible', 'scale-95');
                collectionsMenu.classList.remove('opacity-100', 'visible', 'scale-100');
                collectionsArrow.classList.remove('rotate-180');
            }
        });
        
        // Close collections menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!collectionsButton.contains(e.target) && !collectionsMenu.contains(e.target)) {
                collectionsMenu.classList.add('opacity-0', 'invisible', 'scale-95');
                collectionsMenu.classList.remove('opacity-100', 'visible', 'scale-100');
                collectionsArrow.classList.remove('rotate-180');
            }
        });
    }

    // Collections dropdown functionality (Mobile)
    const mobileCollectionsButton = document.getElementById('mobile-collections-button');
    const mobileCollectionsMenu = document.getElementById('mobile-collections-menu');
    const mobileCollectionsArrow = document.getElementById('mobile-collections-arrow');
    
    if (mobileCollectionsButton && mobileCollectionsMenu) {
        mobileCollectionsButton.addEventListener('click', function (e) {
            e.stopPropagation();
            
            if (mobileCollectionsMenu.classList.contains('hidden')) {
                mobileCollectionsMenu.classList.remove('hidden');
                mobileCollectionsArrow.classList.add('rotate-180');
            } else {
                mobileCollectionsMenu.classList.add('hidden');
                mobileCollectionsArrow.classList.remove('rotate-180');
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
