<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
