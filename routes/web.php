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
    Route::get('/', [StoreController::class, 'index'])->name('store.index');
    Route::get('/product/{slug}', [StoreController::class, 'show'])->name('store.show');
    Route::get('/drop', fn() => view('store.drop'))->name('drop');
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
    // Profile
    // ======================
    // Mla kan href kayst3ml profile.show
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.show');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');
    // Delete user account
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

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
        Route::resource('categories', CategoryController::class);

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
