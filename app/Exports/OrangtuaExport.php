<?php

namespace App\Exports;

use App\User;
use App\Orangtua;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class OrangtuaExport implements
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

                $cellRange = 'A1:Y1'; // All headers
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
        return Orangtua::query();
    }

    public function map($orangtua): array
    {
        return [
            $orangtua->user->name,
            $orangtua->user->email,
            $orangtua->user->kelas->nama_kelas,
            $orangtua->nama_ayah,
            $orangtua->nik_ayah,
            $orangtua->tahun_ayah,
            $orangtua->pendidikan_ayah,
            $orangtua->pekerjaan_ayah,
            $orangtua->penghasilan_ayah,
            $orangtua->berkebutuhan_ayah,
            $orangtua->nama_ibu,
            $orangtua->nik_ibu,
            $orangtua->tahun_ibu,
            $orangtua->pendidikan_ibu,
            $orangtua->pekerjaan_ibu,
            $orangtua->penghasilan_ibu,
            $orangtua->berkebutuhan_ibu,
            $orangtua->nama_wali,
            $orangtua->nik_wali,
            $orangtua->tahun_wali,
            $orangtua->pendidikan_wali,
            $orangtua->pekerjaan_wali,
            $orangtua->penghasilan_wali,
            $orangtua->berkebutuhan_wali,
            $orangtua->status,
        ];
    }

    public function title(): string
    {
        return 'DataOrangtua';
    }
}
