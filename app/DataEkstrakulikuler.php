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

    public function pilihan1($id)
    {
        $pilihan1 = Ekstrakulikuler::where('pilihan_1', $id)->first();
        return $pilihan1;
    }
}
