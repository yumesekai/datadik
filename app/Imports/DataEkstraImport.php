<?php

namespace App\Imports;

use App\DataEkstrakulikuler;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataEkstraImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::where('name', $row['pembina'])->first();
        return new DataEkstrakulikuler([
            'nama_ekstra' => $row['nama_ekstra'],
            'user_id' => $user->id,
            'jenis_ekstra' => $row['jenis_ekstra'],
        ]);
    }
}
