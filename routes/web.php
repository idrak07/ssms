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
use App\Http\Middleware\CanEditPost;
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['beforelogin']], function(){
	Route::get('/pharmacylogin','PharmacyLoginController@index')->name('pharmacylogin.index');
	Route::post('/pharmacylogin','PharmacyLoginController@login');
});

Route::group(['middleware'=>['pharmacysess']], function(){
	Route::get('/pharmacyhome','PharmacyHomeController@index')->name('pharmacyhome.index');

	Route::get('/orderforsupply','PharmacyOrderController@index')->name('pharmacyorder.index');
	Route::get('/orderforsupply/search', 'PharmacyOrderController@search')->name('order.search');
	Route::get('/orderforsupply/meddetails', 'PharmacyOrderController@meddetails')->name('order.meddetails');

	Route::get('/pharmacychangepassword','PharmacySettingsController@passwordchange')->name('pharmacysetiings.changepassword');
	Route::post('/pharmacychangepassword','PharmacySettingsController@updatepassword');
});

Route::get('/pharmacylogout', 'PharmacyLogoutController@index');
