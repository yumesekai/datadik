<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemSmp extends Model
{
    protected $fillable = [
        'user_id', 'smp_id', 'nama_siswa', 'kelas', 'sekolah_asal', 'no_un', 'no_ijasah', 'no_skhun','status','keterangan'
    ];

    public function smp()
    {
        return $this->belongsTo('App\Smp')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
