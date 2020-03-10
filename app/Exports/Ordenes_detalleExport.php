<?php

namespace App\Exports;
use App\Ordenes_detalle;

use Maatwebsite\Excel\Concerns\FromCollection;

class Ordenes_detalleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        return Ordenes_detalle::all();
    }
}
