<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/list', [ProductController::class, 'getProduct']);
Route::post('/product/add', [ProductController::class, 'createProduct']);
Route::put('/products/update/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct']);
