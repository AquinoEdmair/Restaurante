<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('categorias', 'CategoriasController');
    Route::resource('productos', 'ProductosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('mesas', 'MesasController');
    Route::get('servicios', 'AdminController@verMesas');
});

Route::get('obtieneMesas', 'AdminController@obtieneMesas');
Route::post('actualizaMesa', 'AdminController@actualizaMesa');
Route::get('obtieneCategorias', 'AdminController@obtieneCategorias');
Route::get('nuevosPedidosmesa/{id}', 'AdminController@nuevosPedidosmesa');
Route::get('pedidosMesa/{id}', 'AdminController@pedidosMesa');

