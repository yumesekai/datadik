<?php

namespace App\Http\Controllers;

use App\User;
use App\Smp;
use App\TemSmp;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class TemSmpController extends Controller
{
    public function index()
    {
        $smp = Smp::all();
        $pending = TemSmp::all()->where('status', 'Pending');
        $approved = TemSmp::all()->whereNotIn('status','Pending');
        
        return view('admin.TemSmp.index', compact('smp','pending','approved'));
    }

    public function edit($id)
    {
        
            $id = Crypt::decrypt($id);
            $smp = Smp::find($id);
            $tem_smp = TemSmp::findorfail($id);
            return view('admin.TemSmp.edit', compact('smp','tem_smp'));
    }

    public function update(Request $request, $id)
    {
        
            $TemSmp = TemSmp::findorfail($id);
            $smp = Smp::where('id', $TemSmp->smp_id)->first();
            
            $this->validate($request, [
                'sekolah_asal' => 'required',
                'no_ijasah' => 'required',
                'no_skhun' => 'required',
            ]);

            if($request->status == 'Setujui'){
                $smp_data = [
                    'sekolah_asal' => $request->sekolah_asal,
                    'no_un' => $request->no_un,
                    'no_ijasah' => $request->no_ijasah,
                    'no_skhun' => $request->no_skhun,
                    'status' => $request->status,          
                ];
                $smp->update($smp_data);
    
                $TemSmp_data = [
                    'status' => $request->status,
                    'keterangan' => $request->ket,
                ];
                $TemSmp->update($TemSmp_data);
            }else{
                $smp_data = [
                    'status' => $request->status,          
                ];
                $smp->update($smp_data);

                $TemSmp_data = [
                   
                    'status' => $request->status,
                    'keterangan' => $request->ket,
                ];
                $TemSmp->update($TemSmp_data);
            }
            
            return redirect()->route('TemSmp.index')->with('success', 'Data SMP berhasil diperbarui!');
    }
}
