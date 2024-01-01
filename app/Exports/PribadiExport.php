<?php

namespace App\Exports;

use App\User;
use App\Pribadi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class PribadiExport implements
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
            'Jenis Kelamin',
            'No KK',
            'NIK',
            'Agama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Desa',
            'Kelurahan',
            'Tempat Tinggal',
            'Transport',
            'Anak Ke',
            'Nomer Orangtua',
            'Nomer Siswa',
            'Email',
            'Mengajukan Beasiswa',
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

                $cellRange = 'A1:T1'; // All headers
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
        return Pribadi::query();
    }

    public function map($pribadi): array
    {
        return [
            $pribadi->user->name,
            $pribadi->user->email,
            $pribadi->user->kelas->nama_kelas,
            $pribadi->jk,
            $pribadi->nokk,
            $pribadi->nik,
            $pribadi->agama,
            $pribadi->tmp_lahir,
            $pribadi->tgl_lahir,
            $pribadi->alamat,
            $pribadi->desa,
            $pribadi->kelurahan,
            $pribadi->tmp_tinggal,
            $pribadi->transport,
            $pribadi->anak_ke,
            $pribadi->no_tlp,
            $pribadi->no_hp,
            $pribadi->email,
            $pribadi->beasiswa,
            $pribadi->status,
        ];
    }

    public function title(): string
    {
        return 'DataPribadi';
    }
}
