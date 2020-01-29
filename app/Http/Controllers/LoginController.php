<?php

namespace App\Http\Controllers;
use DB;
use App\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //https://almacen-api.herokuapp.com/login?correo=franco.montti.19@gmail.com&contrasena=franco20
    public function store(Request $request)
    {
        $correo = $request->correo;
        $contrasena = $request->contrasena;
        $id_usuario= $request ->id;
        $usuario = DB::table('login')
        ->where('correo' , $correo)
        ->where('contrasena',$contrasena)
        ->first();
        
        if ($usuario == null){
            $respuesta = array('error' => TRUE,
                                'mensaje'=>'Usuario y/o contrasena no valido' );

            
        }else{
            $token = str_random(40);
            $usuario = DB::table('login')
            ->where('id', $usuario->id)
            ->update(['token'=>$token]) ;
            $respuesta = array('error' => FALSE,
                                'mensaje'=>'Succes',
                                //'id_usuario'=> $usuario->id,
                                 'token' => $token,
                                );
           
        }

         return $respuesta;
    }
}
