<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PRODUCTS
    Route::get('/products', [ProductController::class, 'index'])->name(('products'));
    Route::get('/products/add', [ProductController::class, 'create'])->name(('products.create'));
    Route::post('/products/add', [ProductController::class, 'store'])->name(('products.store'));;
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name(('products.edit'));
    Route::put('/products/{id}/edit', [ProductController::class, 'update'])->name(('products.update'));
    Route::get('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    // BRANDS
    Route::get('/brands', [BrandController::class, 'index'])->name(('brands.index'));
    Route::get('/brands/add', [BrandController::class, 'create'])->name(('brands.create'));
    Route::delete('/brands', [BrandController::class, 'destroy'])->name(('brands.destroy'));
    Route::post('/brands/add', [BrandController::class, 'store'])->name(('brands.store'));
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name(('brands.edit'));
    Route::put('/brands/{id}/edit', [BrandController::class, 'update'])->name(('brands.update'));
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');




    // ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name(('orders'));

    // CATEGORIES
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});
