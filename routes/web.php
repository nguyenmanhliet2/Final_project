<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/admin/category/index',[CategoryController::class, 'index']);
Route::post('/admin/category/index',[CategoryController::class, 'store']);
Route::get('/admin/category/getData',[CategoryController::class, 'receiveData']);
Route::post('/admin/category/updateData',[CategoryController::class, 'updateData']);
Route::post('/admin/category/removeData',[CategoryController::class, 'removeData']);
