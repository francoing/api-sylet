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
//Route::get('pedidos/descargar', 'PedidoController@descargar');
//descargar los datos
Route::get('pedidos/export/detalle_orden/', 'PedidoController@exportDetalle');
Route::get('pedidos/export/ordenes/', 'PedidoController@exportOrden');

