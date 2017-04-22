<?php

use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;

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

// FROM CLIENT
Route::group(['middleware' => 'authorize'], function () {

    Route::get('food','AmountController@getFoodAmount');
    Route::get('water','AmountController@getWaterAmount');

    Route::get('food/current','AmountController@getCurrentFood');
    Route::get('water/current','AmountController@getCurrentWater');

    Route::post('food','AmountController@addFood');
    Route::post('water','AmountController@addWater');

});

// FROM CLIENT
Route::group(['middleware' => 'tokenize'], function () {

    Route::get('auth', 'TokenController@index');

});

// FROM UNIT
Route::group(['middleware' => 'authorize_unit'], function () {

    Route::post('amounts', 'UnitController@amounts');


});






