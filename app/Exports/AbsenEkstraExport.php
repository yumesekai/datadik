<?php

namespace App\Exports;

use App\DataEkstrakulikuler;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpParser\Node\Expr\Cast\String_;

class AbsenEkstraExport implements WithMultipleSheets
{
    use Exportable;

    protected $year;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets = [
            new AbsenEkstra($this->id),
        ];

        return $sheets;
    }
}
