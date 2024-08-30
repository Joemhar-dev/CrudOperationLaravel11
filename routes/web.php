<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

// Handle the form submission
Route::post('products', [ProductController::class, 'store'])->name('products.store');
// Display the edit form
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Handle the update request
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

// Handle the delete request
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

