<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/detail/{id}','HomeController@detail');
Route::group(['middleware' => ['checkUser', 'web']], function (){
    Route::get('/doLogout','LoginController@doLogout');
    //Routes untuk profile
    Route::get('profile','UserController@profile');
    Route::get('profile/update/{id}','UserController@updatePage');
    Route::post('profile/doUpdate/{id}','UserController@update');
});


Route::group(['middleware' => ['checkMember', 'web']], function (){
    // Routes mengenai cart
    Route::post('/add-to-cart','CartController@addToCart');
    Route::get('/remove-cart/{id}','CartController@remove');
    Route::get('/cart','CartController@index');

    // Routes untuk checkout dan history
    Route::post('/checkout/{cartId}','TransactionController@store');
    Route::get('/transaction-history','TransactionController@index');
});

Route::group(['middleware' => ['checkAdmin', 'web']], function (){
    //cart admin
    Route::get('/cart-admin','CartController@indexAdmin');
    //transactionhistory admin
    Route::get('admin/transaction-history','TransactionController@indexAdmin');

    //Routes untuk manage flower type
//view all
    Route::get('admin/manage-flower-type','FlowerTypeController@index');
//view insert page
    Route::get('admin/manage-flower-type/insert','FlowerTypeController@insertPage');
//do the insert
    Route::post('admin/manage-flower-type/store','FlowerTypeController@store');
//view update page
    Route::get('admin/manage-flower-type/update/{id}','FlowerTypeController@updatePage');
//do the update
    Route::post('admin/manage-flower-type/doUpdate/{id}','FlowerTypeController@update');
//do the delete
    Route::get('admin/manage-flower-type/delete/{id}','FlowerTypeController@destroy');

    // Routes untuk manage users
    Route::get('admin/manage-user','UserController@index');
    Route::get('admin/manage-user/update/{id}','UserController@updatePage');
    Route::post('admin/manage-user/doUpdate/{id}','UserController@update');
    Route::get('admin/manage-user/delete/{id}','FlowerTypeController@destroy');

    //Routes untuk manage Courier
//view all
    Route::get('admin/manage-courier','CourierController@index');
//view insert page
    Route::get('admin/manage-courier/insert','CourierController@insertPage');
//do the insert
    Route::post('admin/manage-courier/store','CourierController@store');
//view update page
    Route::get('admin/manage-courier/update/{id}','CourierController@updatePage');
//do the update
    Route::post('admin/manage-courier/doUpdate/{id}','CourierController@update');
//do the delete
    Route::get('admin/manage-courier/delete/{id}','CourierController@destroy');

    //Routes untuk manage Flower
//view all
    Route::get('admin/manage-flower','FlowerController@index');
//view insert page
    Route::get('admin/manage-flower/insert','FlowerController@insertPage');
//do the insert
    Route::post('admin/manage-flower/store','FlowerController@store');
//view update page
    Route::get('admin/manage-flower/update/{id}','FlowerController@updatePage');
//do the update
    Route::post('admin/manage-flower/doUpdate/{id}','FlowerController@update');
//do the delete
    Route::get('admin/manage-flower/delete/{id}','FlowerController@destroy');
});

Route::group(['middleware' => ['checkGuest', 'web']], function (){
    //Routes untuk autentikasi
    //kalau sudah login maka tidak boleh mengakses ini lagi
    Route::get('/register','RegisterController@index');
    Route::get('/login','LoginController@index');
    Route::post('/doRegister','RegisterController@doRegister');
    Route::post('/doLogin','LoginController@doLogin');
});
