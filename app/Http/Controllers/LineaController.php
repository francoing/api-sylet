<?php

namespace App\Http\Controllers;
use DB;
use App\linea;

use Illuminate\Http\Request;

class LineaController extends Controller
{
    //------------------------------ API-------------------------------
    public function index() 
    {
        $query=DB::select('SELECT * FROM `lineas`');

        $respuesta = Array(
            'error'=> FALSE,
            'lineas'=>$query
             
        );
       return $respuesta;
    }

    //------------- WEB--------------------------------------------------------

   
     public function indexWeb(Linea $lineas)
    {
        $lineas = DB::table('lineas')->paginate(15);

        return view('escritorioalmacen.categoria.index', ['lineas' => $lineas]);
    }


    public function create()
    {
        return view('escritorioalmacen.categoria.create');
        
    }

    public function store(Request $request)
    {
        $linea = new linea;
        // $linea ->id =$request->get('id');
        $linea->linea= $request->get('linea');
        $linea->icono = $request->get('icono');
        $linea->save();
        return redirect('escritorioalmacen/categoria/index');

    }

}
