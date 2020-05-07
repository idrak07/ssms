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
	Route::get('/login','LoginController@index')->name('login.index');
	Route::post('/login','LoginController@login');
});

Route::group(['middleware'=>['sess']], function(){
	Route::group(['middleware'=>['pharmacysess']], function(){
	Route::get('/pharmacyhome','PharmacyHomeController@index')->name('pharmacyhome.index');

	Route::get('/orderforsupply','PharmacyOrderController@index')->name('pharmacyorder.index');
	Route::post('/orderforsupply','PharmacyOrderController@processorder');
	Route::get('/orderproceed','PharmacyOrderController@orderlist');
	Route::post('/orderproceed','PharmacyOrderController@proceedorder');
	Route::get('/orderforsupply/search', 'PharmacyOrderController@search')->name('order.search');
	Route::get('/orderforsupply/meddetails', 'PharmacyOrderController@meddetails')->name('order.meddetails');
	Route::get('/pharmacyorderlist','PharmacyOrderController@orderlist')->name('pharmacyorder.orderlist');
	Route::get('/pharmacyorder/details/{oid}','PharmacyOrderController@orderdetails')->name('pharmacyorder.orderdetails');
	Route::get('/pharmacyorder/confirm/{oid}','PharmacyInventoryController@inventoryupdate')->name('pharmacyorder.orderconfirm');
	Route::get('/pharmacyorder/cancel/{oid}','PharmacyOrderController@ordercancel')->name('pharmacyorder.ordercancel');

	Route::get('/prescription/search', 'PharmacyPrescriptionController@search')->name('prescription.search');

	Route::get('/pharmacyinventory','PharmacyInventoryController@index')->name('pharmacyinventory.index');
	Route::get('/pharmacyinventory/unitsearch','PharmacyInventoryController@unitsearch')->name('pharmacyinventoryunit.search');
	Route::get('/pharmacyinventory/itemsearch', 'PharmacyInventoryController@itemsearch')->name('pharmacyinventory.itemsearch');

	Route::post('/purchase','PharmacyPurchaseController@purchase');
	Route::get('/pharmacypurchaselist','PharmacyPurchaseController@purchaselist')->name('pharmacypurchase.purchaselist');
	Route::get('/pharmacypurchase/details/{purchaseid}','PharmacyPurchaseController@purchasedetails')->name('pharmacypurchase.purchasetails');
	Route::get('/pharmacypurchase/search','PharmacyPurchaseController@purchasesearch')->name('pharmacypurchase.search');
	Route::get('/pharmacypurchase/itemsearch','PharmacyPurchaseController@itemsearch')->name('pharmacypurchase.itemsearch');

	Route::get('/pharmacytax','PharmacyTaxController@index')->name('pharmacytax.index');

	Route::get('/pharmacychangepassword','PharmacySettingsController@passwordchange')->name('pharmacysettings.changepassword');
	Route::post('/pharmacychangepassword','PharmacySettingsController@updatepassword');

	});

	Route::group(['middleware'=>['companysess']], function(){
		Route::get('/companyhome','CompanyHomeController@index')->name('companyhome.index');

		Route::get('/companyproductrelease','CompanyProductController@productreleaserequest')->name('company.releaserequest');
		Route::post('/companyproductrelease','CompanyProductController@productreleaserequestsubmit');
		Route::get('/company/genericsearch','CompanyProductController@genericsearch')->name('companygeneric.search');
		Route::get('/companyproduct','CompanyProductController@index')->name('company.product');
		Route::get('/companyproduct/details/{prodid}','CompanyProductController@productdetails')->name('companyproduct.details');
		Route::get('/companyproduct/hide/{prodid}','CompanyProductController@hide')->name('companyproduct.hide');
		Route::get('/companyproduct/unhide/{prodid}','CompanyProductController@unhide')->name('companyproduct.unhide');
		Route::get('/companyproduct/productsearch','CompanyProductController@productsearch')->name('companyproduct/productsearch');

		Route::get('/companypendingorder/details/{orderid}','CompanyOrderController@orderdetails')->name('companyorder.orderdetails');
		Route::post('/companypendingorder/details/{orderid}','CompanyOrderController@orderconfirm');

		Route::get('/companydeliveredorder','CompanyOrderController@deliveredorder')->name('companydeliveredorder.orderlist');
		Route::get('/companydeliveredorder/details/{orderid}','CompanyOrderController@deliveredorderdetails')->name('companydeliveredorder.orderdetails');

		Route::get('/companyinventory','CompanyInventoryController@index')->name('companyinventory.index');
		Route::get('/companyupdateinventory','CompanyInventoryController@addnewbatch')->name('companyinventory.addnewbatch');
		Route::post('/companyupdateinventory','CompanyInventoryController@addnewbatchfinal');
		Route::get('/companyinventoryupdate/search','CompanyInventoryController@updatesearch')->name('companyinventoryupdate.updatesearch');
		Route::get('/companyinventory/itemsearch', 'CompanyInventoryController@itemsearch')->name('companyinventory.itemsearch');
		Route::get('/companyinventory/delete/{id}','CompanyInventoryController@delete')->name('companyinventory.delete');
		
		Route::get('/companytax','CompanyTaxController@index')->name('companytax.index');

		Route::get('/companychangepassword','CompanySettingsController@passwordchange')->name('companysettings.changepassword');
		Route::post('/companychangepassword','CompanySettingsController@updatepassword');

	});
});

Route::get('/logout','LogoutController@index');
