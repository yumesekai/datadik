<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas', 'angkatan'
    ];

    public function kelas($id)
    {
        $kelas = User::where('kelas_id', $id)->first();
        return $kelas;
    }

    public function kelasEkstra($id)
    {
        $kelas = Ekstrakulikuler::where('kelas_id', $id)->first();
        return $kelas;
    }
}
