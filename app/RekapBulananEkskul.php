<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekapBulananEkskul extends Model
{
    protected $fillable = [
        'bulan','sabtu_m1', 'minggu_m1', 'sabtu_m2', 'minggu_m2', 'sabtu_m3', 'minggu_m3', 'sabtu_m4', 'minggu_m4', 'sabtu_m5', 'minggu_m5'
    ];
    protected $dates = ['bulan', 'sabtu_m1', 'minggu_m1', 'sabtu_m2', 'minggu_m2', 'sabtu_m3', 'minggu_m3', 'sabtu_m4', 'minggu_m4', 'sabtu_m5', 'minggu_m5'];
}
