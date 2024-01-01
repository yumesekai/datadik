<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataSiswa implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;


    public function sheets(): array
    {
        $sheets = [
            new PribadiExport(),
            new OrangtuaExport(),
            new SmpExport(),
            new PriodikExport(),
            new EkstraExport(),            
        ];

        return $sheets;
    }
}
