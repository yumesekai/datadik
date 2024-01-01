<?php

namespace App\Http\Controllers;

use App\User;
use App\Priodik;
use App\TemPriodik;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class TemPriodikController extends Controller
{
    public function index()
    {
        $priodik = Priodik::all();
        $pending = TemPriodik::all()->where('status', 'Pending');
        $approved = TemPriodik::all()->whereNotIn('status', 'Pending');

        return view('admin.TemPriodik.index', compact('priodik', 'pending', 'approved'));
    }

    public function edit($id)
    {

        $id = Crypt::decrypt($id);
        $priodik = Priodik::find($id);
        $tem_priodik = TemPriodik::findorfail($id);
        return view('admin.TemPriodik.edit', compact('priodik', 'tem_priodik'));
    }

    public function update(Request $request, $id)
    {

        $TemPriodik = TemPriodik::findorfail($id);
        $priodik = Priodik::where('id', $TemPriodik->priodik_id)->first();
        
        $this->validate($request, [
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_sekolah' => 'required',
            'jumlah_saudara' => 'required',
        ]);

        if ($request->status == 'Setujui') {
            $priodik_data = [
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'jarak_sekolah' => $request->jarak_sekolah,
                'jumlah_saudara' => $request->jumlah_saudara,
                'status' => $request->status,
            ];
            $priodik->update($priodik_data);

            $TemPriodik_data = [
                'status' => $request->status,
                'keterangan' => $request->ket,
            ];
            $TemPriodik->update($TemPriodik_data);
        } else {
            $priodik_data = [
                'status' => $request->status,
            ];
            $priodik->update($priodik_data);

            $TemPriodik_data = [

                'status' => $request->status,
                'keterangan' => $request->ket,
            ];
            $TemPriodik->update($TemPriodik_data);
        }


        return redirect()->route('TemPriodik.index')->with('success', 'Data Priodik berhasil diperbarui!');
    }
}
