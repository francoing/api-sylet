<?php

namespace App\Http\Controllers;
use DB;
use App\pedido;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function realizar_orden($token,$id_usuario,Request $request)
    {

        // verificar token e id del usuario

        $data = $request;

      
        //aqui validamos y decimos que el id tiene que ser igual a lo que me traiga asi como el token
        $verifica = DB::table('login')
                    ->where('token',$token)
                    ->where('id', $id_usuario)
                    ->first();

        if ($verifica == null) {
            $respuesta = array('error' => TRUE,
                                'mensaje'=>'Usuario y/o  token incorrectos' );

            return $respuesta;

            //se verifica que el pedido tenga items
        }
         if (!isset($data["items"]) || strlen($data['items'])==0) {
                $respuesta = array('error' => TRUE,
                                   'mensaje'=>'Faltan los items en el post' );
                                  
                    return $respuesta;
            }else {

                    $orden_id = DB::table('ordenes')->insertGetId(
                        ['usuario_id' => $id_usuario]);

                           $items= explode(',',$data['items']);
                           //dd($items);
                           /*
                           foreach ($items as $producto_id)   {

                           

                            $data_insertar = DB::table('ordenes_detalle')
                                        ->insertGetId(
                                            ['producto_id'=>$producto_id,
                                            'orden_id'=>$orden_id,
                                            'cantidad'=>'1',]);

                        }
                        */

                        for($i=0;$i<count($items);$i+=3){
                            $producto_id=$items[$i];
                            $cantidad=$items[$i+1];
                            $precioproducto=$items[$i+2];
                            $data_insertar = DB::table('ordenes_detalle')
                                        ->insertGetId(
                                            ['producto_id'=>$producto_id,
                                            'orden_id'=>$orden_id,
                                            'cantidad'=>$cantidad,
                                            'precioproducto'=>$precioproducto]);
                        }
                   
                            

                            // //insertamos el detalle de orden con este foreach
                           /*foreach ($items as $producto_id)   {

                                if ($items.length()%2!=0) {
                                    $data_insertar = DB::table('ordenes_detalle')
                                    ->insert(
                                        ['producto_id'=>$producto_id,
                                        ]);
                                    
                                }else {
                                    $data_insertar = DB::table('ordenes_detalle')
                                            >where('orden_id')
                                            ->insert(
                                                [
                                                'cantidad'=>$cantidad,
                                                ]);
                                         }
                                    
                                }*/
                            $respuesta = array(
                                'mensaje'=>FALSE,
                                'orden_id'=> $orden_id,
                                'producto_id'=>$producto_id,
                                'cantidad'=>$cantidad
                            );

                            return $respuesta;    
        }
                                

                                    
      
    }

    public function obtener_pedidos($id_usuario,$token) 
    {
         // verificar token e id del usuario

        

        $verifica = DB::table('login')
                    ->where('id', $id_usuario)
                    ->where('token',$token)
                    ->first();
                    
         if ($verifica == null) {
            $respuesta = array('error' => TRUE,
                                'mensaje'=>'Usuario y/o token incorrectos' );
                         
        }
        // $query = $this->db->query('SELECT * FROM `ordenes` where usuario_id=' .$id_usuario);
        $query=DB::select('SELECT * FROM `ordenes` where usuario_id=' .$id_usuario);

        $ordenes = array();

        foreach ($query as $row) {
            //con esta sentencia sql nos muestra los detalles de producto y relaciona la tabla orden con productos para obetener el detalle del  codigo
            // $query_detalle = $this->db->query('SELECT a.orden_id, b.* FROM `ordenes_detalle`a INNER JOIN productos b on a.producto_id = b.codigo WHERE orden_id= '.$row->id);
          
            //$query_detalle = DB::raw('SELECT a.orden_id, b.* FROM `ordenes_detalle`a INNER JOIN productos b on a.producto_id = b.codigo WHERE orden_id= '.$row->id);
            //mostramos la orden que obtenemos

            $query_detalle = DB::table('orden_detalle')
                              ->select('SELECT orden_id, b.* FROM `ordenes_detalle`a');
            $orden= array(

                'id'=>$row->id,
                'creado_en'=>$row->creado_en,
                //'detalle'=>$query_detalle

            );

            //insertamos la orden
            array_push($ordenes ,$orden);
        }

        $respuesta = array('error'=>FALSE,
                            'ordenes'=>$ordenes
                        );

        return $respuesta;

    }
}
