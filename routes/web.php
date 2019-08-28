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
    return view('index');
});
Route::resource('users','UsersController');
Route::resource('clients','ClientsController');
Route::resource('properties','PropertiesController');
Route::resource('contacts','ContactsController');

/*Registration User Captcha */
// Route::get('user', 'UsersController@myCaptcha')->name('myCaptcha');
Route::post('user', 'UsersController@myCaptchaPost')->name('myCaptcha.post');
Route::get('refresh_captcha', 'UsersController@refreshCaptcha')->name('refresh_captcha');

/*Registration Client Captcha */
// Route::get('clients', 'ClientsController@myCaptcha')->name('myCaptcha');
Route::post('clients', 'ClientsController@myCaptchaOnePost')->name('myCaptchaOne.post');
Route::get('refresh_captcha', 'ClientsController@refreshCaptcha')->name('refresh_captcha');
Route::resource('enquiries','EnquiriesController');
// Route::get('enquiries', 'EnquiryController@index');
// Route::post('enquiries', 'EnquiryController@store');

/**Verify Email */
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

/*Login Captcha */
Route::get('my-captcha', 'HomeController@myCaptchaOne')->name('myCaptchaOne');
Route::post('my-captcha', 'HomeController@myCaptchaLoginPost')->name('myCaptchaLogin.post');
Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');

/*Add Captcha with Registration */
// Route::get('web-register', 'AuthController@webRegister');
// Route::post('web-register', 'AuthController@webRegisterPost');

/**OTP Verification */
Route::get('form', [
	'uses'=>'UsersController@home'
	]);

Route::post('/sendOtp', [
	'middleware' => 'checkSession',
    'uses'=>'UsersController@sendOtp'
]);

Route::post('/verifyOtp', [
	'middleware' => 'checkSession',
	'uses'=>'UsersController@verifyOtp'
]);

/*Phone Verification */
Route::get('/', 'ClientsController@index')->name('home')->middleware('verifiedphone'); 
Route::get('phone/verify', 'PhoneVerificationController@show')->name('phoneverification.notice');
Route::post('phone/verify', 'PhoneVerificationController@verify')->name('phoneverification.verify');
Route::post('build-twiml/{code}', 'PhoneVerificationController@buildTwiMl')->name('phoneverification.build'); 

/*Search */
Route::get("my-search","HomeController@mySearch");
Route::get("facility-search","HomeController@facilitySearch");

/*Select */
Route::get('myform1', 'PropertiesController@myform');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'PropertiesController@selectAjax']);

Route::get('myform', 'AjaxDemoController@myform');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'AjaxDemoController@selectAjax']);

/* Login */
// Route::get('/login', 'SessionsController@create');
// Route::post('/login', 'SessionsController@store');
// Route::get('/logout', 'SessionsController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
