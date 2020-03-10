<?php

namespace App\Exports;
use App\Ordenes;


use Maatwebsite\Excel\Concerns\FromCollection;

class OrdenesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ordenes::all();

    }
}
