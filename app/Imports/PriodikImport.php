<?php

namespace App\Imports;

use App\User;
use App\Priodik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PriodikImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $user = User::where('email', $row['username'])->first();

        return new Priodik([
            'user_id' => $user->id,
            'kelas_id' => $user->kelas_id,
            'tinggi_badan' => $row['tinggi_badan'],
            'berat_badan' => $row['berat_badan'],
            'jarak_sekolah' => $row['jarak_sekolah'],
            'jumlah_saudara' => $row['jumlah_saudara'],
        ]);
    }
}
