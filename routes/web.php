<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Default welcome route
Route::get('/', function () {
    return view('index');
});

// Dashboard route - protected by auth and verified middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes for user profile
Route::middleware('auth')->group(function () {
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');       // List all products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Show form to create product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');        // Store new product
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');       // Show single product
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');  // Show form to edit product
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');   // Update product
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete product
});

// Include authentication routes
require __DIR__.'/auth.php';
