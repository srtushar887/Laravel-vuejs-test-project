<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get-category',[\App\Http\Controllers\CategoryController::class,'get_category']);
Route::post('create-category',[\App\Http\Controllers\CategoryController::class,'create_category']);
Route::get('category-edit/{id}',[\App\Http\Controllers\CategoryController::class,'get_signle_cat']);
Route::post('update-category/{id}',[\App\Http\Controllers\CategoryController::class,'update_category']);
Route::post('delete-category/{id}',[\App\Http\Controllers\CategoryController::class,'delete_category']);


Route::get('get-products',[\App\Http\Controllers\ProductsController::class,'get_products']);
Route::post('create-product',[\App\Http\Controllers\ProductsController::class,'create_products']);
Route::get('product-edit/{id}',[\App\Http\Controllers\ProductsController::class,'get_single_product']);
Route::post('update-product/{id}',[\App\Http\Controllers\ProductsController::class,'update_product']);
Route::post('delete-product/{id}',[\App\Http\Controllers\ProductsController::class,'delete_product']);
