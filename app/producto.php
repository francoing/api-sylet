<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey ='codigo';
 
    public $timestamps = false ; // agrega dos columas de actualizacion y creacion
 
    protected $fillable = [
        'producto',
        'linea',
        'linea_id',
        'proveedor',
        'descripcion',
        'precio_compra',
        'imagen'

        
    ];
    /*public function ordenes()
    {
        return $this->belongsTo(Ordenes::class);
 
    }*/
    protected $guarded =[
 
 ];
}
