<?php

namespace App\Http\Controllers;

use App\User;
use App\TemPribadi;
use App\TemOrangtua;
use App\TemSmp;
use App\TemPriodik;
use App\Exports\DataSiswa;
use App\Exports\TemDataSiswa;
use App\Orangtua;
use App\Pribadi;
use App\Priodik;
use App\Smp;
use App\Ekstrakulikuler;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::User()->role == 'Admin' || Auth::User()->role == 'Kepsek') {
            return redirect()->route('admin.home')->with('success', 'Login Berhasil!');
        } elseif (Auth::User()->role == 'Guru') {
            return redirect()->route('guru.home')->with('success', 'Login Berhasil!');
        } else {
            return redirect()->route('siswa.home')->with('success', 'Login Berhasil!');
        }
    }

    public function siswa()
    {
        $user1 = Auth::user()->kelas->id;
        $user = User::all()->where('kelas_id', $user1);
        $pribadi = TemPribadi::all()->where('user_id', Auth::user()->id)->sortByDesc('id');
        $orangtua = TemOrangtua::all()->where('user_id', Auth::user()->id)->sortByDesc('id');
        $smp = TemSmp::all()->where('user_id', Auth::user()->id)->sortByDesc('id');
        $priodik = TemPriodik::all()->where('user_id', Auth::user()->id)->sortByDesc('id');
        return view('home', compact('priodik', 'smp', 'orangtua', 'pribadi', 'user'));
    }

    public function guru()
    {
        $user = Auth::user()->kelas->id;
        $totalUser = Orangtua::all()->where('kelas_id', $user)->count();
        $dataOrangtua = Orangtua::all()->where('kelas_id', $user);
        $dataPribadi = Pribadi::all()->where('kelas_id', $user);
	$totalPribadi = $dataPribadi->where('status', 'Data Sudah Benar')->count();
        $totalOrangtua = $dataOrangtua->where('status', 'Data Sudah Benar')->count();
        $totalSMP = Smp::all()->where('kelas_id', $user)->count();
        $totalPriodik = Priodik::all()->where('kelas_id', $user)->count();
        $pil1 = Ekstrakulikuler::where('kelas_id', $user)->count();
        $pil2 = Ekstrakulikuler::where('kelas_id', $user)->count();
        $pil3 = Ekstrakulikuler::where('kelas_id', $user)->count();
        return view('guru.index', compact('totalPriodik', 'totalSMP', 'totalOrangtua', 'totalPribadi', 'totalUser', 'pil1', 'pil2', 'pil3'));
    }

    public function admin()
    {
        $user = User::count();
        $temPribadi = TemPribadi::count();
        $temOrangtua = TemOrangtua::count();
        $temSmp = TemSmp::count();
        $temPriodik = TemPriodik::count();

        $penPribadi = TemPribadi::where('status', 'Pending')->count();
        $penOrangtua = TemOrangtua::where('status', 'Pending')->count();
        $penSmp = TemSmp::where('status', 'Pending')->count();
        $penPriodik = TemPriodik::where('status', 'Pending')->count();

        $setPribadi = TemPribadi::where('status', 'Setujui')->count();
        $setOrangtua = TemOrangtua::where('status', 'Setujui')->count();
        $setSmp = TemSmp::where('status', 'Setujui')->count();
        $setPriodik = TemPriodik::where('status', 'Setujui')->count();

        $tolPribadi = TemPribadi::where('status', 'Tolak')->count();
        $tolOrangtua = TemOrangtua::where('status', 'Tolak')->count();
        $tolSmp = TemSmp::where('status', 'Tolak')->count();
        $tolPriodik = TemPriodik::where('status', 'Tolak')->count();

        $totalData = $temPribadi + $temOrangtua + $temSmp + $temPriodik;
        $totalDataPending = $penPribadi + $penOrangtua + $penSmp + $penPriodik;

        return view('admin.index', compact(
            'totalData',
            'totalDataPending',
            'user',
            'penPribadi',
            'penOrangtua',
            'penSmp',
            'penPriodik',
            'setPribadi',
            'setOrangtua',
            'setSmp',
            'setPriodik',
            'tolPribadi',
            'tolOrangtua',
            'tolSmp',
            'tolPriodik'
        ));
    }

    public function editPribadiDis($id)
    {
        $id = Crypt::decrypt($id);
        $pribadi = TemPribadi::findorfail($id);
        return view('siswa.home.pribadi', compact('pribadi'));
    }

    public function editOrangtuaDis($id)
    {
        $id = Crypt::decrypt($id);
        $orangtua = TemOrangtua::findorfail($id);
        return view('siswa.home.orangtua', compact('orangtua'));
    }

    public function editSmpDis($id)
    {
        $id = Crypt::decrypt($id);
        $smp = TemSmp::findorfail($id);
        return view('siswa.home.smp', compact('smp'));
    }

    public function editPriodikDis($id)
    {
        $id = Crypt::decrypt($id);
        $priodik = TemPriodik::findorfail($id);
        return view('siswa.home.priodik', compact('priodik'));
    }

    public function export_data()
    {
        return Excel::download(new DataSiswa, 'Data Siswa.xlsx');
    }

    public function export_TemData()
    {
        return Excel::download(new TemDataSiswa, 'Pengajuan Data Siswa.xlsx');
    }
}
