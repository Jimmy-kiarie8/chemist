<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Access\Response;

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
Route::get('testS', function () {
    // Add folder path here instead of storing in the database.
    $path = storage_path('storage/public/test/1544088453apple.png');

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
Route::resource('products', 'ProductController');
Route::resource('prescriptions', 'PrescriptionController');

Route::get('/chemist', 'HomeController@chemist')->name('chemistHome')->middleware('verified');

Route::get('/getsP', 'SliderController@getsP')->name('getsP');
Route::get('/getTP', 'SliderController@getTP')->name('getTP');
Route::get('/getTPN', 'SliderController@getTPN')->name('getTPN');
Route::get('/headerPro', 'SliderController@headerPro')->name('headerPro');

Route::get('/bestSellF', 'SliderController@bestSellF')->name('bestSellF');
Route::get('/bestSellA', 'SliderController@bestSellA')->name('bestSellA');
Route::get('/featuredF', 'SliderController@featuredF')->name('featuredF');
Route::get('/featuredA', 'SliderController@featuredA')->name('featuredA');
Route::get('/newProF', 'SliderController@newProF')->name('newProF');
Route::get('/newProA', 'SliderController@newProA')->name('newProA');

Route::post('/cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/getCart', 'CartController@getCart')->name('getCart');
Route::post('/subToCart/{id}', 'CartController@subToCart')->name('subToCart');
Route::post('/cartAdd/{id}', 'CartController@cartAdd')->name('cartAdd');

Route::get('/getProducts', 'ProductController@getProducts')->name('getProducts');
Route::post('/proImg/{id}', 'ProductController@proImg')->name('proImg');
Route::get('/featured', 'ProductController@featured')->name('featured');
Route::get('/bestSell', 'ProductController@bestSell')->name('bestSell');
Route::get('/newProduct', 'ProductController@newProduct')->name('newProduct');

Route::post('/filterProduct/{id}', 'FilterController@filterProduct')->name('filterProduct');
Route::post('/filterItem', 'FilterController@filterItem')->name('filterItem');

Route::post('/preImg/{id}', 'PrescriptionController@preImg')->name('preImg');


Route::post('/Notyshpments/{id}', 'NotificationController@Notyshpments')->name('Notyshpments');
Route::post('/read', 'NotificationController@read')->name('read');
Route::get('/Chattynoty', 'NotificationController@Chattynoty')->name('Chattynoty');
Route::get('/notifications', 'NotificationController@notifications')->name('notifications');


Route::resource('products', 'ProductController');
Route::resource('brands', 'BrandController');
Route::resource('categories', 'CategoryController');
Route::resource('menus', 'MenuController');
Auth::routes(['verify' => true]);




// Auth::routes();
// Route::group(['middleware' => ['verified']], function () {
Route::group(['middleware' => ['auth']], function () {
    Route::get('/paypal', function () {
        return view('paypal.createPay');
    });
    Route::get('/getUsersCount', 'UserController@getUsersCount')->name('getUsersCount');
    Route::get('execute-payment', 'PaymentController@execute')->name('execute');
    Route::post('createpayment', 'PaymentController@create')->name('create');
    Route::resource('orders', 'OrderController');
    Route::resource('subcategories', 'SupCategoryController');

    Route::post('/StatusItem/{id}', 'ProductController@StatusItem')->name('StatusItem');

    Route::get('/admin', 'HomeController@admin')->name('admin');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/filterItems', 'FilterController@filterItems')->name('filterItems');

    Route::get('/pay', 'OrderController@pay')->name('pay');


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
});
// });