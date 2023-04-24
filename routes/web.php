<?php

use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\BaivietController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientRegisterController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseDetailsController;
use App\Http\Controllers\WarehouseInvoicesController;
use App\Models\comments;
use App\Models\Order;
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

Route::get('/blogPage',[HomePageController::class, 'indexBlogPage']);
Route::get('/blogDetailPage/{id}',[HomePageController::class, 'indexBlogDetailPage']);


Route::get('/indexHomePage',[HomePageController::class, 'indexHomePage']);
Route::get('/detailProduct/{id}',[HomePageController::class, 'viewDetailProduct']);
Route::get('/category/{id}',[HomePageController::class, 'viewCategory']);
Route::post('/search',[HomePageController::class, 'searchHomePage']);

Route::get('/indexCart',[OrderDetailController::class, 'indexCart']);
Route::get('/cart/data',[OrderDetailController::class, 'dataCart']);
Route::post('/add-to-cart',[OrderDetailController::class, 'addToCart']);
Route::post('/add-to-cart-update',[OrderDetailController::class, 'addToCartUpdate']);
Route::post('/remove-cart',[OrderDetailController::class, 'removeCart']);
Route::get('/create-bill',[OrderController::class, 'store']);
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::post('/add-quantity-cart',[OrderDetailController::class, 'addQuantityCart']);
Route::post('/minus-quantity-cart',[OrderDetailController::class, 'minusQuantityCart']);


Route::get('/indexAdminRegister',[AdminRegisterController::class, 'indexAdminRegister']);
Route::post('/createAdminAccount',[AdminRegisterController::class, 'createAdminAccount']);
Route::get('/recieveAdmin',[AdminRegisterController::class, 'recieveAdmin']);
Route::post('/updateAdmin',[AdminRegisterController::class, 'updateAdmin']);
Route::post('/removeAdmin',[AdminRegisterController::class, 'removeAdmin']);
Route::get('/loginAdmin',[AdminRegisterController::class, 'loginAdmin']);
Route::get('/logoutAdmin',[AdminRegisterController::class, 'logoutAdmin']);
Route::post('/actionLogin',[AdminRegisterController::class, 'actionLogin']);



Route::get('/indexClientRegister',[ClientRegisterController::class, 'indexClientRegister']);
Route::post('/createClientAccount',[ClientRegisterController::class, 'createClientAccount']);
Route::get('/loginClient',[ClientRegisterController::class, 'loginClient']);
Route::post('/actionClientLogin',[ClientRegisterController::class, 'actionClientLogin']);
Route::get('/logoutClient',[ClientRegisterController::class, 'logoutClient']);
Route::post('/createContact',[ClientRegisterController::class, 'createContact']);
Route::get('/getContactPage',[ClientRegisterController::class, 'contactPage']);
Route::get('/active/{hash}',[ClientRegisterController::class, 'active']);

Route::get('/my-information',[ClientRegisterController::class, 'viewInfor']);
Route::get('/my-information/data',[ClientRegisterController::class, 'getDataInfor']);
Route::post('/update-my-information',[ClientRegisterController::class, 'updateInfor']);
Route::get('/update-password',[ClientRegisterController::class, 'viewUpdatePass']);
Route::post('/update-password',[ClientRegisterController::class, 'updatePass']);
Route::get('/history-transaction',[ClientRegisterController::class, 'viewTransaction']);



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
        Route::post('/searchProduct',[ProductController::class, 'searchProduct']);
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
    Route::group(['prefix' => '/configuration'], function() {
        Route::get('/',[ConfigController::class, 'index']);
        Route::post('/',[ConfigController::class, 'update']);
    });
    Route::group(['prefix' => '/client'], function() {
        Route::get('/userManagement',[AdminRegisterController::class, 'userManagement']); //User Management
        Route::get('/userActive/{id}',[AdminRegisterController::class, 'userActive']);
        Route::get('/userBlocked/{id}',[AdminRegisterController::class, 'userBlocked']);
        Route::get('/userDelete/{id}',[AdminRegisterController::class, 'userDelete']);
        Route::get('/loadUser',[AdminRegisterController::class, 'loadUser']);
        Route::post('/searchEmail',[AdminRegisterController::class, 'searchEmail']);

        Route::get('/contactManagement',[AdminRegisterController::class, 'contactManagement']);
        Route::get('/loadContact',[AdminRegisterController::class, 'loadContact']);
        Route::get('/contactDelete/{id}',[AdminRegisterController::class, 'contactDelete']);

    });
});





Route::get('/adminBlog',[BaivietController::class, 'adminBlogIndex']);
Route::post('/test/baiviet',[BaivietController::class, 'create']); //tạo baì viết
Route::get('/test/showbaiviet/{id_bai_viet}',[BaivietController::class, 'indexBaiviet']);
Route::get('/test/showallbaiviet',[BaivietController::class, 'indexShowallbaiViet']);
Route::get('/test/deleteallbaiviet/{id}',[BaivietController::class, 'DeleteAllBaiViet']);



// Route::get('/test/showcomment/{id_bai_viet}',[BaivietController::class, 'showbaiviet']);

Route::post('/test/cmt/',[CommentsController::class, 'taocmt']); //tạo cmt
Route::get('/deleteComment/{id}',[CommentsController::class, 'xoaCmt']); //xoa cmt
Route::post('/testcmt/{id}',[CommentsController::class, 'editCmt']);
Route::get('/get/{id}',[CommentsController::class, 'getid']);

Route::get('/latestPost',[BaivietController::class, 'latestPost']);





// Route::get('/showcmt/{id_bai_viet}',[BaivietController::class, 'taocmt']); //tạo cmt






