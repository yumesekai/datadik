<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smp extends Model
{
    protected $fillable = [
        'user_id', 'kelas_id', 'nama_siswa', 'kelas', 'sekolah_asal', 'no_un', 'no_ijasah', 'no_skhun','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
