<?php

namespace App\Http\Controllers;

use App\User;
use App\Orangtua;
use App\TemOrangtua;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class TemOrangtuaController extends Controller
{
    public function index()
    {
        $orangtua = Orangtua::all();
        $pending = TemOrangtua::all()->where('status', 'Pending');
        $approved = TemOrangtua::all()->whereNotIn('status', 'Pending');

        return view('admin.TemOrangtua.index', compact('orangtua', 'pending', 'approved'));
    }

    public function edit($id)
    {

        $id = Crypt::decrypt($id);
        $tem_orangtua = TemOrangtua::findorfail($id);
        return view('admin.TemOrangtua.edit', compact('tem_orangtua'));
    }

    public function update(Request $request, $id)
    {

        $TemOrangtua = TemOrangtua::findorfail($id);
        $orangtua = Orangtua::where('id', $TemOrangtua->orangtua_id)->first();
        
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

        if ($request->status == 'Setujui') {
            $orangtua_data = [
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
            ];
            $orangtua->update($orangtua_data);

            $TemOrangtua_data = [

                'status' => $request->status,
                'keterangan' => $request->ket,
            ];
            $TemOrangtua->update($TemOrangtua_data);
        } else {
            $orangtua_data = [
                'status' => $request->status,
            ];
            $orangtua->update($orangtua_data);

            $TemOrangtua_data = [

                'status' => $request->status,
                'keterangan' => $request->ket,
            ];
            $TemOrangtua->update($TemOrangtua_data);
        }


        return redirect()->route('TemOrangtua.index')->with('success', 'Data siswa berhasil diperbarui!');
    }
}
