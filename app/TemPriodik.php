<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemPriodik extends Model
{
    protected $fillable = [
        'user_id', 'priodik_id', 'tinggi_badan', 'berat_badan', 'jarak_sekolah', 'jumlah_saudara','status','keterangan'
    ];

    public function priodik()
    {
        return $this->belongsTo('App\Priodik')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
