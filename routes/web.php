<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', function () {
    return view('store.index');
});

Route::get('/collections', function () {
    return view('store.collections');
})->name('collections');

Route::get('/productdetails', function () {
    return view('store.productdetails');
})->name('productdetails');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    // Dashboard redirect route (for Laravel Breeze compatibility)
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
    
    // Admin dashboard
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Admin prefix group
    Route::prefix('admin')->name('admin.')->group(function () {
        // Store status toggle
        Route::post('/store-status/toggle', [AdminDashboardController::class, 'toggleStoreStatus'])
            ->name('store-status.toggle');
            
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
    });
});

require __DIR__ . '/auth.php';
