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

    // ADD PRODUCT
    Route::get('/products/add', [ProductController::class, 'create'])->name(('products.create'));
    Route::post('/products/add', [ProductController::class, 'store'])->name(('products.store'));;

    // EDIT PRODUCT
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name(('products.edit'));
    Route::put('/products/{product}/edit', [ProductController::class, 'update'])->name(('products.update'));

    // VIEW PRODUCT 
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // DELETE PRODUCT
    Route::get('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    // BRANDS
    Route::get('/brands', [BrandController::class, 'index'])->name(('brands'));

    // ADD BRAND
    Route::get('/brands/add', [BrandController::class, 'create'])->name(('brands.create'));
    Route::post('/brands/add', [BrandController::class, 'store'])->name(('brands.store'));


    // EDIT BRAND
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name(('brands.edit'));
    Route::put('/brands/{id}/edit', [BrandController::class, 'update'])->name(('brands.update'));


    // DELETE BRAND
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
    // Route::delete('/brands', [BrandController::class, 'destroy'])->name(('brands.destroy'));




    // ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name(('orders'));

    // CATEGORIES
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    // VIEW CATEGORY
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    // ADD CATEGORY
    Route::get('/categories/add', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/add', [CategoryController::class, 'store'])->name('categories.store');

    // EDIT CATEGORY
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

    // DELETE CATEGORY
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
