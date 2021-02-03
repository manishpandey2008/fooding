<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HController;
use App\Http\Controllers\DashboardController as DBController;
use App\Http\Controllers\CustomerController as CController;

use App\Http\Controllers\BloohashController as BController;
use App\Http\Controllers\BloohashOprationController as BOController;


Route::group(['prefix'=>'/foodshala','middleware'=>['throttle:only_100_times']],function(){
	Route::GET('/',[HController::class, 'Index'])->name('index');
	Route::GET('/signup',[HController::class, 'Signup'])->name('Signup');
	Route::GET('/login',[HController::class, 'Login'])->name('login');
	Route::POST('/login',[HController::class, 'FinalLogin'])->name('final_login');
	Route::GET('{id}/otp/verification',[HController::class, 'Otp'])->name('otp_verification');
	Route::POST('{id}/otp/verification',[HController::class, 'FinalSignup'])->name('final_signup');
	Route::POST('otpverification',[HController::class, 'OtpVerification'])->name('otpverification');
	Route::POST('setPassword',[HController::class, 'SetPassword'])->name('set_password');
	Route::POST('livesearch',[HController::class, 'LiveSearch'])->name('liveSearch');
	Route::GET('/profile',[HController::class, 'Profile'])->name('profile');
	Route::GET('/password/forget',[HController::class, 'Forget'])->name('forget');
	Route::POST('/verify/number',[HController::class, 'NumberVerification'])->name('numberverification');
});

Route::group(['prefix'=>'/foodshala','middleware'=>['check','restId','throttle:only_100_times']],function(){
	Route::GET('/restaurant/dashboard',[DBController::class, 'RestaurantDashboard'])->name('dashboard');
	Route::POST('/restaurant/dashboard',[DBController::class, 'AddProduct'])->name('addProduct');
	Route::POST('productnamechecker',[DBController::class, 'ProCheck'])->name('proCheck');

	Route::POST('editproduct',[DBController::class, 'EditProduct'])->name('editproduct');
	Route::POST('getproductdata',[DBController::class, 'GetProductData'])->name('getproduct');
	Route::GET('order/details',[DBController::class, 'OrderDetails'])->name('orderdetails');
	Route::POST('order/conformation',[DBController::class, 'OrderConf'])->name('orderconf');
	Route::POST('stockcontrol',[DBController::class, 'StockControl'])->name('stockContol');
});


Route::group(['prefix'=>'/foodshala','middleware'=>['check','custId','throttle:only_100_times']],function(){
	Route::POST('addtocart',[CController::class, 'AddToCart'])->name('addToCart');
	Route::GET('/cart',[CController::class, 'Cart'])->name('cart');
	Route::GET('cartdelet/{id}',[CController::class, 'DeleteFromCart'])->name('deleteFromCart');

	Route::GET('final/order',[CController::class, 'FinalOrder'])->name('finalorder');
	Route::GET('order/list',[CController::class, 'OrderList'])->name('orderlist');
	Route::GET('order/pdf/{id}',[CController::class, 'OrderPdf'])->name('orderpdf');
});

Route::GET('/logout',[HController::class, 'Logout'])->name('logout');




////////////////////////////////// Work For Bloohash //////////////////////////////

Route::group(['prefix'=>'/bloohash','middleware'=>['throttle:only_100_times']],function(){
	Route::GET('/',[BController::class, 'Home'])->name('b_index');
	Route::GET('/signup',[BController::class, 'Signup'])->name('b_signup');
	Route::GET('/user/data',[BController::class, 'UserData'])->name('b_user_data')->middleware('b.check');
	Route::GET('/login',[BController::class, 'Login'])->name('b_login');
	Route::GET('/admin/home',[BController::class, 'AdminHome'])->name('b_admin_home')->middleware(['b.check','b.adminCheck']);
	Route::GET('/user/home',[BController::class, 'UserHome'])->name('b_user_home')->middleware(['b.check','b.userCheck']);
	Route::GET('/profile/{id}',[BController::class, 'UserProfile'])->name('b_profile')->middleware('b.check');
	Route::GET('/logout',[BController::class, 'Logout'])->name('b_logout');

	Route::POST('/signup',[BOController::class, 'SignUp'])->name('bp_signup');
	Route::POST('/user/data',[BOController::class, 'UserData'])->name('bp_user_data');
	Route::POST('/login',[BOController::class, 'Login'])->name('bp_login');

	Route::GET('/status/change/{id}',[BOController::class, 'StatusChange'])->name('bp_status_change')->middleware(['b.check','b.adminCheck']);
});


///////////////////////////////End Work Bloohash//////////////////////////////////
