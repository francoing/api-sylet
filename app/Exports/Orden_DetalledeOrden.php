<?php

namespace App\Exports;
use App\Ordenes_detalle;
use App\Ordenes;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class Orden_DetalledeOrden implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    

    $Ordenes=DB::table('ordenes as o')
    ->join('ordenes_detalle as l','o.id','=','l.orden_id')
    ->select('o.id','o.usuario_id','o.creado_en','l.producto_id','l.cantidad','l.precioproducto')
    ->get();

        return $Ordenes;
    }
}
