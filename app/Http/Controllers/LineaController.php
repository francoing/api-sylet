<?php

namespace App\Http\Controllers;
use DB;
use App\linea;

use Illuminate\Http\Request;

class LineaController extends Controller
{
    
    public function index() 
    {
        $query=DB::select('SELECT * FROM `lineas`');

        $respuesta = Array(
            'error'=> FALSE,
            'lineas'=>$query
             
        );
       return $respuesta;
    }
}
