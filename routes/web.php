<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StoreStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComingSoonController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStoreStatus;
use App\Http\Middleware\AdminMiddleware;

// ======================
// Public Store routes
// ======================
Route::middleware(CheckStoreStatus::class)->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name('store.index');
    Route::get('/product/{slug}', [StoreController::class, 'show'])->name('store.show');
    Route::get('/collections', fn() => view('store.collections'))->name('collections');
    Route::get('/drop', fn() => view('store.drop'))->name('drop');
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
    });
});


require __DIR__ . '/auth.php';
