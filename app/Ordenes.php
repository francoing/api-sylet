<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    protected $table = 'ordenes';

   protected $primaryKey ='id';

   public $timestamps = false ; // agrega dos columas de actualizacion y creacion

   protected $fillable = [
       'usuario_id',
       'creado_en',
       
       
   ];
   /*public function ordenes()
   {
       return $this->belongsTo(Ordenes::class);

   }*/
   protected $guarded =[

];
}
