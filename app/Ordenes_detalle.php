<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenes_detalle extends Model
{
    protected $table = 'ordenes_detalle';

   protected $primaryKey ='id';

   public $timestamps = false ; // agrega dos columas de actualizacion y creacion

   protected $fillable = [
       'orden_id',
       'producto_id',
       'cantidad',
       'precioproducto',
       
   ];
   /*public function ordenes()
   {
       return $this->belongsTo(Ordenes::class);

   }*/
   protected $guarded =[

];
  
}
