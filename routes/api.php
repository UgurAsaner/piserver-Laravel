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


// FROM CLIENT

Route::get('food', 'TestController@lastFoodAmount');



// FROM PERFORM UNIT

Route::get('unit/auth', 'TestController@index');
Route::post('unit/amounts', 'TestController@amounts');


