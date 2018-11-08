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

use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('proyecto', 'ProyectosController');

Route::resource('Facultades', 'FacultadesController');

Route::resource('Carreras', 'CarrerasController');

Route::resource('Archivo', 'ArchivoController');

Route::resource('Universidad', 'UniversidadController');

Route::resource('Socio', 'SocioController');

Route::resource('Curso', 'CursoController');

Route::resource('Chart', 'ChartController');

Route::get('proyecto/{id}/complete', 'ProyectosController@complete');

Route::post('proyecto/{id}/guardar', 'ProyectosController@completar');

// Route::get('/proyecto/listado', 'ProyectosController@listado');

Route::get('Archivo/{id}/download', 'ArchivoController@download');

Route::get('/posts', 'PostsController@index');

Route::get('/posts/{id}','PostsController@show');

//API CLientes

Route::get('/clients', 'ClientsController@index');

Route::get('/clients/{id}','ClientsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);

Route::get('admin/users/{id}/edituser', 'Admin\UsersController@edituser');

Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);


