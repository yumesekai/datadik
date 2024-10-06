<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanEkskul extends Model
{
    protected $fillable = [
        'user_id','nama_ekskul', 'pembina_ekskul', 'jml_kegiatan', 'kegiatan_ekskul_m1','tgl_pelaksanaan_m1','tmp_pelaksanaan_m1','jml_peserta_m1','foto_ekskul_m1','created_at',
        'kegiatan_ekskul_m2','tgl_pelaksanaan_m2','tmp_pelaksanaan_m2','jml_peserta_m2','foto_ekskul_m2',
        'kegiatan_ekskul_m3','tgl_pelaksanaan_m3','tmp_pelaksanaan_m3','jml_peserta_m3','foto_ekskul_m3',
        'kegiatan_ekskul_m4','tgl_pelaksanaan_m4','tmp_pelaksanaan_m4','jml_peserta_m4','foto_ekskul_m4',
    ];
    protected $dates = ['tgl_pelaksanaan_m1', 'tgl_pelaksanaan_m3', 'tgl_pelaksanaan_m2', 'tgl_pelaksanaan_m4','created_at'];
    
    public function laporan()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
