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

Route::get('test',function (){
    return 4;
});

// FROM CLIENT
Route::group(['middleware' => 'auth_client'], function () {

    Route::get('food','ClientController@getFoodAmount');
    Route::get('water','ClientController@getWaterAmount');

    Route::get('food/current','ClientController@getCurrentFood');
    Route::get('water/current','ClientController@getCurrentWater');

    Route::post('food','ClientController@addFood');
    Route::post('water','ClientController@addWater');

});

// FROM CLIENT
Route::group(['middleware' => 'tokenize'], function () {

    Route::get('auth', 'TokenController@index');

});

// FROM UNIT
Route::group(['middleware' => 'auth_unit'], function () {

    Route::post('status', 'UnitController@status');


});






