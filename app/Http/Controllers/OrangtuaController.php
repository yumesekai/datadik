<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Orangtua;
use App\TemOrangtua;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class OrangtuaController extends Controller
{
    public function index()
    {
            $orangtua = Orangtua::OrderBy('kelas_id')->get();
            $tem_orangtua = TemOrangtua::all()->isEmpty();
            return view('admin.orangtua.index', compact('orangtua','tem_orangtua'));       
    }

    public function siswa()
    {
            $orangtua = Orangtua::all();
            $orangtua_tem = TemOrangtua::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            return view('siswa.orangtua.index', compact('orangtua','orangtua_tem'));       
    }

    public function guru()
    {
        $user = Auth::user()->kelas->id;
        $orangtua = Orangtua::all()->where('kelas_id', $user);
        return view('guru.orangtua.index', compact('orangtua'));
    }

    public function editSiswa()
    {
        $orangtua = Orangtua::all();
        return view('siswa.orangtua.edit', compact('orangtua'));
    }

    public function editTemSiswa()
    {
        return view('siswa.orangtua.editTem');
    }

    public function storeSiswa(Request $request)
    {

        $this->validate($request, [
            'nama_ayah' => 'required',
            'nik_ayah' => 'required',
            'tahun_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required',
            'tahun_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
        ]);

        TemOrangtua::create([
            'user_id' => $request->id,
            'orangtua_id' => $request->orangtua_id,
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tahun_ayah' => $request->tahun_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'berkebutuhan_ayah' => $request->berkebutuhan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tahun_ibu' => $request->tahun_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'berkebutuhan_ibu' => $request->berkebutuhan_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'tahun_wali' => $request->tahun_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'berkebutuhan_wali' => $request->berkebutuhan_wali,
            'status' => $request->status,
        ]);

        $siswa = Orangtua::where('user_id', Auth::user()->id)->first();
        $siswa_data = [
            'status' => $request->status,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('orangtua.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function updateSiswa(Request $request)
    {

        $siswa = TemOrangtua::where('user_id', Auth::user()->id)->firstWhere('status', 'Pending');

        $this->validate($request, [
            'nama_ayah' => 'required',
            'nik_ayah' => 'required',
            'tahun_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required',
            'tahun_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
        ]);
        
        $siswa_data = [
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tahun_ayah' => $request->tahun_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'berkebutuhan_ayah' => $request->berkebutuhan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tahun_ibu' => $request->tahun_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'berkebutuhan_ibu' => $request->berkebutuhan_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'tahun_wali' => $request->tahun_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'berkebutuhan_wali' => $request->berkebutuhan_wali,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('orangtua.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function verifOrangtua()
    {

        $siswa = Orangtua::where('user_id', Auth::user()->id)->first();
        $statusData = 'Data Sudah Benar';
        $siswa_data = [
            'status' => $statusData,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('orangtua.siswa')->with('success', 'Data Sudah Diverifikasi!');
    }

    public function excelOrangtua()
    {
        $filepath = public_path('uploads/data_import/IM_ORANGTUA.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_ORANGTUA.xls', $headers);
    }

    public function create()
    {
        $user = User::OrderBy('name')->where('role','Siswa')->get();
        return view('admin.orangtua.tambah', compact('user'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', $request->nama)->first();
        $kelas = $user->kelas_id;

        $this->validate($request, [
            'nama' => 'required',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required',
            'tahun_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required',
            'tahun_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
        ]);

        Orangtua::create([
            'user_id' => $request->nama,
            'kelas_id' => $kelas,
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tahun_ayah' => $request->tahun_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'berkebutuhan_ayah' => $request->berkebutuhan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tahun_ibu' => $request->tahun_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'berkebutuhan_ibu' => $request->berkebutuhan_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'tahun_wali' => $request->tahun_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'berkebutuhan_wali' => $request->berkebutuhan_wali,
        ]);

        return redirect()->route('orangtua.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function edit($id)
    {
            $id = Crypt::decrypt($id);
            $orangtua = Orangtua::findorfail($id);
            return view('admin.orangtua.edit', compact('orangtua'));
    }

    public function update(Request $request, $id)
    {

        $siswa = Orangtua::findorfail($id);

        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required',
            'tahun_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required',
            'tahun_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
        ]);

        $siswa_data = [
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tahun_ayah' => $request->tahun_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'berkebutuhan_ayah' => $request->berkebutuhan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tahun_ibu' => $request->tahun_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'berkebutuhan_ibu' => $request->berkebutuhan_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'tahun_wali' => $request->tahun_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'berkebutuhan_wali' => $request->berkebutuhan_wali,

        ];
        $siswa->update($siswa_data);

        return redirect()->route('orangtua.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = Orangtua::findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Data Orang Tua berhasil dihapus secara permanent');
    }
}
