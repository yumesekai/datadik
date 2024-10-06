<?php

namespace App\Http\Controllers;

use App\User;
use App\Imports\UserImport;
use App\Imports\PribadiImport;
use App\Imports\OrangtuaImport;
use App\Imports\SmpImport;
use App\Imports\PriodikImport;
use App\Pribadi;
use App\Orangtua;
use App\Smp;
use App\Priodik;
use App\TemPribadi;
use App\TemOrangtua;
use App\TemSmp;
use App\TemPriodik;
use App\DataEkstrakulikuler;
use App\Ekstrakulikuler;
use App\Imports\DataEkstraImport;
use App\Imports\KelasImport;
use App\Imports\UserSiswaImport;
use App\Kelas;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('admin.import.index', compact('user'));
    }

    public function import_user_guru(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new UserImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data User Berhasil Diimport!');
    }

    public function import_user_siswa(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new UserSiswaImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data User Berhasil Diimport!');
    }

    public function import_pribadi(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new PribadiImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data Pribadi Berhasil Diimport!');
    }
    public function import_orangtua(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new OrangtuaImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data Orang tua Berhasil Diimport!');
    }

    public function import_smp(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new SmpImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data smp Berhasil Diimport!');
    }

    public function import_priodik(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new PriodikImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data priodik Berhasil Diimport!');
    }

    public function import_ekstra(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new DataEkstraImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data Ekstra Berhasil Diimport!');
    }

    public function import_kelas(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('import_file', $nama_file);
        Excel::import(new KelasImport, public_path('/import_file/' . $nama_file));
        return redirect()->back()->with('success', 'Data Kelas Berhasil Diimport!');
    }

    public function deleteAll()
    {
        $user = User::where('role', 'Siswa')->count();
        if ($user >= 1) {
            //User::whereNotNull('kelas_id')->forceDelete();
            //Pribadi::whereNotNull('id')->forceDelete();
            //Orangtua::whereNotNull('id')->forceDelete();
            //Smp::whereNotNull('id')->forceDelete();
            //Priodik::whereNotNull('id')->forceDelete();
            //TemPribadi::whereNotNull('id')->forceDelete();
            //TemOrangtua::whereNotNull('id')->forceDelete();
            //TemSmp::whereNotNull('id')->forceDelete();
            //TemPriodik::whereNotNull('id')->forceDelete();
            //DataEkstrakulikuler::whereNotNull('id')->forceDelete();
	    Ekstrakulikuler::whereNotNull('id')->forceDelete();
            //Kelas::whereNotNull('id')->forceDelete();
            return redirect()->back()->with('success', 'Data seluruh table berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data seluruh tabel gagal dihapus!');
        }
    }
}
