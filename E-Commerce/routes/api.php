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


Route::group(['prefix' => 'carts/', 'namespace'=>'API'], function () {
    Route::get('/', 'CartController@index')->name('carts');
    Route::post('/store','CartController@store')->name('carts.store');    
    Route::post('/update/{id}','CartController@update')->name('carts.update');    
    Route::post('/delete/{id}','CartController@delete')->name('carts.delete');    
});
