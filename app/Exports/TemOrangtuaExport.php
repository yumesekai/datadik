<?php

namespace App\Exports;

use App\User;
use App\TemOrangtua;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class TemOrangtuaExport implements
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
            'Nama Ayah',
            'NIK Ayah',
            'Tahun Lahir Ayah',
            'Pendidikan Terakhir Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            'Ayah Memiliki Kebutuhan Khusus ?',
            'Nama Ibu',
            'NIK Ibu',
            'Tahun Lahir Ibu',
            'Pendidikan Terakhir Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'Ibu Memiliki Kebutuhan Khusus ?',
            'Nama Wali',
            'NIK Wali',
            'Tahun Lahir Wali',
            'Pendidikan Terakhir Wali',
            'Pekerjaan Wali',
            'Penghasilan Wali',
            'Wali Memiliki Kebutuhan Khusus ?',
            
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

                $cellRange = 'A1:Z1'; // All headers
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
        return TemOrangtua::query();
    }

    public function map($TemOrangtua): array
    {
        return [
            $TemOrangtua->user->name,
            $TemOrangtua->user->email,
            $TemOrangtua->user->kelas,
            $TemOrangtua->status,
            $TemOrangtua->keterangan,
            $TemOrangtua->nama_ayah,
            $TemOrangtua->nik_ayah,
            $TemOrangtua->tahun_ayah,
            $TemOrangtua->pendidikan_ayah,
            $TemOrangtua->pekerjaan_ayah,
            $TemOrangtua->penghasilan_ayah,
            $TemOrangtua->berkebutuhan_ayah,
            $TemOrangtua->nama_ibu,
            $TemOrangtua->nik_ibu,
            $TemOrangtua->tahun_ibu,
            $TemOrangtua->pendidikan_ibu,
            $TemOrangtua->pekerjaan_ibu,
            $TemOrangtua->penghasilan_ibu,
            $TemOrangtua->berkebutuhan_ibu,
            $TemOrangtua->nama_wali,
            $TemOrangtua->nik_wali,
            $TemOrangtua->tahun_wali,
            $TemOrangtua->pendidikan_wali,
            $TemOrangtua->pekerjaan_wali,
            $TemOrangtua->penghasilan_wali,
            $TemOrangtua->berkebutuhan_wali,
            
        ];
    }

    public function title(): string
    {
        return 'DataOrangtua';
    }
}
