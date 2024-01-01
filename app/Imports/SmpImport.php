<?php

namespace App\Imports;

use App\User;
use App\Smp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SmpImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $user = User::where('email', $row['username'])->first();

        return new Smp([
            'user_id' => $user->id,
            'kelas_id' => $user->kelas_id,
            'sekolah_asal' => $row['sekolah_asal'],
            'no_un' => $row['no_un'],
            'no_ijasah' => $row['no_ijasah'],
            'no_skhun' => $row['no_skhun'],
        ]);
    }
}
