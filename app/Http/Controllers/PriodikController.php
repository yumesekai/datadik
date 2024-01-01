<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Priodik;
use App\TemPriodik;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PriodikController extends Controller
{
    public function siswa()
    {
        $priodik = Priodik::all();
        $priodik_tem = TemPriodik::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        return view('siswa.priodik.index', compact('priodik','priodik_tem'));
    }

    public function guru()
    {
        $user = Auth::user()->kelas->id;
        $priodik = Priodik::all()->where('kelas_id', $user);
        return view('guru.priodik.index', compact('priodik'));
    }

    public function editSiswa()
    {
        $priodik = Priodik::all();
        return view('siswa.priodik.edit', compact('priodik'));
    }

    public function editTemSiswa()
    {
        return view('siswa.priodik.editTem');
    }

    public function storeSiswa(Request $request)
    {

        $this->validate($request, [
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_sekolah' => 'required',
            'jumlah_saudara' => 'required',
        ]);

        TemPriodik::create([
            'user_id' => $request->id,
            'priodik_id' => $request->priodik_id,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'jumlah_saudara' => $request->jumlah_saudara,
            'status' => $request->status,
        ]);

        $siswa = Priodik::where('user_id', Auth::user()->id)->first();
        $siswa_data = [
            'status' => $request->status,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('priodik.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function updateSiswa(Request $request)
    {

        $siswa = TemPriodik::where('user_id', Auth::user()->id)->firstWhere('status', 'Pending');

        $this->validate($request, [
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_sekolah' => 'required',
            'jumlah_saudara' => 'required',
        ]);

        $siswa_data = [
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'jumlah_saudara' => $request->jumlah_saudara,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('priodik.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function verifPriodik()
    {

        $siswa = Priodik::where('user_id', Auth::user()->id)->first();
        $statusData = 'Data Sudah Benar';
        $siswa_data = [
            'status' => $statusData,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('priodik.siswa')->with('success', 'Data Sudah Diverifikasi!');
    }

    public function excelPriodik()
    {
        $filepath = public_path('uploads/data_import/IM_PRIODIK.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_PRIODIK.xls', $headers);
    }

    public function index()
    {
        $priodik = Priodik::OrderBy('kelas_id')->get();
        return view('admin.priodik.index', compact('priodik'));
    }

    public function create()
    {
        $user = User::OrderBy('name')->where('role','Siswa')->get();
        return view('admin.priodik.tambah', compact('user'));
    }

    public function store(Request $request)
    {

        $user = User::where('id', $request->nama)->first();
        $kelas = $user->kelas_id;

        $this->validate($request, [
            'nama' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_sekolah' => 'required',
            'jumlah_saudara' => 'required',
        ]);

        Priodik::create([
            'user_id' => $request->nama,
            'kelas_id' => $kelas,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'jumlah_saudara' => $request->jumlah_saudara,
        ]);

        return redirect()->route('priodik.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $priodik = Priodik::findorfail($id);
        return view('admin.priodik.edit', compact('priodik'));
    }

    public function update(Request $request, $id)
    {

        $siswa = Priodik::findorfail($id);

        $this->validate($request, [
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_sekolah' => 'required',
            'jumlah_saudara' => 'required',
        ]);
        $siswa_data = [
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'jumlah_saudara' => $request->jumlah_saudara,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('priodik.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = Priodik::findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Data Priodik berhasil dihapus secara permanent');
    }
}
