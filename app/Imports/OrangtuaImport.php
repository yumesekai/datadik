<?php

namespace App\Imports;

use App\User;
use App\Orangtua;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrangtuaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $user = User::where('email', $row['username'])->first();

        return new Orangtua([
            'user_id' => $user->id,
            'kelas_id' => $user->kelas_id,
            'nama_ayah' => $row['nama_ayah'],
            'nik_ayah' => $row['nik_ayah'],
            'tahun_ayah' => $row['tahun_ayah'],
            'pendidikan_ayah' => $row['pendidikan_ayah'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'penghasilan_ayah' => $row['penghasilan_ayah'],
            'berkebutuhan_ayah' => $row['berkebutuhan_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'nik_ibu' => $row['nik_ibu'],
            'tahun_ibu' => $row['tahun_ibu'],
            'pendidikan_ibu' => $row['pendidikan_ibu'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'penghasilan_ibu' => $row['penghasilan_ibu'],
            'berkebutuhan_ibu' => $row['berkebutuhan_ibu'],
            'nama_wali' => $row['nama_wali'],
            'nik_wali' => $row['nik_wali'],
            'tahun_wali' => $row['tahun_wali'],
            'pendidikan_wali' => $row['pendidikan_wali'],
            'pekerjaan_wali' => $row['pekerjaan_wali'],
            'penghasilan_wali' => $row['penghasilan_wali'],
            'berkebutuhan_wali' => $row['berkebutuhan_wali'],
        ]);
    }
}
