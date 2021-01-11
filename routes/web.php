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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/user')->group( function(){
    Route::get('/home', 'HomeController@index')->name('user.home');
    Route::post('/create-contact', 'HomeController@getContactHome')->name('user.getContactHome');
    Route::get('/prodcut', 'HomeController@getDataProduct')->name('user.product');
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

