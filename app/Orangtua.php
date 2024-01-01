<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $fillable = [
        'user_id', 'kelas_id', 'nama_ayah', 'nik_ayah', 'tahun_ayah', 'pendidikan_ayah','pekerjaan_ayah','penghasilan_ayah','berkebutuhan_ayah', 'nama_ibu', 'nik_ibu', 'tahun_ibu', 'pendidikan_ibu','pekerjaan_ibu','penghasilan_ibu','berkebutuhan_ibu', 'nama_wali', 'nik_wali', 'tahun_wali', 'pendidikan_wali','pekerjaan_wali','penghasilan_wali','berkebutuhan_wali','status','keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    
}
