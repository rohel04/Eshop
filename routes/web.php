<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\frontend\WishListController;

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


Route::get('/',[FrontController::class,'index']);
Route::get('/categories_front',[FrontController::class,'category']);
Route::get('/view-category/{slug}',[FrontController::class,'view_category']);
Route::get('/category/{cate_slug}/{prod_slug}',[FrontController::class,'view_products']);

Auth::routes();

Route::get('/home', [FrontController::class,'index'])->name('home');
Route::post('/add-to-cart',[CartController::class,'addproducts']);

Route::get('/product-list',[FrontController::class,'search_product']);
Route::post('/searchproduct',[FrontController::class,'product_page']);


Route::middleware(['auth'])->group(function(){
    Route::get('/cart',[CartController::class,'viewcart']);
    Route::post('/delete-cart-item',[CartController::class,'delete']);
    Route::post('/update-cart',[CartController::class,'updateCart']);
    Route::get('/checkout',[CheckoutController::class,'index']);
    Route::post('/place-order',[CheckoutController::class,'placeorder']);
    Route::get('/load-cart-data',[CartController::class,'cartcount']);
    Route::get('/my-orders',[UserController::class,'index']);
    Route::get('/view-orders/{id}',[UserController::class,'view']);

    Route::get('orders',[OrderController::class,'index']);
    Route::get('admin/view-orders/{id}',[OrderController::class,'view']);
    Route::put('update-order/{id}',[OrderController::class,'update']);
    Route::get('orders-history',[OrderController::class,'history']);

    Route::get('users',[DashboardController::class,'index']);
    Route::get('admin/view-users/{id}',[DashboardController::class,'view']);

    Route::get('wishlist',[WishListController::class,'index']);

    Route::post('add-rating',[RatingController::class,'add']);
    Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
    Route::post('add-review',[ReviewController::class,'review']);
    Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);
    Route::put('update-review',[ReviewController::class,'update']);

    


    

});

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', 'Admin\FrontendController@index');

    //-------Category-----------
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}','Admin\CategoryController@edit');
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);

    //-------Products-------------
    Route::get('products',[ProductController::class,'index']);
    Route::get('add-products',[ProductController::class,'add']);
    Route::post('insert-products',[ProductController::class,'insert']);
    Route::get('edit-products/{id}',[ProductController::class,'edit']);
    Route::put('update-products/{id}',[ProductController::class,'update']);
    Route::get('delete-products/{id}',[ProductController::class,'destroy']);

 
 });
