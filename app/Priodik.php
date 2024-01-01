<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priodik extends Model
{
    protected $fillable = [
        'user_id', 'kelas_id', 'tinggi_badan', 'berat_badan', 'jarak_sekolah', 'jumlah_saudara','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
