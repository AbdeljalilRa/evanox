/**
 * Product Image Gallery Functionality
 * - Handles thumbnail clicks to update main product image
 * - Manages active state for thumbnails
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get required DOM elements
    const mainImage = document.getElementById('mainProductImage');
    const thumbnails = document.querySelectorAll('.thumbnail-image');

    // Add click handlers to thumbnails
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            // Update main image source
            mainImage.src = this.getAttribute('data-img');

            // Update active state styling
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
