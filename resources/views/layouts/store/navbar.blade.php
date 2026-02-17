 <nav class="container mx-auto px-4 pt-2">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('store.index') }}" class="h-20">
                    <img src="{{ asset('images/svg.png') }}" alt="EX Logo" class="h-full">
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('store.index') }}" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>ENTER</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <div class="relative" id="collections-dropdown">
                        <button class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm flex items-center" id="collections-button">
                            <span>COLLECTIONS</span>
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200" id="collections-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                        </button>
                        
                        <!-- Collections Dropdown Menu -->
                        <div class="absolute left-0 mt-2 w-56 bg-black border border-gray-700 rounded-lg shadow-lg opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out z-50" id="collections-menu">
                            <div class="py-2">
                                <a href="{{ route('collections') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-800 text-xs font-montserrat transition-colors duration-200 uppercase tracking-wider border-b border-gray-700">
                                    View All Collections
                                </a>
                                @isset($navCategories)
                                    @foreach($navCategories as $category)
                                        <a href="{{ route('collections.show', $category->slug) }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-800 text-xs font-montserrat transition-colors duration-200">
                                            {{ $category->title }}
                                        </a>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('archive') }}" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>THE ARCHIVE</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('code') }}" class="text-white hover:text-gray-300 transition-colors relative group font-medium text-sm">
                        <span>THE CODE</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Profile Dropdown -->
                    <div class="relative flex items-center" id="profile-dropdown">
                        <button class="text-white hover:text-gray-300 transition-colors flex items-center" id="profile-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>
                        
                        <!-- Profile Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-black border border-gray-700 rounded-lg shadow-lg opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out z-50" id="profile-menu">
                            <div class="py-2">
                                @auth
                                    <!-- Profile Section -->
                                    <div class="px-4 py-2 border-b border-gray-700">
                                        <div class="text-white font-montserrat font-bold text-xs uppercase tracking-wider mb-1">Profile</div>
                                        <a href="{{ route('profile.show') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">
                                            My Profile
                                        </a>
                                        <a href="{{ route('profile.downloads') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">
                                            Access My Downloads
                                        </a>
                                    </div>
                                    
                                    <!-- Sign Out Section -->
                                    <div class="px-4 py-2">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block w-full text-left text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">
                                                Sign Out
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <!-- Guest User -->
                                    <div class="px-4 py-2">
                                        <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1 mb-2">
                                            Sign In
                                        </a>
                                        <a href="{{ route('register') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">
                                            Sign Up
                                        </a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <button class="text-white hover:text-gray-300 transition-colors bag-icon relative flex items-center" id="bag-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="bag-count absolute -top-1 -right-1 bg-white text-black text-xs rounded-full h-4 w-4 flex items-center justify-center font-bold hidden">0</span>
                    </button>
                    <!-- Desktop Dropdown Menu Button -->
                    <button class="hidden md:flex items-center text-white hover:text-gray-300 transition-colors"
                        id="dropdown-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <!-- Mobile Menu Button -->
                    <button class="text-white hover:text-gray-300 transition-colors md:hidden flex items-center" id="mobile-menu-button">
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
                        <a href="{{ route('store.index') }}"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm font-montserrat">ENTER</a>
                        
                        <!-- Mobile Collections Dropdown -->
                        <div class="py-1">
                            <button class="text-white hover:text-gray-300 transition-colors font-medium flex items-center justify-between w-full text-sm font-montserrat" id="mobile-collections-button">
                                <span>COLLECTIONS</span>
                                <svg class="w-3 h-3 transition-transform duration-200" id="mobile-collections-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="hidden pl-4 mt-1 space-y-1" id="mobile-collections-menu">
                                <a href="{{ route('collections') }}" class="text-gray-300 hover:text-white transition-colors py-1 block text-xs font-montserrat">View All</a>
                                @isset($navCategories)
                                    @foreach($navCategories as $category)
                                        <a href="{{ route('collections.show', $category->slug) }}" class="text-gray-300 hover:text-white transition-colors py-1 block text-xs font-montserrat">{{ $category->title }}</a>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                        
                        <a href="{{ route('archive') }}"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm font-montserrat">THE ARCHIVE</a>
                        <a href="{{ route('code') }}"
                            class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm font-montserrat">THE CODE</a>
                    </div>
                    
                    <!-- Profile Section for Mobile -->
                    @auth
                        <div class="border-b border-gray-700 pb-3">
                            <div class="text-white font-montserrat font-bold text-xs uppercase tracking-wider mb-2">Profile</div>
                            <a href="{{ route('profile.show') }}"
                                class="text-gray-300 hover:text-white transition-colors py-1 block text-sm font-montserrat ml-2">My Profile</a>
                            <a href="{{ route('profile.downloads') }}"
                                class="text-gray-300 hover:text-white transition-colors py-1 block text-sm font-montserrat ml-2">Access My Downloads</a>
                        </div>
                        
                        <div class="pt-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm font-montserrat">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="pt-2">
                            <a href="{{ route('login') }}"
                                class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm font-montserrat">Sign In</a>
                            <a href="{{ route('register') }}"
                                class="text-white hover:text-gray-300 transition-colors py-1 font-medium block text-sm font-montserrat">Sign Up</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>