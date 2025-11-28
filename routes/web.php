<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/construccion', function () {
    return view('custom.construccion');
})->name('construccion');

// Public product catalog
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::get('/services', function() {
    return View('custom.services-page');
})->name('services');

Route::get('/contact', function() {
    return View('custom.contact-page');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart routes
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cartItem}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

    // Order routes
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/sales-report', [App\Http\Controllers\AdminController::class, 'salesReport'])->name('sales-report');
        
        // Product management
        Route::get('/products', [App\Http\Controllers\ProductController::class, 'adminIndex'])->name('products.index');
        Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
        Route::patch('/products/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

        // Order management
        Route::get('/orders', [App\Http\Controllers\OrderController::class, 'adminIndex'])->name('orders.index');
        Route::patch('/orders/{order}/status', [App\Http\Controllers\OrderController::class, 'updateStatus'])->name('orders.update-status');

        // Category management
        Route::get('/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('categories.index');
        Route::post('/categories', [App\Http\Controllers\AdminController::class, 'storeCategory'])->name('categories.store');
        Route::patch('/categories/{category}', [App\Http\Controllers\AdminController::class, 'updateCategory'])->name('categories.update');
        Route::delete('/categories/{category}', [App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('categories.destroy');
    });
});

require __DIR__.'/auth.php';
