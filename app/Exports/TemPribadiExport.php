<?php

namespace App\Exports;

use App\User;
use App\TemPribadi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class TemPribadiExport implements
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
            'Nama Pengajuan',
            'Nisn Pengajuan',
            'Kelas Pengajuan',
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

                $cellRange = 'A1:X1'; // All headers
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
        return TemPribadi::query();
    }

    public function map($TemPribadi): array
    {
        return [
            $TemPribadi->user->name,
            $TemPribadi->user->email,
            $TemPribadi->user->kelas,
            $TemPribadi->status,
            $TemPribadi->keterangan,
            $TemPribadi->nama,
            $TemPribadi->nisn,
            $TemPribadi->kelas,
            $TemPribadi->jk,
            $TemPribadi->nokk,
            $TemPribadi->nik,
            $TemPribadi->agama,
            $TemPribadi->tmp_lahir,
            $TemPribadi->tgl_lahir,
            $TemPribadi->alamat,
            $TemPribadi->desa,
            $TemPribadi->kelurahan,
            $TemPribadi->tmp_tinggal,
            $TemPribadi->transport,
            $TemPribadi->anak_ke,
            $TemPribadi->no_tlp,
            $TemPribadi->no_hp,
            $TemPribadi->email,
            $TemPribadi->beasiswa,
            
        ];
    }

    public function title(): string
    {
        return 'DataPribadi';
    }
}
