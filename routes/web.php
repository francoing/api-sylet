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

// Exportar los datos a documentos excel
Route::get('pedidos/export/detalle_orden/', 'PedidoController@exportDetalle');
Route::get('pedidos/export/ordenes/', 'PedidoController@exportOrden');
Route::get('pedidos/export/ordenesdetallesorden/', 'PedidoController@exportOrdenDetalle');


Route::middleware(['auth'])->group(function () {
   //Route::get('pedidos/descargar', 'PedidoController@descargar');
//descargar los datos




// vistas de almacen para categorias
Route::get('escritorioalmacen/categoria/index/', 'LineaController@indexWeb');
Route::get('escritorioalmacen/categoria/create/', 'LineaController@create');
Route::post('escritorioalmacen/categoria/', 'LineaController@store');
Route::get('escritorioalmacen/categoria/edit/{id}', 'LineaController@edit');
Route::post('escritorioalmacen/categoria/edit/{id}', 'LineaController@update');
Route::delete('escritorioalmacen/categoria/{id}', 'LineaController@delete');



// Vista de producto
Route::get('escritorioalmacen/producto/index/', 'ProductoController@indexWeb');
Route::get('escritorioalmacen/producto/create/', 'ProductoController@create');
Route::post('escritorioalmacen/producto/', 'ProductoController@store');
Route::delete('escritorioalmacen/producto/{id}', 'ProductoController@delete');
Route::get('escritorioalmacen/producto/edit/{id}', 'ProductoController@edit');
Route::post('escritorioalmacen/producto/edit/{id}', 'ProductoController@update');


// Vista de usuarios
Route::get('escritorioalmacen/usuario/index/', 'LoginController@index');
Route::get('escritorioalmacen/usuario/create', 'LoginController@create');
Route::post('escritorioalmacen/usuario/', 'LoginController@storeWeb');
Route::delete('escritorioalmacen/usuario/{id}', 'LoginController@delete');



});


Route::get('/logout','Auth\LoginController@logout');
Auth::routes();

