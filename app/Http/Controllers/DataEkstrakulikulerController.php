<?php

namespace App\Http\Controllers;

use App\DataEkstrakulikuler;
use App\Ekstrakulikuler;
use App\Exports\AbsenEkstra;
use App\Exports\AbsenEkstraExport;
use App\Exports\dataEkstra;
use App\Exports\DataEkstraExport;
use App\Exports\EkstrakulikulerExport;
use App\Imports\DataEkstraImport;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataEkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekstra = DataEkstrakulikuler::OrderBy('nama_ekstra','asc')->get();
        return view('admin.ekstrakulikuler.index', compact('ekstra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ekstra = DataEkstrakulikuler::all();
        $user = User::OrderBy('name','asc')->where('role', 'Guru')->get();
        return view('admin.ekstrakulikuler.tambah', compact('ekstra', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_ekstra' => 'required',
            'user_id' => 'required',
            'jenis_ekstra' => 'required',
        ]);

        DataEkstrakulikuler::create([
            'nama_ekstra' => $request->nama_ekstra,
            'user_id' => $request->user_id,
            'jenis_ekstra' => $request->jenis_ekstra,
        ]);

        return redirect()->route('DataEkstrakulikuler.index')->with('success', 'Data Ekstra berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataEkstrakulikuler  $dataEkstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function show(DataEkstrakulikuler $dataEkstrakulikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataEkstrakulikuler  $dataEkstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $ekstra = DataEkstrakulikuler::findorfail($id);
        $user = User::OrderBy('name','asc')->where('role', 'Guru')->get();
        return view('admin.ekstrakulikuler.edit', compact('ekstra', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataEkstrakulikuler  $dataEkstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ekstra = DataEkstrakulikuler::findorfail($id);

        $this->validate($request, [
            'nama_ekstra' => 'required',
            'user_id' => 'required',
            'jenis_ekstra' => 'required',
        ]);
        $ekstra_data = [
            'nama_ekstra' => $request->nama_ekstra,
            'user_id' => $request->user_id,
            'jenis_ekstra' => $request->jenis_ekstra,
        ];
        $ekstra->update($ekstra_data);

        return redirect()->route('DataEkstrakulikuler.index')->with('success', 'Data ekstra berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataEkstrakulikuler  $dataEkstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekstra = DataEkstrakulikuler::findorfail($id);
        $ekstra->forceDelete();
        return redirect()->back()->with('success', 'Data Ekstra berhasil dihapus secara permanent');
    }

    public function export_dataEkstra()
    {
        return Excel::download(new DataEkstraExport, 'DataEkstra.xlsx');
    }

    public function excelEkstra()
    {
        $filepath = public_path('uploads/data_import/IM_EKSTRA.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_EKSTRA.xls', $headers);
    }

    public function pembinaEkstra()
    {
        $user = Auth::user()->id;
        $ekstra = DataEkstrakulikuler::all()->where('user_id', $user);
        return view('guru.ekstrakulikuler.pembina', compact('ekstra'));
    }

    public function showDataEkstra($id)
    {
        $id = Crypt::decrypt($id);
        $ekstra = DataEkstrakulikuler::findorfail($id)->nama_ekstra;
        $pilihan1 = Ekstrakulikuler::all()->where('pilihan_1', $ekstra);
        $pilihan2 = Ekstrakulikuler::all()->where('pilihan_2', $ekstra);
        $pilihan3 = Ekstrakulikuler::all()->where('pilihan_3', $ekstra);
        $listSiswa = $pilihan1->union($pilihan2)->union($pilihan3)->sortBy('kelas_id');
        return view('guru.ekstrakulikuler.show', compact('ekstra','listSiswa'));
    }

    public function export_AbsenEkstra($id)
    {
        return Excel::download(new AbsenEkstraExport($id), 'Absen Ekstra '.$id.'.xlsx');
    }
    
}
