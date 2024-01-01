<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TemDataSiswa implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;


    public function sheets(): array
    {
        $sheets = [
            new TemPribadiExport(),
            new TemOrangtuaExport(),
            new TemSmpExport(),
            new TemPriodikExport(),            
        ];

        return $sheets;
    }
}
