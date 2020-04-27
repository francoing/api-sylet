<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linea extends Model
{
        protected $table = 'lineas';

    protected $primaryKey ='id';

    public $timestamps = false ; // agrega dos columas de actualizacion y creacion

    protected $fillable = [
        'linea',
        'icono',
        
        
    ];
    /*public function ordenes()
    {
        return $this->belongsTo(Ordenes::class);

    }*/
    protected $guarded =[

    ];
}
