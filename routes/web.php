<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'category'], function() {
        Route::get('/index',[CategoryController::class, 'index']);
        Route::post('/index',[CategoryController::class, 'store']);
        Route::get('/getData',[CategoryController::class, 'receiveData']);
        Route::post('/updateData',[CategoryController::class, 'updateData']);
        Route::post('/removeData',[CategoryController::class, 'removeData']);
        Route::post('/switchStatus',[CategoryController::class, 'switchStatus']);
    });
    Route::group(['prefix' => 'product'], function() {
        Route::get('/indexNewProduct',[ProductController::class, 'indexNewProduct']);
        Route::post('/indexNewProduct',[ProductController::class, 'productStore']);
        Route::get('/receiveProductData',[ProductController::class, 'receiveProductData']);
        // Route::post('/updateData',[ProductController::class, 'updateData']);
        // Route::post('/removeData',[ProductController::class, 'removeData']);
        // Route::post('/switchStatus',[ProductController::class, 'switchStatus']);
    });
});
