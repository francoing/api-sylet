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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth'])->group(function () {
   //Route::get('pedidos/descargar', 'PedidoController@descargar');
//descargar los datos
Route::get('pedidos/export/detalle_orden/', 'PedidoController@exportDetalle');
Route::get('pedidos/export/ordenes/', 'PedidoController@exportOrden');



// vistas de almacen para categorias

Route::get('escritorioalmacen/categoria/index/', 'LineaController@indexWeb');
Route::get('escritorioalmacen/categoria/create/', 'LineaController@create');
Route::post('escritorioalmacen/categoria/', 'LineaController@store');

// Vista de producto
Route::get('escritorioalmacen/producto/index/', 'ProductoController@indexWeb');
Route::get('escritorioalmacen/producto/create/', 'ProductoController@create');
Route::post('escritorioalmacen/producto/', 'ProductoController@store');
});


Route::get('/logout','Auth\LoginController@logout');
Auth::routes();

