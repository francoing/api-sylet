<?php

namespace App\Http\Controllers;
use DB;
use App\producto;
use Illuminate\Support\Facades\Input;
// use File;

use Illuminate\Http\Request;

class ProductoController extends Controller
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
 
     //ruta:http://127.0.0.1:8000/productos/por_tipo/1
     public function por_tipo($tipo=0,$pagina=0)
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


    // ------- WEB-----------------------------------------------------------------------------------------------------

    // public function __construct()
    // {

    //     $this->middleware('auth');
    // }

    public function indexWeb()
    {
        $productos=DB::table('productos as p')
            ->join('lineas as l','p.linea_id','=','l.id')
            ->select('p.codigo','p.producto','p.precio_compra','l.linea as categoria','p.imagen')
            ->paginate(10);
        // $productos = DB::table('productos')->paginate(15);
        // $lineas = DB::table('lineas')->get();

        return view('escritorioalmacen.producto.index', ['productos' => $productos]);
    }

    public function create()
    {
        $lineas = DB::table('lineas')->get();
        return view('escritorioalmacen.producto.create',['lineas'=>$lineas]);
    }

    public function store(Request $request)
    {

        $producto = new producto;
        $producto->codigo = $request->input('codigo');
        $producto->linea_id= $request->linea_id;
        // $producto->linea = $request->input('linea');
        // $producto->linea=$request->linea;
         $producto->producto=$request->input('producto');
         $producto->proveedor = $request->input('proveedor');
         $producto->descripcion = $request->input('descripcion');
         $producto->precio_compra=$request->input('precio_compra');

        //  if ($producto->linea =="") {  
        //     $producto->linea = 'General';
        //  }

         if(Input::hasFile('imagen'))
        {
            $file=Input::file('imagen');
            $nomImg=uniqid().$file->getClientOriginalName();
           // guardo la imagen y le asigno un id unico para que no haya conflictos con la imagen
           $file->move(public_path().'/img/productos',$nomImg);
           $producto->imagen=$nomImg;


        }

        $producto->save();
        
        return redirect('escritorioalmacen/producto/index');
    }
 
}
