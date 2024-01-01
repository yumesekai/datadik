<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    protected $fillable = [
        'user_id', 'kelas_id', 'pilihan_1', 'pilihan_2', 'pilihan_3'
    ];

    public function DataEkstrakulikuler()
    {
        return $this->belongsToMany('App\DataEkstrakulikuler');
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }
}
