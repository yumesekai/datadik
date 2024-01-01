<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::OrderBy('angkatan','asc')->OrderBy('nama_kelas','asc')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.tambah', compact('kelas'));
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
            'nama_kelas' => 'required',
            'angkatan' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'angkatan' => $request->angkatan,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);
        return view('admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findorfail($id);

        $this->validate($request, [
            'nama_kelas' => 'required',
            'angkatan' => 'required',
        ]);
        $kelas_data = [
            'nama_kelas' => $request->nama_kelas,
            'angkatan' => $request->angkatan,
        ];
        $kelas->update($kelas_data);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $kelas->forceDelete();
        return redirect()->back()->with('success', 'Data Kelas berhasil dihapus secara permanent');
    }

    public function excelKelas()
    {
        $filepath = public_path('uploads/data_import/IM_KELAS.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_KELAS.xls', $headers);
    }
}
