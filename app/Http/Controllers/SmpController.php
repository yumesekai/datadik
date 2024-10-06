<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Smp;
use App\TemSmp;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class SmpController extends Controller
{
    public function index()
    {
        $smp = Smp::OrderBy('kelas_id')->get();
        return view('admin.smp.index', compact('smp'));
    }

    public function siswa()
    {
            $smp = Smp::all();
            $smp_tem = TemSmp::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            return view('siswa.smp.index', compact('smp','smp_tem'));       
    }

    public function guru()
    {
        $user = Auth::user()->kelas->id;
        $smp = Smp::all()->where('kelas_id', $user);
        return view('guru.smp.index', compact('smp'));
    }

    public function editSiswa()
    {
        $smp = Smp::all();
        return view('siswa.smp.edit', compact('smp'));
    }

    public function editTemSiswa()
    {
        return view('siswa.smp.editTem');
    }

    public function storeSiswa(Request $request)
    {

        $this->validate($request, [
            'sekolah_asal' => 'required',
        ]);

        TemSmp::create([
            'user_id' => $request->id,
            'smp_id' => $request->smp_id,
            'sekolah_asal' => $request->sekolah_asal,
            'no_un' => $request->no_un,
            'no_ijasah' => $request->no_ijasah,
            'no_skhun' => $request->no_skhun,
            'status' => $request->status,
        ]);

        $siswa = Smp::where('user_id', Auth::user()->id)->first();
        $siswa_data = [
            'status' => $request->status,
        ];
        $siswa->update($siswa_data);


        return redirect()->route('smp.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function updateSiswa(Request $request)
    {

        $siswa = TemSmp::where('user_id', Auth::user()->id)->firstWhere('status', 'Pending');

        $this->validate($request, [
            'sekolah_asal' => 'required',
        ]);

        $siswa_data = [
            'sekolah_asal' => $request->sekolah_asal,
            'no_un' => $request->no_un,
            'no_ijasah' => $request->no_ijasah,
            'no_skhun' => $request->no_skhun,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('smp.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function verifSmp()
    {

        $siswa = Smp::where('user_id', Auth::user()->id)->first();
        $statusData = 'Data Sudah Benar';
        $siswa_data = [
            'status' => $statusData,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('smp.siswa')->with('success', 'Data Sudah Diverifikasi!');
    }

    public function excelSmp()
    {
        $filepath = public_path('uploads/data_import/IM_SMP.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_SMP.xls', $headers);
    }

    public function create()
    {
        $user = User::OrderBy('name')->where('role','Siswa')->get();
        return view('admin.smp.tambah', compact('user'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', $request->nama)->first();
        $kelas = $user->kelas_id;

        $this->validate($request, [
            'nama' => 'required',
            'sekolah_asal' => 'required',
        ]);

        Smp::create([
            'user_id' => $request->nama,
            'kelas_id' => $kelas,
            'sekolah_asal' => $request->sekolah_asal,
            'no_un' => $request->no_un,
            'no_ijasah' => $request->no_ijasah,
            'no_skhun' => $request->no_skhun,
        ]);

        return redirect()->route('smp.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function edit($id)
    {
            $id = Crypt::decrypt($id);
            $smp = Smp::findorfail($id);
            return view('admin.smp.edit', compact('smp'));
    }

    public function update(Request $request, $id)
    {

        $siswa = Smp::findorfail($id);

        $this->validate($request, [
            'sekolah_asal' => 'required',
        ]);

        $siswa_data = [
            'sekolah_asal' => $request->sekolah_asal,
            'no_un' => $request->no_un,
            'no_ijasah' => $request->no_ijasah,
            'no_skhun' => $request->no_skhun,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('smp.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = Smp::findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Data SMP berhasil dihapus secara permanent');
    }


}
