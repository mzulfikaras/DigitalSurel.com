<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/user')->group( function(){
    Route::get('/home', 'HomeController@index')->name('user.home');
    Route::post('/create-contact', 'HomeController@getContactHome')->name('user.getContactHome');
    Route::get('/prodcut', 'HomeController@getDataProduct')->name('user.product');
    Route::get('/product-details/{id}', 'HomeController@getShowProduct')->name('user.product.details');
    Route::get('/cart', 'CartController@getCart')->name('user.cart')->middleware('auth');
    Route::post('/cart/store/{id}', 'CartController@getStoreCart')->name('user.cart.store');
    Route::patch('/cart/{id}', 'CartController@updateCart')->name('user.update.cart');
    Route::delete('/cart/delete/{id}', 'CartController@getDeleteCart')->name('user.delete.cart');
    Route::get('/checkout-details','HomeController@getCheckout')->name('user.checkout');
    Route::post('/checkout','HomeController@getStoreCheckout')->name('user.go.checkout');
    Route::get('/invoice', 'HomeController@getInvoice')->name('user.invoice')->middleware('auth');
    Route::get('/contact', 'ContactController@index')->name('user.contact');
});

Route::prefix('/admin')->group( function(){
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/product', 'Admin\ProductController@getDataProduct')->name('admin.product');
    Route::get('/create-product', 'Admin\ProductController@getViewCreate')->name('admin.create.product');
    Route::post('/store-product', 'Admin\ProductController@getStoreProduct')->name('admin.store.product');
    Route::get('/edit-product/{id}/edit','Admin\ProductController@getViewUpdate')->name('admin.edit.product');
    Route::put('/update-product/{id}','Admin\ProductController@getUpdateProduct')->name('admin.update.product');
    Route::delete('/delete-product/{id}','Admin\ProductController@getDeleteProduct')->name('admin.delete.product');
    Route::get('/contact', 'ContactController@getDataContact')->name('admin.contact');
    Route::delete('/delete-contact/{id}', 'ContactController@getDeleteContact')->name('admin.delete.contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
