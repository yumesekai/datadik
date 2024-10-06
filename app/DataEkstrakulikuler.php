<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataEkstrakulikuler extends Model
{
    protected $fillable = [
        'nama_ekstra', 'user_id', 'jenis_ekstra'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function pilihan1()
    {
        return $this->belongsTo(Ekstrakulikuler::class, 'nama_ekstra', 'pilihan_1');
    }
}
