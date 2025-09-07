 <nav class="container mx-auto px-4 pt-2">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="h-20">
                    <img src="{{ asset('images/svg.png') }}" alt="EX Logo" class="h-full">
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>ENTER</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('collections') }}" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>COLLECTIONS</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>THE ARCHIVE</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>THE CODE</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <button class="text-white hover:text-gray-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <button class="text-white hover:text-gray-300 transition-colors bag-icon relative" id="bag-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="bag-count absolute -top-1 -right-1 bg-white text-black text-xs rounded-full h-4 w-4 flex items-center justify-center font-bold hidden">0</span>
                    </button>
                    <!-- Desktop Dropdown Menu Button -->
                    <button class="hidden md:block text-white hover:text-gray-300 transition-colors"
                        id="dropdown-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <!-- Mobile Menu Button -->
                    <button class="text-white hover:text-gray-300 transition-colors md:hidden" id="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden hidden transform transition-all duration-300 ease-in-out opacity-0 scale-95"
                id="mobile-menu">
                <div class="flex flex-col space-y-3 mt-3">
                    <!-- Main Navigation -->
                    <div class="border-b border-gray-700 pb-3">
                        <a href="#"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm">HOME</a>
                        <a href="#"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm">PRODUCT</a>
                        <a href="#"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm">STORE</a>
                        <a href="#"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm">ABOUT US</a>
                    </div>
                    <!-- Additional Mobile Menu Items (for future dropdowns) -->
                    <div class="pt-4">
                        <!-- Placeholder for dropdown menu items -->
                        <div class="space-y-4">
                            <!-- Add your dropdown menu items here -->
                        </div>
                    </div>
                </div>
            </div>
        </nav>