<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemPribadi extends Model
{
    protected $fillable = [
        'user_id', 'pribadi_id', 'nisn', 'nama', 'kelas', 'jk', 'nokk', 'nik','agama','tmp_lahir','tgl_lahir','alamat', 'desa', 'kelurahan','tmp_tinggal','transport','anak_ke','no_tlp','no_hp','email','beasiswa','status','keterangan','berkas_beasiswa','berkas_kk','berkas_ijasah'
    ];

    public function pribadi()
    {
        return $this->belongsTo('App\Pribadi')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
