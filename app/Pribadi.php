<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pribadi extends Model
{
    protected $fillable = [
        'user_id', 'kelas_id', 'nisn', 'nama', 'kelas', 'jk', 'nokk', 'nik','agama','tmp_lahir','tgl_lahir','alamat', 'desa', 'kelurahan','tmp_tinggal','transport','anak_ke','no_tlp','no_hp','email','beasiswa','status'
    ];

    protected $dates = ['tgl_lahir','created_at'];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    protected $table = 'pribadis';
}
