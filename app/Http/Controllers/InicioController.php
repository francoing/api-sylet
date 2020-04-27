<?php

namespace App\Http\Controllers;
use DB;
use App\Inicio;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //https://almacen-api.herokuapp.com/inicio?correo=franco.montti.19@gmail.com&contrasena=franco20
    public function store(Request $request)
    {
        $correo = $request->correo;
        $contrasena = $request->contrasena;
       // $id_usuario= $request ->id;
        $usuario = DB::table('login')
        ->where('correo' , $correo)
        ->where('contrasena',$contrasena)
        ->first();
        
        if ($usuario == null){
            $respuesta = array('error' => TRUE,
                                'mensaje'=>'Usuario y/o contrasena no valido' );

            
        }else{
            $token = str_random(40);
            //$usuario= $id_usuario->get('id');
            $id_usuario = DB::table('login')->where('correo', $correo)->value('id');
            $usuario = DB::table('login')
            ->where('id', $id_usuario)
            ->update(['token'=>$token]) ;
            $respuesta = array('error' => FALSE,
                                'mensaje'=>'Succes',
                                'id_usuario'=> $id_usuario,
                                 'token' => $token,
                                );
           
        }

         return $respuesta;
    }
   
}
