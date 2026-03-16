<nav class="w-full">
    <!-- Desktop Navbar -->
    <div class="hidden md:flex px-[99px] pt-[35px] justify-between items-center">
        <!-- Logo (wh) - 140px × 93px -->
        <a href="{{ route('store.index') }}" class="w-[140px] h-[93px] flex-shrink-0">
            <img src="{{ asset('images/svg.png') }}" alt="EX Logo" class="w-full h-full object-contain">
        </a>

        <!-- Navigation Links - Montserrat 500, 22px/27px -->
        <div class="flex items-center gap-[30px]">
            <a href="{{ route('store.index') }}" class="text-white hover:text-gray-300 transition-colors relative group font-montserrat font-medium text-[22px] leading-[27px]">
                <span>ENTER</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
            </a>
            
            <div class="relative" id="collections-dropdown">
                <button class="text-white hover:text-gray-300 transition-colors relative group font-montserrat font-medium text-[22px] leading-[27px] flex items-center" id="collections-button">
                    <span>COLLECTIONS</span>
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" id="collections-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            
            <a href="{{ route('archive') }}" class="text-white hover:text-gray-300 transition-colors relative group font-montserrat font-medium text-[22px] leading-[27px]">
                <span>THE ARCHIVE</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
            </a>
            
            <a href="{{ route('code') }}" class="text-white hover:text-gray-300 transition-colors relative group font-montserrat font-medium text-[22px] leading-[27px]">
                <span>THE CODE</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
            </a>
        </div>

        <!-- Desktop Right Icons -->
        <div class="flex items-center gap-[20px]">
            <!-- icon2 - Profile (43px × 45px) -->
            <div class="relative flex items-center" id="profile-dropdown">
                <button class="text-white hover:text-gray-300 transition-colors flex items-center" id="profile-button">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile" class="w-[43px] h-[45px] object-contain">
                </button>
                
                <!-- Profile Dropdown Menu -->
                <div class="absolute right-0 top-full mt-2 w-48 bg-black border border-gray-700 rounded-lg shadow-lg opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out z-50" id="profile-menu">
                    <div class="py-2">
                        @auth
                            <div class="px-4 py-2 border-b border-gray-700">
                                <div class="text-white font-montserrat font-bold text-xs uppercase tracking-wider mb-1">Profile</div>
                                <a href="{{ route('profile.show') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">My Profile</a>
                                <a href="{{ route('profile.downloads') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">Access My Downloads</a>
                            </div>
                            <div class="px-4 py-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">Sign Out</button>
                                </form>
                            </div>
                        @else
                            <div class="px-4 py-2">
                                <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1 mb-2">Sign In</a>
                                <a href="{{ route('register') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">Sign Up</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            
            <!-- icon1 - Bag (39px × 50px) -->
            <button class="text-white hover:text-gray-300 transition-colors bag-icon relative flex items-center" id="bag-icon">
                <img src="{{ asset('images/bag.png') }}" alt="Bag" class="w-[39px] h-[50px] object-contain">
                <span class="bag-count absolute -top-1 -right-1 bg-white text-black text-xs rounded-full h-4 w-4 flex items-center justify-center font-bold hidden">0</span>
            </button>
            
            <!-- icon3 - Menu (46px × 40px) -->
            <button class="flex items-center text-white hover:text-gray-300 transition-colors" id="dropdown-menu-button">
                <img src="{{ asset('images/burger.png') }}" alt="Menu" class="w-[46px] h-[40px] object-contain">
            </button>
        </div>
    </div>

    <!-- Mobile Navbar - Exact Figma positioning -->
    <!-- Logo: left:8px, top:16px, 84×56px -->
    <!-- Icons: right:8px, top:31px, 95×23.35px -->
    <div class="relative md:hidden h-[88px]">
        <!-- Mobile Logo - positioned absolutely -->
        <a href="{{ route('store.index') }}" class="absolute left-[8px] top-[16px] w-[84px] h-[56px]">
            <img src="{{ asset('images/svg.png') }}" alt="EX Logo" class="w-full h-full object-contain">
        </a>

        <!-- Mobile Icons Group - positioned absolutely -->
        <div class="absolute right-[8px] top-[31px] w-[95px] h-[23px] flex items-center justify-between">
            <!-- icon2 - Profile (~20×21px) -->
            <div class="relative" id="mobile-profile-dropdown">
                <button class="text-white hover:text-gray-300 transition-colors flex items-center" id="mobile-profile-button">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile" class="w-[20px] h-[21px] object-contain">
                </button>
                
                <!-- Mobile Profile Dropdown -->
                <div class="absolute right-0 top-full mt-2 w-48 bg-black border border-gray-700 rounded-lg shadow-lg opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out z-50" id="mobile-profile-menu">
                    <div class="py-2">
                        @auth
                            <div class="px-4 py-2 border-b border-gray-700">
                                <div class="text-white font-montserrat font-bold text-xs uppercase tracking-wider mb-1">Profile</div>
                                <a href="{{ route('profile.show') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">My Profile</a>
                                <a href="{{ route('profile.downloads') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">Access My Downloads</a>
                            </div>
                            <div class="px-4 py-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">Sign Out</button>
                                </form>
                            </div>
                        @else
                            <div class="px-4 py-2">
                                <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1 mb-2">Sign In</a>
                                <a href="{{ route('register') }}" class="block text-gray-300 hover:text-white text-xs font-montserrat transition-colors duration-200 py-1">Sign Up</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            
            <!-- icon1 - Bag (~18×23px) -->
            <button class="text-white hover:text-gray-300 transition-colors bag-icon relative flex items-center" id="mobile-bag-icon">
                <img src="{{ asset('images/bag.png') }}" alt="Bag" class="w-[18px] h-[23px] object-contain">
                <span class="bag-count absolute -top-1 -right-1 bg-white text-black text-[10px] rounded-full h-3 w-3 flex items-center justify-center font-bold hidden">0</span>
            </button>
            
            <!-- icon3 - Menu (~21×18px) -->
            <button class="flex items-center text-white hover:text-gray-300 transition-colors" id="mobile-menu-button">
                <img src="{{ asset('images/burger.png') }}" alt="Menu" class="w-[21px] h-[18px] object-contain">
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Slide-down) -->
    <div class="md:hidden hidden transform transition-all duration-300 ease-in-out opacity-0 scale-95 px-[8px]" id="mobile-menu">
        <div class="flex flex-col space-y-3 mt-3 pb-4">
            <div class="border-b border-gray-700 pb-3">
                <a href="{{ route('store.index') }}" class="text-white hover:text-gray-300 transition-colors py-2 font-montserrat font-medium block text-[16px] uppercase">ENTER</a>
                
                <div class="py-2">
                    <button class="text-white hover:text-gray-300 transition-colors font-montserrat font-medium flex items-center justify-between w-full text-[16px] uppercase" id="mobile-collections-button">
                        <span>COLLECTIONS</span>
                        <svg class="w-3 h-3 transition-transform duration-200" id="mobile-collections-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden pl-4 mt-2 space-y-2" id="mobile-collections-menu">
                        <a href="{{ route('collections') }}" class="text-gray-300 hover:text-white transition-colors py-1 block text-[14px] font-montserrat">View All</a>
                        @isset($navCategories)
                            @foreach($navCategories as $category)
                                <a href="{{ route('collections.show', $category->slug) }}" class="text-gray-300 hover:text-white transition-colors py-1 block text-[14px] font-montserrat">{{ $category->title }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
                
                <a href="{{ route('archive') }}" class="text-white hover:text-gray-300 transition-colors py-2 font-montserrat font-medium block text-[16px] uppercase">THE ARCHIVE</a>
                <a href="{{ route('code') }}" class="text-white hover:text-gray-300 transition-colors py-2 font-montserrat font-medium block text-[16px] uppercase">THE CODE</a>
            </div>
            
            @auth
                <div class="border-b border-gray-700 pb-3">
                    <div class="text-white font-montserrat font-bold text-[12px] uppercase tracking-wider mb-2">Profile</div>
                    <a href="{{ route('profile.show') }}" class="text-gray-300 hover:text-white transition-colors py-1 block text-[14px] font-montserrat ml-2">My Profile</a>
                    <a href="{{ route('profile.downloads') }}" class="text-gray-300 hover:text-white transition-colors py-1 block text-[14px] font-montserrat ml-2">Access My Downloads</a>
                </div>
                
                <div class="pt-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300 transition-colors py-1 font-montserrat font-medium block text-[14px]">Sign Out</button>
                    </form>
                </div>
            @else
                <div class="pt-2">
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-300 transition-colors py-2 font-montserrat font-medium block text-[14px]">Sign In</a>
                    <a href="{{ route('register') }}" class="text-white hover:text-gray-300 transition-colors py-2 font-montserrat font-medium block text-[14px]">Sign Up</a>
                </div>
            @endauth
        </div>
    </div>
</nav>