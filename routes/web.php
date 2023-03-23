<?php

use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientRegisterController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseDetailsController;
use App\Http\Controllers\WarehouseInvoicesController;
use App\Models\WarehouseInvoices;
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
Route::get('/indexHomePage',[ClientRegisterController::class, 'indexHomePage']);
Route::get('/indexCart',[ClientRegisterController::class, 'indexCart']);

Route::get('/indexAdminRegister',[AdminRegisterController::class, 'indexAdminRegister']);
Route::post('/createAdminAccount',[AdminRegisterController::class, 'createAdminAccount']);
Route::get('/recieveAdmin',[AdminRegisterController::class, 'recieveAdmin']);
Route::post('/updateAdmin',[AdminRegisterController::class, 'updateAdmin']);
Route::post('/removeAdmin',[AdminRegisterController::class, 'removeAdmin']);
Route::get('/loginAdmin',[AdminRegisterController::class, 'loginAdmin']);
Route::post('/actionLogin',[AdminRegisterController::class, 'actionLogin']);



Route::get('/indexClientRegister',[ClientRegisterController::class, 'indexClientRegister']);
Route::post('/createClientAccount',[ClientRegisterController::class, 'createClientAccount']);
Route::get('/loginClient',[ClientRegisterController::class, 'loginClient']);
Route::post('/actionClientLogin',[ClientRegisterController::class, 'actionClientLogin']);
Route::get('/logoutClient',[ClientRegisterController::class, 'logoutClient']);


Route::group(['prefix' => 'admin', 'middleware' => 'AdminMiddleWare'], function() {
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
        Route::get('/receiveCategoryData',[ProductController::class, 'receiveCategoryData']);
        Route::post('/updateProductData',[ProductController::class, 'updateProductData']);
        Route::post('/removeProductData',[ProductController::class, 'removeProductData']);
        Route::post('/switchProductStatus',[ProductController::class, 'switchProductStatus']);
    });
    Route::group(['prefix' => 'ingredient'], function() {
        Route::get('/indexIngredient',[IngredientController::class, 'indexIngredient']);
        Route::post('/indexIngredient',[IngredientController::class, 'ingredientStore']);
        Route::get('/recieveIngredient',[IngredientController::class, 'recieveIngredient']);
        Route::post('/updateIngredient',[IngredientController::class, 'updateIngredient']);
        Route::post('/removeIngredient',[IngredientController::class, 'removeIngredient']);
        Route::post('/switchIngredientStatus',[IngredientController::class, 'switchIngredientStatus']);
    });
    Route::group(['prefix' => 'warehouse-invoice'], function() {
        Route::get('/indexWarehouseInvoice',[WarehouseInvoicesController::class, 'indexWarehouseInvoice']);
        Route::get('/dataWarehouseInvoice',[WarehouseInvoicesController::class, 'dataWarehouseInvoice']);
        Route::get('/dataDetailWarehouseInvoice/{id}',[WarehouseInvoicesController::class, 'dataDetailWarehouseInvoice']);
        Route::post('/switchInvoiceStatus',[WarehouseInvoicesController::class, 'switchInvoiceStatus']);

    });
    Route::group(['prefix' => 'warehouse-detail'], function() {
        Route::get('/indexWarehouseDetail',[WarehouseDetailsController::class, 'indexWarehouseDetail']);
        Route::get('/recieveProduct',[WarehouseDetailsController::class, 'recieveProduct']);
        Route::get('/recieveDetail',[WarehouseDetailsController::class, 'recieveDetail']);
        Route::post('/createDetail',[WarehouseDetailsController::class, 'createDetail']);
        Route::post('/plusQuantity',[WarehouseDetailsController::class, 'plusQuantity']);
        Route::post('/removeWarehouseDetail',[WarehouseDetailsController::class, 'removeWarehouseDetail']);
        Route::post('/addProductDetail',[WarehouseDetailsController::class, 'addProductDetail']);
    });
});
