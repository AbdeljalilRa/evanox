<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AccessRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Coming soon page (accessible without middleware)
Route::get('/coming-soon', [StoreController::class, 'comingSoon'])->name('coming-soon');

// Access request routes (accessible without middleware)
Route::post('/access-request', [AccessRequestController::class, 'store'])->name('access-request.store');
Route::post('/verify-password', [AccessRequestController::class, 'verifyPassword'])->name('verify-password');

// Store routes (protected by store access middleware)
Route::middleware(['store.access'])->group(function () {
    Route::get('/home', [StoreController::class, 'index'])->name('store.index');
    Route::get('/collections', [StoreController::class, 'collections'])->name('collections');
    Route::get('/productdetails', [StoreController::class, 'productDetails'])->name('productdetails');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    // Admin dashboard
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin prefix group
    Route::prefix('admin')->name('admin.')->group(function () {
        // Categories Resource Routes
        Route::resource('categories', CategoryController::class);

        // Or if you want to be explicit about each route:

        // List all categories
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories.index');

        // Show create category form
        Route::get('/categories/create', [CategoryController::class, 'create'])
            ->name('categories.create');

        // Store new category
        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('categories.store');

        // Show edit category form
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');

        // Update category
        Route::put('/categories/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');

        // Delete category
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

        // Products
        Route::resource('products', ProductController::class)->parameters([
            'products' => 'product:slug'
        ]);

        Route::patch('products/{product:slug}/toggle-status', [ProductController::class, 'toggleStatus'])
            ->name('products.toggle-status');

        // Access Requests
        Route::get('/access-requests', [AccessRequestController::class, 'index'])
            ->name('access-requests.index');
        Route::patch('/access-requests/{accessRequest}/approve', [AccessRequestController::class, 'approve'])
            ->name('access-requests.approve');

        // Store Settings
        Route::patch('/store-settings', [App\Http\Controllers\SettingsController::class, 'updateStoreSettings'])
            ->name('store-settings.update');
    });
});

require __DIR__ . '/auth.php';
