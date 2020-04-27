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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/
/*
Route::get('Prueba/busqueda/{termino}', 'PruebaController@show');
Route::get('Prueba/{id}/{pagina}', 'PruebaController@index');
Route::resource('Prueba', 'PruebaController');*/
/*Route::group(['middleware'=>'cors'],function(){


    
});*/
//rutas de producto
Route::get('productos/buscar/{termino}', 'ProductoController@show');
Route::get('productos/todos/{pagina}', 'ProductoController@index');
Route::get('productos/por_tipo/{id}', 'ProductoController@por_tipo');
//imagenes de los productos
Route::get('public/img/productos/{codigo}', 'ImagesController@imagen');

//rutas de Linea o categorias

Route::get('lineas', 'LineaController@index');

//rutas de Login

Route::post('inicio', 'InicioController@store');

//rutas para los pedidos

Route::get('pedidos/obtener_pedidos/{id}/{token}', 'PedidoController@obtener_pedidos');
Route::post('pedidos/realizar_orden/{token}/{id_usuario}', 'PedidoController@realizar_orden');

