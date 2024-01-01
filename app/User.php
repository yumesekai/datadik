<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'kelas_id', 'berkas_beasiswa','berkas_kk','berkas_ijasah'
    ];

    // public function guru($id)
    // {
    //     $guru = Guru::where('status', $id)->first();
    //     return $guru;
    // }

    // public function siswa($id)
    // {
    //     $siswa = Siswa::where('status', $id)->first();
    //     return $siswa;
    // }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function pembina_ekstra($id)
    {
        $ekstra = DataEkstrakulikuler::where('user_id', $id)->first();
        return $ekstra;
    }

    public function ekstrakulikuler($id)
    {
        $ekstra = Ekstrakulikuler::where('user_id', $id)->first();
        return $ekstra;
    }

    public function pribadi($id)
    {
        $pribadi = Pribadi::where('user_id', $id)->first();
        return $pribadi;
    }

    public function orangtua($id)
    {
        $orangtua = Orangtua::where('user_id', $id)->first();
        return $orangtua;
    }

    public function smp($id)
    {
        $smp = Smp::where('user_id', $id)->first();
        return $smp;
    }

    public function priodik($id)
    {
        $priodik = Priodik::where('user_id', $id)->first();
        return $priodik;
    }

    public function tem_pribadi($id)
    {
        $pribadi = TemPribadi::where('user_id', $id)->firstWhere('status','Pending');
        return $pribadi;
    }

    public function tem_orangtua($id)
    {
        $orangtua = TemOrangtua::where('user_id', $id)->firstWhere('status','Pending');
        return $orangtua;
    }

    public function tem_smp($id)
    {
        $smp = TemSmp::where('user_id', $id)->firstWhere('status','Pending');
        return $smp;
    }

    public function tem_priodik($id)
    {
        $priodik = TemPriodik::where('user_id', $id)->firstWhere('status','Pending');
        return $priodik;
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
