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
    
    // Drop page
    Route::get('/drop', fn() => view('store.drop'))->name('drop');
    
    // Archive page
    Route::get('/archive', fn() => view('store.archive'))->name('archive');
    
    // Code page
    Route::get('/code', fn() => view('store.code'))->name('code');
    
    // Order page (for viewing orders)
    Route::get('/order/{id}', fn($id) => view('store.order', compact('id')))->name('order.view');
});

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
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');       // عرض البروفايل
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');   // تعديل البروفايل
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  // تحديث
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // حذف


    // ======================
    // Admin routes
    // ======================
    Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {

        // Dashboard
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

        // Orders
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])
            ->name('orders.update-status');
    });
});


require __DIR__ . '/auth.php';
