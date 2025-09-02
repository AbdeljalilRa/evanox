// EVANOX Shopping Bag
class EvanoxShoppingBag {
    constructor() {
        this.bagPanel = document.getElementById('evanox-bag-panel');
        this.bagOverlay = document.getElementById('bag-overlay');
        this.bagContent = document.getElementById('bag-content');
        this.bagCount = document.querySelector('.bag-count');
        this.bagTotal = document.getElementById('bag-total');
        this.closeBtn = document.getElementById('close-bag');
        this.items = this.loadBagItems() || [];

        this.initListeners();
        this.updateBagUI();
    }

    initListeners() {
        // Toggle bag on bag icon click
        document.querySelectorAll('.bag-icon').forEach(icon => {
            icon.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggleBag();
            });
        });

        // Close bag when close button is clicked
        if (this.closeBtn) {
            this.closeBtn.addEventListener('click', () => this.closeBag());
        }

        // Close bag when clicking outside
        if (this.bagOverlay) {
            this.bagOverlay.addEventListener('click', () => this.closeBag());
        }

        // Close bag with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') this.closeBag();
        });

        // Listen for "Add to Bag" button click
        document.addEventListener('click', (e) => {
            if (e.target.matches('#addToBagBtn')) {
                this.addProductFromPage();
            }
        });

        // Listen for remove, increase, decrease quantity buttons
        document.addEventListener('click', (e) => {
            if (e.target.closest('.remove-item')) {
                const itemId = e.target.closest('.remove-item').dataset.id;
                this.removeItem(itemId);
            }
            
            if (e.target.closest('.decrease-quantity')) {
                const itemId = e.target.closest('.decrease-quantity').dataset.id;
                this.updateQuantity(itemId, 'decrease');
            }
            
            if (e.target.closest('.increase-quantity')) {
                const itemId = e.target.closest('.increase-quantity').dataset.id;
                this.updateQuantity(itemId, 'increase');
            }
        });
    }

    toggleBag() {
        if (this.bagPanel.classList.contains('active')) {
            this.closeBag();
        } else {
            this.openBag();
        }
    }

    openBag() {
        this.bagPanel.classList.add('active');
        this.bagOverlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    closeBag() {
        this.bagPanel.classList.remove('active');
        this.bagOverlay.classList.remove('active');
        document.body.style.overflow = ''; // Restore scrolling
    }

    addProductFromPage() {
        // Get product details from the page
        const productName = document.querySelector('h1')?.innerText.trim() || "Product";
        const productPrice = document.querySelector('.text-white.text-\\[19px\\].font-montserrat.font-extrabold')?.innerText.trim() || "$99.00";
        const productImage = document.getElementById('mainProductImage')?.getAttribute('src') || "";
        
        // Create product object
        const product = {
            id: this.generateUniqueId(),
            name: productName,
            price: productPrice,
            image: productImage,
            quantity: 1
        };
        
        this.addItem(product);
    }
    
    addItem(product) {
        // Check if item already exists
        const existingItem = this.items.find(item => item.name === product.name);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.items.push(product);
        }
        
        this.saveBagItems();
        this.updateBagUI();
        this.showAddedToBagMessage(product.name);
    }
    
    removeItem(id) {
        this.items = this.items.filter(item => item.id !== id);
        this.saveBagItems();
        this.updateBagUI();
    }
    
    updateQuantity(id, action) {
        const itemIndex = this.items.findIndex(item => item.id === id);
        
        if (itemIndex > -1) {
            if (action === 'increase') {
                this.items[itemIndex].quantity += 1;
            } else if (action === 'decrease') {
                if (this.items[itemIndex].quantity > 1) {
                    this.items[itemIndex].quantity -= 1;
                }
            }
            
            this.saveBagItems();
            this.updateBagUI();
        }
    }
    
    updateBagUI() {
        // Update bag count
        const totalItems = this.items.reduce((total, item) => total + item.quantity, 0);
        if (this.bagCount) {
            this.bagCount.textContent = totalItems;
            
            if (totalItems > 0) {
                this.bagCount.classList.remove('hidden');
            } else {
                this.bagCount.classList.add('hidden');
            }
        }
        
        // Update bag contents
        if (this.bagContent) {
            if (this.items.length === 0) {
                this.bagContent.innerHTML = `
                    <div class="py-10 text-center">
                        <p class="text-white mb-4 font-montserrat">Your bag is empty</p>
                        <a href="/shop" class="bg-white text-black px-6 py-2 rounded-full font-montserrat font-medium hover:bg-white/80 transition">Shop Now</a>
                    </div>
                `;
            } else {
                let html = '';
                let total = 0;
                
                this.items.forEach(item => {
                    // Extract numeric price value
                    const priceValue = parseFloat(item.price.replace(/[^0-9.]/g, ''));
                    const itemTotal = priceValue * item.quantity;
                    total += itemTotal;
                    
                    html += `
                        <div class="bag-item flex gap-4">
                            <img src="${item.image}" alt="${item.name}" class="w-20 h-20 object-cover">
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="text-white font-montserrat font-medium text-sm">${item.name}</h3>
                                    <button class="remove-item text-white/60 hover:text-white" data-id="${item.id}">✕</button>
                                </div>
                                <p class="text-white/80 font-montserrat text-sm">${item.price}</p>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="bag-quantity-controls flex items-center gap-3">
                                        <button class="decrease-quantity" data-id="${item.id}">-</button>
                                        <span class="text-white">${item.quantity}</span>
                                        <button class="increase-quantity" data-id="${item.id}">+</button>
                                    </div>
                                    <p class="text-white font-montserrat font-medium">$${(itemTotal).toFixed(2)}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                // Add the total and checkout button at the bottom
                html += `
                    <div class="mt-6 pt-4 border-t border-white/10">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-white font-montserrat font-bold text-base">TOTAL:</span>
                            <span id="bag-total" class="text-white font-montserrat font-extrabold text-[16px]">$${total.toFixed(2)}</span>
                        </div>
                        <button id="checkout-btn" class="w-full bg-white text-black font-montserrat font-extrabold text-[16px] py-3 px-8 rounded-full hover:bg-white/90 transition-colors">
                            Checkout Now
                        </button>
                    </div>
                `;
                
                this.bagContent.innerHTML = html;
                
                // Add event listener to checkout button
                const checkoutBtn = document.getElementById('checkout-btn');
                if (checkoutBtn) {
                    checkoutBtn.addEventListener('click', () => this.proceedToCheckout());
                }
            }
        }
    }
    
    proceedToCheckout() {
        // You can replace this with a redirect to your checkout page
        // For now, we'll show a notification that checkout is in progress
        
        // Close the bag panel
        this.closeBag();
        
        // Show checkout notification
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 left-1/2 transform -translate-x-1/2 bg-white text-black py-3 px-6 rounded-lg shadow-lg z-50 font-montserrat flex items-center';
        notification.innerHTML = `
            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <span>Proceeding to checkout...</span>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            // Fade out and remove notification
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s ease';
            
            setTimeout(() => {
                document.body.removeChild(notification);
                
                // Redirect to checkout page
                // window.location.href = '/checkout';
                
                // For demo purposes, just show a message
                alert('This would redirect to the checkout page in a real implementation.');
            }, 300);
        }, 2000);
    }
    
    generateUniqueId() {
        return Date.now().toString(36) + Math.random().toString(36).substring(2, 9);
    }
    
    loadBagItems() {
        const items = localStorage.getItem('evanoxBagItems');
        return items ? JSON.parse(items) : [];
    }
    
    saveBagItems() {
        localStorage.setItem('evanoxBagItems', JSON.stringify(this.items));
    }
    
    showAddedToBagMessage(productName) {
        // Remove any existing message
        const existingMessage = document.querySelector('.add-to-bag-animation');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        // Create message element
        const message = document.createElement('div');
        message.className = 'add-to-bag-animation';
        message.innerHTML = `
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>Added to bag</span>
        `;
        
        // Add to body and remove after animation
        document.body.appendChild(message);
        setTimeout(() => {
            message.remove();
        }, 3000);
    }
}

// Initialize shopping bag when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const evanoxBag = new EvanoxShoppingBag();
});
