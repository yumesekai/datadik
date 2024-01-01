<?php

namespace App\Imports;

use App\Kelas;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        $password = '12345678';
        $hashedPassword = Hash::make($password);
        $guru = 'Guru';
        $kelas = Kelas::where('nama_kelas', $row['wali_kelas'])->first();

        return new User([
            'name' => $row['name'],
            'email' => $row['username'],
            'password' => $hashedPassword,
            'role' => $guru,
            'kelas_id' => $kelas->id,
        ]);
    }
}
