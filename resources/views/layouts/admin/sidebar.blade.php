<div class="main-nav">
    <!-- Sidebar Logo -->
    {{-- <div class="logo-box">
        <a href="{{ route('admin.dashboard') }}" class="logo-dark">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo-light">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
            <img src="{{ asset('assets/images/logo-light.png') }}" class="logo-lg" alt="logo light">
        </a>
    </div> --}}




    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">

            <li class="menu-title">General</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:monitor-dashboard" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Dashboard </span>
                </a>
            </li>

            <!-- Coupons -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCoupons" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCoupons">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:ticket-percent-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Coupons </span>
                </a>
                <div class="collapse" id="sidebarCoupons">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.coupons.index') }}">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.coupons.create') }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>


            <!-- Products -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarProducts">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:package-variant-closed" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Products </span>
                </a>
                <div class="collapse" id="sidebarProducts">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.products.index') }}">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.products.create') }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Categories -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCategory">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:shape-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Category </span>
                </a>
                <div class="collapse" id="sidebarCategory">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.categories.index') }}">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.categories.create') }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Collections -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCollections" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCollections">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:folder-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Collections </span>
                </a>
                <div class="collapse" id="sidebarCollections">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.collections.index') }}">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.collections.create') }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:cart-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Orders </span>
                </a>
            </li>


            <!-- Users -->
            <li class="menu-title mt-2">Users</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.show') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:account-circle-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Profile </span>
                </a>
            </li>

            <!-- Customers -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCustomers">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:account-multiple-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Customers </span>
                </a>
                <div class="collapse" id="sidebarCustomers">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('admin.customers.index') }}">List</a>
                        </li>
                    </ul>
                </div>
            </li>


            <!-- Access Requests -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.access-requests.index') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:email-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Access Requests </span>
                </a>
            </li>

            <!-- Store Settings -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:cog-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Store Settings </span>
                </a>
            </li> --}}

            <li class="menu-title mt-2">Other</li>

            <!-- Reviews -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-icon">
                        <iconify-icon icon="mdi:star-outline" class="fs-20"></iconify-icon>
                    </span>
                    <span class="nav-text"> Reviews </span>
                </a>
            </li>

        </ul>
    </div>
</div>
