<?php

namespace App\Exports;

use App\TemPriodik;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class TemPriodikExport implements
    FromQuery,
    WithHeadings,
    WithMapping,
    WithTitle,
    ShouldAutoSize,
    WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable, RegistersEventListeners;

    public function headings(): array
    {
        return [
            'Nama',
            'Nisn',
            'Kelas',
            'Status Data',
            'Keterangan',
            'Tinggi Badan',
            'Berat Badan',
            'Jarak Rumah Kesekolah',
            'Jumlah Saudara',

        ];
    }

    public function registerEvents(): array
    {


        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $styleHeader = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                            'color' => ['rgb' => '000000']
                        ],
                    ]
                ];

                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Calibri');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle($cellRange)->applyFromArray($styleHeader);
            },
        ];
    }

    public function query()
    {
        return TemPriodik::query();
    }

    public function map($TemPriodik): array
    {
        return [
            $TemPriodik->user->name,
            $TemPriodik->user->email,
            $TemPriodik->user->kelas,
            $TemPriodik->keterangan,
            $TemPriodik->tinggi_badan,
            $TemPriodik->berat_badan,
            $TemPriodik->jarak_sekolah,
            $TemPriodik->jumlah_saudara,

        ];
    }

    public function title(): string
    {
        return 'DataPriodik';
    }
}
