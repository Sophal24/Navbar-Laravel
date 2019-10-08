<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('savesub','Controller\subscriberController@savesub');


Route::get('saveweather','Controller\weatherController@saveweather');


// Route::get('sendsms', function(){
// 	return "sd";
// });
// Route::get('sendsms','Controller\weatherController@sendsms');
Route::get('sendsms','Controller\weatherController@send');

Route::get('testfixie','Controller\weatherController@testfixie');