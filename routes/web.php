<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StoreStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\StoreAccessRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStoreStatus;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\CouponController;

// ======================
// Public Store routes
// ======================
Route::middleware(CheckStoreStatus::class)->group(function () {
    // Homepage
    Route::get('/', [StoreController::class, 'index'])->name('store.index');
    
    // Product pages
    Route::get('/product/{slug}', [StoreController::class, 'show'])->name('store.show');
    
    // Collections page
    Route::get('/collections', fn() => view('store.collections'))->name('collections');
    Route::get('/collections/{slug}', [StoreController::class, 'showCollection'])->name('collections.show');
    
    // Drop page
    Route::get('/drop', fn() => view('store.drop'))->name('drop');
    
    // Archive page
    Route::get('/archive', fn() => view('store.archive'))->name('archive');
    
    // Code page
    Route::get('/code', fn() => view('store.code'))->name('code');
    
    // Order page (for viewing orders)
    Route::get('/order/{id}', fn($id) => view('store.order', compact('id')))->name('order.view');
    
    // Contact Us page
    Route::get('/contact', fn() => view('store.contactus'))->name('contact');
    
    // About Us page
    Route::get('/about-us', fn() => view('store.aboutus'))->name('about.us');
    
    // FAQs page
    Route::get('/faqs', fn() => view('store.FAQS'))->name('faqs');
    
    // Terms of Service page
    Route::get('/terms-of-service', fn() => view('store.terms'))->name('terms.service');
    
    // Privacy Policy page
    Route::get('/privacy-policy', fn() => view('store.privacy'))->name('privacy.policy');
    
    // Refund Policy page
    Route::get('/refund-policy', fn() => view('store.refund'))->name('refund.policy');
    
    // Newsletter subscription route coupons
    Route::post('/newsletter/coupon', [StoreController::class, 'newsletterCoupon'])
        ->name('newsletter.coupon');
});
Route::get('/collections', fn() => view('store.collections'))->name('collections');

// Routes coming soon بدون middleware
Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming.soon');
Route::post('/coming-soon/register', [ComingSoonController::class, 'register'])->name('coming.soon.register');
Route::post('/coming-soon/request-access', [ComingSoonController::class, 'requestAccess'])->name('comingsoon.request');
Route::post('/coming-soon/enter', [ComingSoonController::class, 'enter'])->name('comingsoon.enter');


// ======================
// Authenticated routes
// ======================
Route::middleware(['auth'])->group(function () {

    // ======================
    // Checkout + Payments
    // ======================
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/payment/create-intent', [PaymentController::class, 'createPaymentIntent'])->name('payment.create-intent');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

    // ======================
    // ======================
    // Customer Profile (for buyers/visitors)
    // ======================
    Route::get('/profile', fn() => view('store.profile'))->name('profile.show');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');
    // Delete user account
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Customer Downloads
    Route::get('/my-downloads', fn() => view('store.downloads'))->name('profile.downloads');

    // ======================
    // Admin routes
    // ======================
    Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('access-requests', StoreAccessRequestController::class)->only(['index', 'destroy']);
        Route::post('access-requests/{id}/send-password', [StoreAccessRequestController::class, 'sendPassword'])->name('access-requests.send-password');
        Route::post('access-requests/bulk-send-password', [StoreAccessRequestController::class, 'bulkSendPassword'])
            ->name('access-requests.bulk-send-password');

        // Store Status toggle (on/off)
        Route::post('/store-status', [StoreStatusController::class, 'toggle'])->name('store-status.toggle');

        // Categories (resource routes)
        Route::resource('categories', CategoryController::class)
            ->parameters([
                'categories' => 'category:slug'
            ]);
        // Products (resource routes with slug parameter)
        Route::resource('products', ProductController::class)->parameters([
            'products' => 'product:slug'
        ]);

        // Toggle product status
        Route::patch('products/{product:slug}/toggle-status', [ProductController::class, 'toggleStatus'])
            ->name('products.toggle-status');

        // Customers
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');
        Route::get('customers/{customer:slug}', [CustomerController::class, 'show'])->name('customers.show');
        Route::get('customers/{customer:slug}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::put('customers/{customer:slug}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('customers/{customer:slug}', [CustomerController::class, 'destroy'])->name('customers.destroy');



        // Orders
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])
            ->name('orders.update-status');

        // Coupons
        Route::resource('coupons', CouponController::class)
            ->scoped([
                'coupon' => 'slug'
            ]);
    });
});


require __DIR__ . '/auth.php';
