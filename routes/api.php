<?php

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

Route::get('/apartments', 'ApartmentController@getAllApartments');
Route::get('/apartments/{id}', 'ApartmentController@getApartment');

Route::post('/apartments', 'ApartmentController@addApartment');
Route::post('/apartments/{id}', 'ApartmentController@updateApartment');