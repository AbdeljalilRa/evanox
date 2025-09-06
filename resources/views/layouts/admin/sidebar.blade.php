 <div class="main-nav">
     <!-- Sidebar Logo -->
     <div class="logo-box">
         <a href="index.html" class="logo-dark">
             <img src="assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
             <img src="assets/images/logo-dark.png" class="logo-lg" alt="logo dark">
         </a>

         <a href="index.html" class="logo-light">
             <img src="assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
             <img src="assets/images/logo-light.png" class="logo-lg" alt="logo light">
         </a>
     </div>


     <div class="scrollbar" data-simplebar>
         <ul class="navbar-nav" id="navbar-nav">

             <li class="menu-title">General</li>

             <li class="nav-item">
                 <a class="nav-link" href="index.html">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text"> Dashboard </span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                     aria-expanded="false" aria-controls="sidebarProducts">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
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

             <li class="nav-item">
                 <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button"
                     aria-expanded="false" aria-controls="sidebarCategory">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
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

             <li class="menu-title mt-2">Users</li>

             <li class="nav-item">
                 <a class="nav-link" href="pages-profile.html">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text"> Profile </span>
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                     aria-expanded="false" aria-controls="sidebarCustomers">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text"> Customers </span>
                 </a>
                 <div class="collapse" id="sidebarCustomers">
                     <ul class="nav sub-navbar-nav">

                         <li class="sub-nav-item">
                             <a class="sub-nav-link" href="customer-list.html">List</a>
                         </li>
                         <li class="sub-nav-item">
                             <a class="sub-nav-link" href="customer-detail.html">Details</a>
                         </li>
                     </ul>
                 </div>
             </li>

             <li class="menu-title mt-2">Other</li>

             <li class="nav-item">
                 <a class="nav-link" href="pages-review.html">
                     <span class="nav-icon">
                         <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                     </span>
                     <span class="nav-text"> Reviews </span>
                 </a>
             </li>


         </ul>
     </div>
 </div>
