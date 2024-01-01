<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Pribadi;
use App\TemPribadi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\Storage;

class PribadiController extends Controller
{
    public function index()
    {

        $pribadi = Pribadi::OrderBy('kelas_id')->OrderBy('user_id')->get();
        return view('admin.pribadi.index', compact('pribadi'));
    }

    public function siswa()
    {

        $pribadi = Pribadi::all();
        $pribadi_tem = TemPribadi::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        return view('siswa.pribadi.index', compact('pribadi','pribadi_tem'));
    }

    public function guru()
    {
        $user = Auth::user()->kelas->id;
        $pribadi = Pribadi::OrderBy('user_id')->where('kelas_id', $user)->get();
        return view('guru.pribadi.index', compact('pribadi'));
    }

    public function editSiswa()
    {
        $pribadi = Pribadi::all();
        return view('siswa.pribadi.edit', compact('pribadi'));
    }

    public function editTemSiswa()
    {
        return view('siswa.pribadi.editTem');
    }

    public function storeSiswa(Request $request)
    {
        $beasiswa = $request->berkas_beasiswa;
        $kk = $request->berkas_kk;
        $ijasah = $request->berkas_ijasah;

        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'agama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kelurahan' => 'required',
            'tmp_tinggal' => 'required',
            'transport' => 'required',
            'anak_ke' => 'required',
            'no_tlp' => 'required',
            'beasiswa' => 'required',
            'berkas_kk' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_ijasah' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_beasiswa' => 'mimes:png,jpg,jpeg|max:1100',
        ]);

        $email = Auth::user()->email;
        $kelas = Auth::user()->kelas->nama_kelas;

        if ($beasiswa == '' && Auth::user()->berkas_beasiswa != '') {
            $cek_beasiswa = Auth::user()->berkas_beasiswa;
        } elseif ($request->beasiswa == 'Tidak') {
            $cek_beasiswa = null;
        } elseif ($beasiswa != '' && $request->beasiswa != 'Tidak') {
            $berkas_beasiswa = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $beasiswa->getClientOriginalName();
            $cek_beasiswa = 'uploads/beasiswa/' . $berkas_beasiswa;
            $beasiswa->move('uploads/beasiswa/', $berkas_beasiswa);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Bukti Beasiswa!');
        }

        if ($kk == '' && Auth::user()->berkas_kk != '') {
            $cek_kk = Auth::user()->berkas_kk;
        } elseif ($kk != '') {
            $berkas_kk = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $kk->getClientOriginalName();
            $cek_kk = 'uploads/kartu_keluarga/' . $berkas_kk;
            $kk->move('uploads/kartu_keluarga/', $berkas_kk);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Kartu Keluarga!');
        }

        if ($ijasah == '' && Auth::user()->berkas_ijasah != '') {
            $cek_ijasah = Auth::user()->berkas_ijasah;
        } elseif ($ijasah != '') {
            $berkas_ijasah = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $ijasah->getClientOriginalName();
            $cek_ijasah = 'uploads/ijasah/' . $berkas_ijasah;
            $ijasah->move('uploads/ijasah/', $berkas_ijasah);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Ijasah');
        }


        TemPribadi::create([
            'user_id' => $request->id,
            'pribadi_id' => $request->pribadi_id,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jk' => $request->jk,
            'nokk' => $request->nokk,
            'nik' => $request->nik,
            'agama' => $request->agama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kelurahan' => $request->kelurahan,
            'tmp_tinggal' => $request->tmp_tinggal,
            'transport' => $request->transport,
            'anak_ke' => $request->anak_ke,
            'no_tlp' => $request->no_tlp,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'beasiswa' => $request->beasiswa,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'berkas_kk' => $cek_kk,
            'berkas_beasiswa' => $cek_beasiswa,
            'berkas_ijasah' => $cek_ijasah,
        ]);

        $siswa = Pribadi::where('user_id', Auth::user()->id)->first();
        $siswa_data = [
            'status' => $request->status,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('pribadi.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function updateSiswa(Request $request)
    {
        $pribadi = TemPribadi::where('user_id', Auth::user()->id)->firstWhere('status', 'Pending');

        $beasiswa = $request->berkas_beasiswa;
        $kk = $request->berkas_kk;
        $ijasah = $request->berkas_ijasah;

        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'agama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kelurahan' => 'required',
            'tmp_tinggal' => 'required',
            'transport' => 'required',
            'anak_ke' => 'required',
            'no_tlp' => 'required',
            'beasiswa' => 'required',
            'berkas_kk' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_ijasah' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_beasiswa' => 'mimes:png,jpg,jpeg|max:1100',
        ]);

        $email = Auth::user()->email;
        $kelas = Auth::user()->kelas->nama_kelas;

        if ($beasiswa != '' && $request->beasiswa != 'Tidak') {
                $berkas_beasiswa = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $beasiswa->getClientOriginalName();
                $cek_beasiswa = 'uploads/beasiswa/' . $berkas_beasiswa;
                $beasiswa->move('uploads/beasiswa/', $berkas_beasiswa);
        } elseif ($request->beasiswa == 'Tidak') {
            $cek_beasiswa = null;
        } elseif ($beasiswa == '' && $pribadi->berkas_beasiswa != '') {
            $cek_beasiswa = $pribadi->berkas_beasiswa;
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Bukti Beasiswa!');
        }

        if ($kk == '' && $pribadi->berkas_kk != '') {
            $cek_kk = $pribadi->berkas_kk;
        } elseif ($kk != '') {
            $berkas_kk = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $kk->getClientOriginalName();
            $cek_kk = 'uploads/kartu_keluarga/' . $berkas_kk;
            $kk->move('uploads/kartu_keluarga/', $berkas_kk);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Kartu Keluarga!');
        }

        if ($ijasah == '' && $pribadi->berkas_ijasah != '') {
            $cek_ijasah = $pribadi->berkas_ijasah;
        } elseif ($ijasah != '') {
            $berkas_ijasah = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $ijasah->getClientOriginalName();
            $cek_ijasah = 'uploads/ijasah/' . $berkas_ijasah;
            $ijasah->move('uploads/ijasah/', $berkas_ijasah);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Ijasah');
        }

        $pribadi_data = [
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jk' => $request->jk,
            'nokk' => $request->nokk,
            'nik' => $request->nik,
            'agama' => $request->agama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kelurahan' => $request->kelurahan,
            'tmp_tinggal' => $request->tmp_tinggal,
            'transport' => $request->transport,
            'anak_ke' => $request->anak_ke,
            'no_tlp' => $request->no_tlp,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'beasiswa' => $request->beasiswa,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'berkas_kk' => $cek_kk,
            'berkas_beasiswa' => $cek_beasiswa,
            'berkas_ijasah' => $cek_ijasah,
        ];

        $pribadi->update($pribadi_data);

        return redirect()->route('pribadi.siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function delBerkasKK()
    {

        $siswa = TemPribadi::where('user_id', Auth::user()->id)->first();
        $del = Auth::user()->berkas_kk;
        $siswa_data = [
            'berkas_kk' => $del,
        ];
        $siswa->update($siswa_data);

        return view('siswa.pribadi.editTem');
    }

    public function verifPribadi()
    {

        $siswa = Pribadi::where('user_id', Auth::user()->id)->first();
        $statusData = 'Data Sudah Benar';
        $siswa_data = [
            'status' => $statusData,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('pribadi.siswa')->with('success', 'Data Sudah Diverifikasi!');
    }

    public function excelPribadi()
    {
        $filepath = public_path('uploads/data_import/IM_PRIBADI.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_PRIBADI.xls', $headers);
    }

    public function create()
    {
        $user = User::OrderBy('name')->where('role','Siswa')->get();
        $pribadi = Pribadi::all();
        return view('admin.pribadi.tambah', compact('user','pribadi'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $pribadi = Pribadi::findorfail($id);
        return view('admin.pribadi.edit', compact('pribadi'));
    }

    public function store(Request $request)
    {
        $beasiswa = $request->berkas_beasiswa;
        $kk = $request->berkas_kk;
        $ijasah = $request->berkas_ijasah;

        $user = User::where('id', $request->nama)->first();
        $kelas_id = $user->kelas->nama_kelas;
        $email_id = $user->email;
        $kelas = $user->kelas_id;

        $this->validate($request, [
            'nama' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kelurahan' => 'required',
            'tmp_tinggal' => 'required',
            'transport' => 'required',
            'anak_ke' => 'required',
            'no_tlp' => 'required',
            'beasiswa' => 'required',
            'berkas_kk' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_ijasah' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_beasiswa' => 'mimes:png,jpg,jpeg|max:1100',
        ]);
       
        if ($request->beasiswa == 'Tidak') {
            $cek_beasiswa = null;
        } elseif ($beasiswa == '' && $user->berkas_beasiswa != '') {
            $cek_beasiswa = $user->berkas_beasiswa;
        } elseif ($beasiswa != '' && $request->beasiswa != 'Tidak') {
            $berkas_beasiswa = $kelas_id . "_" . $email_id . "_" . date('s' . 'd') . "_" . $beasiswa->getClientOriginalName();
            $cek_beasiswa = 'uploads/beasiswa/' . $berkas_beasiswa;
            $beasiswa->move('uploads/beasiswa/', $berkas_beasiswa);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Bukti Beasiswa!');
        }

        if ($kk == '' && $user->berkas_kk != '') {
            $cek_kk = $user->berkas_kk;
        } elseif ($kk != '') {
            $berkas_kk = $kelas_id . "_" . $email_id . "_" . $kk->getClientOriginalName();
            $cek_kk = 'uploads/kartu_keluarga/' . $berkas_kk;
            $kk->move('uploads/kartu_keluarga/', $berkas_kk);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Kartu Keluarga!');
        }

        if ($ijasah == '' && $user->berkas_ijasah != '') {
            $cek_ijasah = $user->berkas_ijasah;
        } elseif ($ijasah != '') {
            $berkas_ijasah = $kelas_id . "_" . $email_id . "_" . $ijasah->getClientOriginalName();
            $cek_ijasah = 'uploads/ijasah/' . $berkas_ijasah;
            $ijasah->move('uploads/ijasah/', $berkas_ijasah);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Ijasah');
        }

        $user_data = [
            'berkas_kk' => $cek_kk,
            'berkas_beasiswa' => $cek_beasiswa,
            'berkas_ijasah' => $cek_ijasah,
        ];
        $user->update($user_data);

        Pribadi::create([
            'user_id' => $request->nama,
            'kelas_id' => $kelas,
            'jk' => $request->jk,
            'nokk' => $request->nokk,
            'nik' => $request->nik,
            'agama' => $request->agama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kelurahan' => $request->kelurahan,
            'tmp_tinggal' => $request->tmp_tinggal,
            'transport' => $request->transport,
            'anak_ke' => $request->anak_ke,
            'no_tlp' => $request->no_tlp,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'beasiswa' => $request->beasiswa,            
        ]);

        return redirect()->route('pribadi.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function update(Request $request, $id)
    {
        $beasiswa = $request->berkas_beasiswa;
        $kk = $request->berkas_kk;
        $ijasah = $request->berkas_ijasah;

        $siswa = Pribadi::findorfail($id);
        $user = User::where('id', $siswa->user_id)->first();

        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'agama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kelurahan' => 'required',
            'tmp_tinggal' => 'required',
            'transport' => 'required',
            'anak_ke' => 'required',
            'no_tlp' => 'required',
            'beasiswa' => 'required',
            'berkas_kk' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_ijasah' => 'mimes:png,jpg,jpeg|max:1100',
            'berkas_beasiswa' => 'mimes:png,jpg,jpeg|max:1100',
        ]);

        $email = $user->email;
        $kelas = $user->kelas;

        if ($beasiswa != '' && $request->beasiswa != 'Tidak') {
            $berkas_beasiswa = $kelas . "_" . $email . "_" . date('s' . 'd') . "_" . $beasiswa->getClientOriginalName();
            $cek_beasiswa = 'uploads/beasiswa/' . $berkas_beasiswa;
            $beasiswa->move('uploads/beasiswa/', $berkas_beasiswa);
        } elseif ($request->beasiswa == 'Tidak') {
            $cek_beasiswa = null;
        } elseif ($beasiswa == '' && $user->berkas_beasiswa != '') {
            $cek_beasiswa = $user->berkas_beasiswa;
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Bukti Beasiswa!');
        }

        if ($kk == '' && $user->berkas_kk != '') {
            $cek_kk = $user->berkas_kk;
        } elseif ($kk != '') {
            $berkas_kk = $kelas . "_" . $email . "_" . $kk->getClientOriginalName();
            $cek_kk = 'uploads/kartu_keluarga/' . $berkas_kk;
            $kk->move('uploads/kartu_keluarga/', $berkas_kk);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Kartu Keluarga!');
        }

        if ($ijasah == '' && $user->berkas_ijasah != '') {
            $cek_ijasah = $user->berkas_ijasah;
        } elseif ($ijasah != '') {
            $berkas_ijasah = $kelas . "_" . $email . "_" . $ijasah->getClientOriginalName();
            $cek_ijasah = 'uploads/ijasah/' . $berkas_ijasah;
            $ijasah->move('uploads/ijasah/', $berkas_ijasah);
        } else {
            return redirect()->back()->with('error', 'Mohon Upload Berkas Ijasah');
        }

        $siswa_data = [
            'jk' => $request->jk,
            'nokk' => $request->nokk,
            'nik' => $request->nik,
            'agama' => $request->agama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kelurahan' => $request->kelurahan,
            'tmp_tinggal' => $request->tmp_tinggal,
            'transport' => $request->transport,
            'anak_ke' => $request->anak_ke,
            'no_tlp' => $request->no_tlp,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'beasiswa' => $request->beasiswa,
            'keterangan' => $request->keterangan,
        ];
        $siswa->update($siswa_data);

        $user_data = [
            'email' => $request->nisn,
            'name' => $request->nama,
            'kelas' => $request->kelas,
            'berkas_kk' => $cek_kk,
            'berkas_beasiswa' => $cek_beasiswa,
            'berkas_ijasah' => $cek_ijasah,
        ];
        $user->update($user_data);

        return redirect()->route('pribadi.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = Pribadi::findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Data Pribadi berhasil dihapus secara permanent');
    }

}
