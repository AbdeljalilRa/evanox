@extends('layouts.store.app')

@section('title', 'My Profile - EVANOX')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-wide font-montserrat">
                MY PROFILE
            </h1>
            <p class="text-gray-300 font-nunito">
                Manage your account settings and download history
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Sidebar Navigation -->
                <div class="md:col-span-1">
                    <div class="bg-gray-900 border border-gray-700 rounded-lg p-6">
                        <h3 class="text-lg font-bold font-montserrat mb-4">Account Menu</h3>
                        <nav class="space-y-2">
                            <a href="#profile-info" 
                               class="block text-gray-300 hover:text-white transition-colors py-2 px-3 rounded font-nunito profile-tab active"
                               data-tab="profile-info">
                                Profile Information
                            </a>
                            <a href="#downloads" 
                               class="block text-gray-300 hover:text-white transition-colors py-2 px-3 rounded font-nunito profile-tab"
                               data-tab="downloads">
                                My Downloads
                            </a>
                            <a href="#order-history" 
                               class="block text-gray-300 hover:text-white transition-colors py-2 px-3 rounded font-nunito profile-tab"
                               data-tab="order-history">
                                Order History
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="md:col-span-2">
                    <!-- Profile Information Tab -->
                    <div id="profile-info-content" class="tab-content active">
                        <div class="bg-gray-900 border border-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-bold font-montserrat mb-6">Profile Information</h3>
                            
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('POST')
                                
                                <div class="grid md:grid-cols-2 gap-6">
                                    <!-- First Name -->
                                    <div>
                                        <label for="first_name" class="block text-sm font-medium text-gray-300 mb-2 font-montserrat">
                                            First Name
                                        </label>
                                        <input type="text" 
                                               id="first_name" 
                                               name="first_name" 
                                               value="{{ auth()->user()->first_name ?? '' }}"
                                               class="w-full bg-black border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-white focus:outline-none transition-colors font-nunito">
                                    </div>

                                    <!-- Last Name -->
                                    <div>
                                        <label for="last_name" class="block text-sm font-medium text-gray-300 mb-2 font-montserrat">
                                            Last Name
                                        </label>
                                        <input type="text" 
                                               id="last_name" 
                                               name="last_name" 
                                               value="{{ auth()->user()->last_name ?? '' }}"
                                               class="w-full bg-black border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-white focus:outline-none transition-colors font-nunito">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mt-6">
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2 font-montserrat">
                                        Email Address
                                    </label>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ auth()->user()->email }}"
                                           class="w-full bg-black border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-white focus:outline-none transition-colors font-nunito">
                                </div>

                                <!-- Update Button -->
                                <div class="mt-8">
                                    <button type="submit" 
                                            class="bg-white text-black px-8 py-3 rounded-lg font-bold font-montserrat hover:bg-gray-200 transition-colors">
                                        UPDATE PROFILE
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Downloads Tab -->
                    <div id="downloads-content" class="tab-content hidden">
                        <div class="bg-gray-900 border border-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-bold font-montserrat mb-6">My Downloads</h3>
                            
                            <div class="space-y-4">
                                <!-- Download Item Example -->
                                <div class="border border-gray-700 rounded-lg p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-bold font-montserrat text-white mb-1">Design Pack #1</h4>
                                            <p class="text-gray-300 text-sm font-nunito">Downloaded on: March 15, 2024</p>
                                            <p class="text-gray-300 text-sm font-nunito">License: Commercial Use</p>
                                        </div>
                                        <button class="bg-white text-black px-4 py-2 rounded font-montserrat font-bold text-sm hover:bg-gray-200 transition-colors">
                                            DOWNLOAD AGAIN
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- No Downloads Message -->
                                <div class="text-center py-12">
                                    <p class="text-gray-400 font-nunito">No downloads yet. Start exploring our collections!</p>
                                    <a href="{{ route('collections') }}" 
                                       class="inline-block mt-4 bg-white text-black px-6 py-3 rounded-lg font-bold font-montserrat hover:bg-gray-200 transition-colors">
                                        BROWSE COLLECTIONS
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order History Tab -->
                    <div id="order-history-content" class="tab-content hidden">
                        <div class="bg-gray-900 border border-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-bold font-montserrat mb-6">Order History</h3>
                            
                            <div class="space-y-4">
                                <!-- Order Item Example -->
                                <div class="border border-gray-700 rounded-lg p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-bold font-montserrat text-white mb-1">Order #EVNX001</h4>
                                            <p class="text-gray-300 text-sm font-nunito">Date: March 15, 2024</p>
                                            <p class="text-gray-300 text-sm font-nunito">Total: $29.99</p>
                                            <p class="text-green-400 text-sm font-nunito font-bold">Status: Completed</p>
                                        </div>
                                        <button class="bg-white text-black px-4 py-2 rounded font-montserrat font-bold text-sm hover:bg-gray-200 transition-colors">
                                            VIEW DETAILS
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- No Orders Message -->
                                <div class="text-center py-12">
                                    <p class="text-gray-400 font-nunito">No orders yet. Start shopping our exclusive designs!</p>
                                    <a href="{{ route('collections') }}" 
                                       class="inline-block mt-4 bg-white text-black px-6 py-3 rounded-lg font-bold font-montserrat hover:bg-gray-200 transition-colors">
                                        START SHOPPING
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Profile page specific styles */
.profile-tab.active {
    background-color: #374151;
    color: white;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

/* Form styling */
input:focus {
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
}

/* Mobile responsive */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    h1 {
        font-size: 2.5rem !important;
    }
    
    .grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Tab switching functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.profile-tab');
    const contents = document.querySelectorAll('.tab-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Show corresponding content
            const targetContent = document.getElementById(targetTab + '-content');
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
});
</script>
@endpush