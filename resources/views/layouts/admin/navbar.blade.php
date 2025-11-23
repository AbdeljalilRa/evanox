<!-- resources/views/layouts/partials/navbar.blade.php -->

<header class="topbar">
    <div class="container-fluid">
        <div class="navbar-header d-flex justify-content-between align-items-center">

            <!-- Left Side (Logo + Menu Toggle) -->
            <div class="d-flex align-items-center">
                <!-- Menu Toggle Button -->
                <div class="topbar-item">
                    <button type="button" class="button-toggle-menu me-2">
                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- Welcome -->
                <div class="topbar-item">
                    <h4 class="fw-bold text-uppercase mb-0">Welcome, {{ Auth::user()->name ?? 'Guest' }}</h4>
                </div>
            </div>

            <!-- Right Side (Actions) -->
            <div class="d-flex align-items-center gap-2">

                <!-- Light/Dark Mode -->
                <div class="topbar-item">
                    <button type="button" class="topbar-button" id="light-dark-mode">
                        <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- Settings -->
                <div class="topbar-item d-none d-md-flex">
                    <button type="button" class="topbar-button" id="theme-settings-btn" data-bs-toggle="offcanvas"
                        data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                        <iconify-icon icon="solar:settings-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- User Dropdown -->
                <div class="dropdown topbar-item">
                    <a class="topbar-button d-flex align-items-center" href="#" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img class="rounded-circle" width="32"
                            src="{{ Auth::user()->avatar_url ?? asset('assets/images/users/avatar-1.jpg') }}"
                            alt="User Avatar">

                        <span class="ms-2 d-none d-lg-inline fw-semibold">
                            {{ Auth::user()->name ?? 'Guest' }}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end shadow">
                        <h6 class="dropdown-header">Welcome, {{ Auth::user()->name ?? 'Guest' }}!</h6>

                        @auth
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                <i class="bx bx-user-circle text-muted me-2"></i> Profile
                            </a>
                        @endauth

                        <div class="dropdown-divider"></div>

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">
                                    <i class="bx bx-log-out me-2"></i> Logout
                                </button>
                            </form>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="bx bx-log-in me-2"></i> Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Right Sidebar (Theme Settings) -->
<div>
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3 settings-bar">

                    <div>
                        <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label" for="layout-color-light">Light</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label" for="layout-color-dark">Dark</label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 font-16 fw-semibold">Topbar Color</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-topbar-color"
                                id="topbar-color-light" value="light">
                            <label class="form-check-label" for="topbar-color-light">Light</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-topbar-color"
                                id="topbar-color-dark" value="dark">
                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
                        </div>
                    </div>


                    <div>
                        <h5 class="my-3 font-16 fw-semibold">Menu Color</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-color"
                                id="leftbar-color-light" value="light">
                            <label class="form-check-label" for="leftbar-color-light">
                                Light
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-color"
                                id="leftbar-color-dark" value="dark">
                            <label class="form-check-label" for="leftbar-color-dark">
                                Dark
                            </label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 font-16 fw-semibold">Sidebar Size</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size"
                                id="leftbar-size-default" value="default">
                            <label class="form-check-label" for="leftbar-size-default">
                                Default
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size"
                                id="leftbar-size-small" value="condensed">
                            <label class="form-check-label" for="leftbar-size-small">
                                Condensed
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-hidden"
                                value="hidden">
                            <label class="form-check-label" for="leftbar-hidden">
                                Hidden
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size"
                                id="leftbar-size-small-hover-active" value="sm-hover-active">
                            <label class="form-check-label" for="leftbar-size-small-hover-active">
                                Small Hover Active
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size"
                                id="leftbar-size-small-hover" value="sm-hover">
                            <label class="form-check-label" for="leftbar-size-small-hover">
                                Small Hover
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger w-100" id="reset-layout">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
