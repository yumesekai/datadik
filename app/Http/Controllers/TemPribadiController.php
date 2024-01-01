<?php

namespace App\Http\Controllers;

use App\User;
use App\Pribadi;
use App\TemPribadi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class TemPribadiController extends Controller
{
    public function index()
    {
        $pribadi = Pribadi::all();
        $pending = TemPribadi::all()->where('status', 'Pending');
        $approved = TemPribadi::all()->whereNotIn('status','Pending');
        
        return view('admin.TemPribadi.index', compact('pribadi','pending','approved'));
    }

    public function edit($id)
    {
        
            $id = Crypt::decrypt($id);
            $pribadi = Pribadi::find($id);
            $tem_pribadi = TemPribadi::findorfail($id);
            return view('admin.TemPribadi.edit', compact('pribadi','tem_pribadi'));
    }

    public function update(Request $request, $id)
    {
        
            $TemPribadi = TemPribadi::findorfail($id);
            $pribadi = Pribadi::where('id', $TemPribadi->pribadi_id)->first();
            $user = User::where('id', $TemPribadi->user_id)->first();
            
            $this->validate($request, [
                'nisn' => 'required',
                'nama' => 'required',
                // 'kelas' => 'required',
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
                'status' => 'required',
            ]);

            if($request->status == 'Setujui'){
                $pribadi_data = [
               
                    'jk' => $request->jk,
                    'nokk' => $request->nokk,
                    'nik' => $request->nik,
                    'agama' => $request->agama,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'desa' => $request->desa,
                    'keluarahan' => $request->keluarahan,
                    'tmp_tinggal' => $request->tmp_tinggal,
                    'transport' => $request->transport,
                    'anak_ke' => $request->anak_ke,
                    'no_tlp' => $request->no_tlp,
                    'no_hp' => $request->no_hp,
                    'email' => $request->email,
                    'beasiswa' => $request->beasiswa,
                    'status' => $request->status,
              
                ];
                $pribadi->update($pribadi_data);
    
                $user_data = [
                   
                    'nisn' => $request->email,
                    'name' => $request->nama,
                    'berkas_beasiswa' => $request->berkas_beasiswa,
                    'berkas_ijasah' => $request->berkas_ijasah,
                    'berkas_kk' => $request->berkas_kk,
                ];
                $user->update($user_data);
    
                $TemPribadi_data = [
                   
                    'status' => $request->status,
                    'keterangan' => $request->ket,
                ];
                $TemPribadi->update($TemPribadi_data);
            }else{
                $pribadi_data = [
                    'status' => $request->status,
                ];
                $pribadi->update($pribadi_data);

                $TemPribadi_data = [
                   
                    'status' => $request->status,
                    'keterangan' => $request->ket,
                ];
                $TemPribadi->update($TemPribadi_data);
            }
            

            return redirect()->route('TemPribadi.index')->with('success', 'Data siswa berhasil diperbarui!');
    }
}
