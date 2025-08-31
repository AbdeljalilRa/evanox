<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', function () {
    return view('store.index');
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
    });
});

require __DIR__ . '/auth.php';
