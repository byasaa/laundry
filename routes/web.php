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
Route::get('/customer/getCustomer', 'CustomerController@getCustomer')->name('customer.getCustomer');

Route::group(['middleware' => ['auth', 'hasRole:admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resources([
        'outlet' => 'OutletController',
        'user' => 'UserController',
        'customer' => 'CustomerController',
        'product' => 'ProductController',
    ]);
});

Route::group(['middleware' => ['auth', 'hasRole:admin,kasir']], function () {
    Route::get('/transaction/export', 'TransactionController@export')->name('transaction.export');
    Route::resource('transaction', 'TransactionController');
});
Route::group(['middleware' => ['auth', 'hasRole:admin,kasir,owner']], function () {
    Route::get('/', 'HomeController@index')->name('web.index');
});

Auth::routes(['register'=> false, 'reset'=>false]);;
