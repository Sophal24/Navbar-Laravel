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


// Route::get('/', function(){
// 	return view('menu');
// });

// Route::get('/', function(){
// 	return view('weather');
// });


// Route::get('/user', function(){
// 	return view('user');
// });

// Route::get('/adminlog', function(){
// 	return view('adminlog');
// });

// Route::get('/post', function(){
// 	return view('post');
// });

// ====================================

Route::get('/myname','Controller@name');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('ok',function(){
	return "ok";
});


Route::get('/weather','HomeController@weather')->name('weather');
Route::get('/user','HomeController@user')->name('user');
Route::get('/adminlog','HomeController@adminlog')->name('adminlog');
Route::get('/post','HomeController@post')->name('post');
Route::get('/weatherhistory','HomeController@weatherhistory')->name('weatherhistory');

//Route::get('/weatherhistory','HomeController@weatherhistory')->name('weatherhistory');


