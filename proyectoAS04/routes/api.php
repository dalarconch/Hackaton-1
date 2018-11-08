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

Route::get('/universidad/{id}/facultad', 'FacultadesController@byuniversidad');
Route::get('/facultad/{id}/carreras', 'CarrerasController@byfacultad');

// Route::get('/clients', 'ClientsController@index');

// Route::get('/clients/{id}','ClientsController@show');

