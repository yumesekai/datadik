<?php

namespace App\Imports;

use App\Kelas;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Kelas([
            'nama_kelas' => $row['kelas'],
            'angkatan' => $row['angkatan'],
        ]);
    }
}
