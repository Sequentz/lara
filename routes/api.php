<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandApiController;
use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    // PRODUCTS

    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{product}', [ProductApiController::class, 'show']);


    // BRANDS
    Route::get('/brands', [BrandApiController::class, 'index']);
    Route::get('/brands/{brand}', [BrandApiController::class, 'show']);
    Route::get('/brands/{name}/products', [BrandApiController::class, 'getProductsByBrand']);

    //CATEGORIES

    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/categories/{category}', [CategoryApiController::class, 'show']);
    Route::get('/categories/{name}/products', [BrandApiController::class, 'getProductsByCategory']);
});
