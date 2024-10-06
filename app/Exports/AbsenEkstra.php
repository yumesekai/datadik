<?php

namespace App\Exports;

use App\DataEkstrakulikuler;
use App\Ekstrakulikuler;
use App\Kelas;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class AbsenEkstra implements FromQuery, WithTitle, WithMapping, WithHeadings
{
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        $pilihan1 = Ekstrakulikuler::where('pilihan_1', $this->id);
        $pilihan2 = Ekstrakulikuler::where('pilihan_2', $this->id);
        $pilihan3 = Ekstrakulikuler::where('pilihan_3', $this->id);
        return $pilihan1->union($pilihan2)->union($pilihan3)->orderBy('kelas_id');
    }

    /**
     * @var Order $order
     */
    public function map($ekstrakulikuler): array
    {

        return [
            [
                $ekstrakulikuler->user->name,
                $ekstrakulikuler->kelas->nama_kelas,
		$ekstrakulikuler->no_hp,
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Kelas',
	    'Nomer Handphone',
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'AbsenEkstra';
    }
}