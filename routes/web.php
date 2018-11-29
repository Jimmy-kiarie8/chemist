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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/paypal', function () {
    return view('paypal.createPay');
});

Route::get('execute-payment', 'PaymentController@execute')->name('execute');
Route::post('createpayment', 'PaymentController@create')->name('create');

Auth::routes();
Route::resource('products', 'ProductController');
Route::resource('brands', 'BrandController');
Route::resource('categories', 'CategoryController');
Route::resource('orders', 'OrderController');

Route::get('/chemist', 'HomeController@chemist')->name('chemistHome');
Route::get('/admin', 'HomeController@admin')->name('admin');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/getCart', 'CartController@getCart')->name('getCart');
Route::post('/subToCart/{id}', 'CartController@subToCart')->name('subToCart');

Route::get('/getUsersCount', 'UserController@getUsersCount')->name('getUsersCount');


Route::get('/getsP', 'ProductController@getsP')->name('getsP');
Route::get('/getTP', 'ProductController@getTP')->name('getTP');
Route::get('/getTPN', 'ProductController@getTPN')->name('getTPN');
Route::get('/headerPro', 'ProductController@headerPro')->name('headerPro');
Route::get('/getProducts', 'ProductController@getProducts')->name('getProducts');

Route::post('/proImg/{id}', 'ProductController@proImg')->name('proImg');


Route::post('/filterItem', 'FilterController@filterItem')->name('filterItem');
// Route::get('/filterItem', 'FilterController@filterItem')->name('filterItem');




Route::get('getBranchShipments', 'DashboardController@getBranchShipments')->name('getBranchShipments');
Route::get('getChartOrders', 'DashboardController@getChartOrders')->name('getChartOrders');
Route::get('getBrands', 'DashboardController@getBrands')->name('getBrands');
Route::get('getChartData', 'DashboardController@getChartData')->name('getChartData');
Route::get('getCategories', 'DashboardController@getCategories')->name('getCategories');
Route::get('getOrders', 'DashboardController@getOrders')->name('getOrders');

Route::get('getCountCount', 'DashboardController@getCountCount')->name('getCountCount');
Route::get('getBranchCount', 'DashboardController@getBranchCount')->name('getBranchCount');
Route::get('getChartCount', 'DashboardController@getChartCount')->name('getChartCount');
Route::get('getCountryhipments', 'DashboardController@getCountryhipments')->name('getCountryhipments');
Route::get('getChartCountry', 'DashboardController@getChartCountry')->name('getChartCountry');

Route::get('countDelivered', 'DashboardController@countDelivered')->name('countDelivered');
Route::get('countPending', 'DashboardController@countPending')->name('countPending');
Route::get('countOrders', 'DashboardController@countOrders')->name('countOrders');