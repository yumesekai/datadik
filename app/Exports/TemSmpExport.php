<?php

namespace App\Exports;

use App\TemSmp;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class TemSmpExport implements
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
            'Sekolah Sebelumnya',
            'Nomer Ujian Nasional',
            'Nomer Ijasah',
            'Nomer SKHUN',

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
        return TemSmp::query();
    }

    public function map($Temsmp): array
    {
        return [
            $Temsmp->user->name,
            $Temsmp->user->email,
            $Temsmp->user->kelas,
            $Temsmp->status,
            $Temsmp->keterangan,
            $Temsmp->sekolah_asal,
            $Temsmp->no_un,
            $Temsmp->no_ijasah,
            $Temsmp->no_skhun,

        ];
    }

    public function title(): string
    {
        return 'DataSMP';
    }
}
