<?php

namespace App\Imports;

use App\User;
use App\Pribadi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PribadiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $user = User::where('email', $row['username'])->first();

        return new Pribadi([
            'user_id' => $user->id,
            'kelas_id' => $user->kelas_id,
            'jk' => $row['jenis_kelamin'],
            'nokk' => $row['no_kk'],
            'nik' => $row['nik'],
            'agama' => $row['agama'],
            'tmp_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'alamat' => $row['alamat'],
            'desa' => $row['desa'],
            'kelurahan' => $row['kelurahan'],
            'tmp_tinggal' => $row['tempat_tinggal'],
            'transport' => $row['transport'],
            'anak_ke' => $row['anak_ke'],
            'no_tlp' => $row['nomer_hp_siswa'],
            'no_hp' => $row['nomer_hp_ortu'],
            'email' => $row['email'],
            'beasiswa' => $row['beasiswa'], 
        ]);
    }
}
