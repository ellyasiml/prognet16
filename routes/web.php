<?php

use Illuminate\Support\Facades\Auth;
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
| 1905551055
  1905551070
  1905551105
  1905551108
  1905551068
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home'); #kopituku enak gasi ga si
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout'); #komen lagi

Route::prefix('admin')->group(function (){
    //Dashboard routes
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    //Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    //Logout routes
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Register routes
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    //Reset password routes
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');

    
});
    Route::get('/user/show', 'UserController@showAll');
    Route::get('/user','UserController@index');
    Route::get('/user/detail/{id}', 'UserController@detail');
    Route::get('user/logout', 'UserController@logout');
    Route::get('/user/transaksi-langsung/{id}','UserController@transaksiLangsung');
    
    //CRUD COURIER
    Route::resource('/courier','CourierController');
    //CRUD KATEGORI PRODUK
    Route::resource('/product-category','ControllerProductCategory');
    //CRUD PRODUK
    Route::resource('/product','ControllerProduct');
