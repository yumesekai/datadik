<?php

namespace App\Exports;

use App\Smp;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class SmpExport implements
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
            'Sekolah Sebelumnya',
            'Nomer Ujian Nasional',
            'Nomer Ijasah',
            'Nomer SKHUN',
            'Status Data',
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

                $cellRange = 'A1:H1'; // All headers
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
        return Smp::query();
    }

    public function map($smp): array
    {
        return [
            $smp->user->name,
            $smp->user->email,
            $smp->user->kelas->nama_kelas,
            $smp->sekolah_asal,
            $smp->no_un,
            $smp->no_ijasah,
            $smp->no_skhun,
            $smp->status,
        ];
    }

    public function title(): string
    {
        return 'DataSMP';
    }
}
