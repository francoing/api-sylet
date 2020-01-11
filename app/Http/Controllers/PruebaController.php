<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prueba;
use DB;

class PruebaController extends Controller
{

    //ruta:http://127.0.0.1:8000/Prueba/2
    public function index($pagina=0)
    {
        $pagina = $pagina *10;
        $query= DB::table('productos')->get();
        $query=DB::select('SELECT * FROM `productos` limit '.$pagina.',10 ');

        $respuesta = Array(
            'error'=> FALSE,
            'productos'=>$query
             
        );
        return $respuesta;
       //$this->response($respuesta);

    }

    //ruta:http://127.0.0.1:8000/Prueba/1/1
    public function por_tipo_get($tipo=0,$pagina=0)
    {

        if ($tipo == 0) {    
            $respuesta = array(
                'error'=> TRUE,
                'mensaje'=>'FALTA EL PARAMETRO DE TIPO'
            );
            $this->response($respuesta,REST_Controller::HTTP_BAD_REQUEST);
            return;
        }

        $pagina = $pagina *10;
        $query=DB::select('SELECT * FROM `productos` where linea_id='.$tipo.' limit '.$pagina.',10 ');

        $respuesta = Array(
            'error'=> FALSE,
            'productos'=>$query
             
        );

        return $respuesta;
        
    }

    //http://127.0.0.1:8000/Prueba/busqueda/ford
    public function show(string $termino = "NO ESPECIFICO")
    {
        $query= DB::select("SELECT * FROM `productos` WHERE producto LIKE '%".$termino."%'");

        $respuesta = Array(
            'error'=> FALSE,
            'termino'=>$termino,
            'productos'=>$query
             
        );
       return $respuesta;
        
    }


}
