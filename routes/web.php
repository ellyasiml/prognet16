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
Route::get('/get/provinsi', 'UserController@province');
Route::get('/get/city/{id}', 'UserController@city');
Route::get('/get/ongkir/{a}/{b}/{c}/{d}', 'UserController@getongkir');
Route::get('/get/berat/{id}', 'UserController@getberat');
Route::get('/print/bulanan', 'AdminController@printbulanan');
Route::get('/print/tahunan', 'AdminController@printtahunan');

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
    Route::get('/user/transaksi/{id}', 'UserController@mytransaction');
    Route::get('user/logout', 'UserController@logout');
    Route::get('/user/transaksi-langsung/{id}','UserController@transaksiLangsung');
    Route::post('/buy/now', 'UserController@buynow')->name('post.buynow');
    Route::get('/add/cart/{id}', 'UserController@addcart');
    Route::get('/user/cart/{id}', 'UserController@listcart');
    Route::post('/ubah/jumlah', 'UserController@ubahjumlah')->name('ubahjumlah');
    Route::get('/hapus/cart', 'UserController@hapuscart')->name('hapuscart');

    Route::get('/data/trans/{status}/{id}', 'UserController@datatrans');
    Route::post('/upload/bukti', 'UserController@uploadbukti')->name('upload.bukti');
    Route::post('/post/checkout', 'UserController@checkout')->name('post.checkout');
    Route::get('/data/detail/{id}', 'UserController@getdetail');
    Route::get('/terima/barang/{id}', 'UserController@terimabarang');
    Route::get('/cancel/transaksi/{id}', 'UserController@canceltrans');

    Route::get('/transaction/{param}', 'AdminController@listtrans');
    Route::get('/ubah/status/{param}/{id}', 'AdminController@ubahstatus');
    Route::post('/beri/rating', 'UserController@berirating')->name('beri.rating');

    Route::get('/review', 'AdminController@listreview');

    Route::post('/post/response', 'AdminController@beritanggapan');

    Route::get('/laporan/perbulan', 'AdminController@laporanperbulan');
    Route::get('/laporan/pertahun', 'AdminController@laporanpertahun');

    Route::get('admin/{id}', 'AdminController@adminNotif')->name('admin.notification');
   
    
    Route::middleware('auth:admin')->group(function(){
    //CRUD COURIER
    Route::resource('/courier','CourierController');
    //CRUD KATEGORI PRODUK
    Route::resource('/product-category','ControllerProductCategory');
    //CRUD PRODUK
    Route::resource('/product','ControllerProduct');

    //--Route Untuk Soft Delete pada Admin Product--//
    //route get all data trash product
    Route::get('/product-trash','ControllerProduct@trash');
    //route restore product
    Route::get('/product-restore/{id}', 'ControllerProduct@restore');
    Route::get('/product-restore-all', 'ControllerProduct@restore_all');
    //route hapus permanen
    Route::get('/product-hapus_permanen/{id}', 'ControllerProduct@hapus');
    Route::get('/product-hapus_permanen', 'ControllerProduct@hapus_semua');
  //-- End Route Untuk Soft Delete pada Admin Product --//

  //--Route untuk diskon--//

    Route::get('/discount/{id}','ControllerDiscount@discount');
    Route::post('/discount-store','ControllerDiscount@store');
    Route::put('/discount-update/{id}','ControllerDiscount@update');
    Route::get('/discount-delete/{id}','ControllerDiscount@delete');

    
  //--End route untuk diskon--//

  Route::get('/gambar/{id}','ControllerProduct@editGambar');
  Route::match(['put', 'patch'],'/gambar/{id}/update', 'ControllerProduct@updateGambar');
  });