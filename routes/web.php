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

//home
Route::get('/', 'MainController@index')->name('home');
//show all categories
Route::get('/categories', 'MainController@categories')->name('categories');

Route::get('/category/{code}', 'MainController@category')->name('category');

Route::get('/product/{id}', 'MainController@product')->name('product');

//cart
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/add/{id}', 'CartController@cartAdd')->name('cart.add');
Route::get('/cart/remove/{id}', 'CartController@cartRemove')->name('cart.remove');
Route::get('/cart/remove-all-product-qty/{id}', 'CartController@cartRemoveAllProdQty')->name('cart.remove.all.prod.qty');
Route::get('/cart/confirm-form', 'CartController@cartConfirmForm')->name('cart.cartConfirmForm');
Route::post('/cart/confirm', 'CartController@cartConfirm')->name('cart.confirm');

// Route::auth([

// ]);
