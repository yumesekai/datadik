<?php

namespace App\Http\Controllers;

use App\DataEkstrakulikuler;
use App\LaporanEkskul;
use App\RekapBulananEkskul;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class LaporanEkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        // $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-m-Y');
        $ekskul = LaporanEkskul::all()->where('user_id', $user)->sortByDesc('tgl_pelaksanaan_m1');
        $ekskul_full = LaporanEkskul::all()->sortByDesc('tgl_pelaksanaan_m1');
        return view('guru.ekstrakulikuler.laporan.index', compact('ekskul', 'ekskul_full'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laporan = LaporanEkskul::all();
        $ekskul = DataEkstrakulikuler::OrderBy('nama_ekstra')->get();
        $user = User::OrderBy('name')->where('role','Guru')->get();
        //$user = Auth::user()->id;
        return view('guru.ekstrakulikuler.laporan.tambah', compact('laporan', 'ekskul', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto_m1 = $request->foto_ekskul_m1;
        $foto_m2 = $request->foto_ekskul_m2;
        $foto_m3 = $request->foto_ekskul_m3;
        $foto_m4 = $request->foto_ekskul_m4;
        $pembina = User::where('id', $request->pembina_ekskul)->value('name');

        switch ($request->jml_kegiatan ) {
            case '1':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');
                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Minggu Pertama!');
                }
                         
                LaporanEkskul::create([
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
                ]);
        
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            case '2':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                    
                    'kegiatan_ekskul_m2' => 'required',
                    'tgl_pelaksanaan_m2' => 'required',
                    'tmp_pelaksanaan_m2' => 'required',
                    'jml_peserta_m2' => 'required',
                    'foto_ekskul_m2' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 != '' && $foto_m2 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');

                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);

                    $foto_ekskul_m2 = $email . "_" . $priode . "_" . $foto_m2->getClientOriginalName();
                    $cek_foto_m2 = 'uploads/laporan_ekstra/' . $foto_ekskul_m2;
                    $foto_m2->move('uploads/laporan_ekstra/', $foto_ekskul_m2);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }
        
                LaporanEkskul::create([
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
        
                    'kegiatan_ekskul_m2' => $request->kegiatan_ekskul_m2,
                    'tgl_pelaksanaan_m2' => $request->tgl_pelaksanaan_m2,
                    'tmp_pelaksanaan_m2' => $request->tmp_pelaksanaan_m2,
                    'jml_peserta_m2' => $request->jml_peserta_m2,
                    'foto_ekskul_m2' => $cek_foto_m2,
                ]);
        
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            case '3':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                    
                    'kegiatan_ekskul_m2' => 'required',
                    'tgl_pelaksanaan_m2' => 'required',
                    'tmp_pelaksanaan_m2' => 'required',
                    'jml_peserta_m2' => 'required',
                    'foto_ekskul_m2' => 'mimes:png,jpg,jpeg|max:1100',

                    'kegiatan_ekskul_m3' => 'required',
                    'tgl_pelaksanaan_m3' => 'required',
                    'tmp_pelaksanaan_m3' => 'required',
                    'jml_peserta_m3' => 'required',
                    'foto_ekskul_m3' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 != '' && $foto_m2 != '' && $foto_m3 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');

                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);

                    $foto_ekskul_m2 = $email . "_" . $priode . "_" . $foto_m2->getClientOriginalName();
                    $cek_foto_m2 = 'uploads/laporan_ekstra/' . $foto_ekskul_m2;
                    $foto_m2->move('uploads/laporan_ekstra/', $foto_ekskul_m2);

                    $foto_ekskul_m3 = $email . "_" . $priode . "_" . $foto_m3->getClientOriginalName();
                    $cek_foto_m3 = 'uploads/laporan_ekstra/' . $foto_ekskul_m3;
                    $foto_m3->move('uploads/laporan_ekstra/', $foto_ekskul_m3);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Minggu Pertama!');
                }
        
                LaporanEkskul::create([
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
        
                    'kegiatan_ekskul_m2' => $request->kegiatan_ekskul_m2,
                    'tgl_pelaksanaan_m2' => $request->tgl_pelaksanaan_m2,
                    'tmp_pelaksanaan_m2' => $request->tmp_pelaksanaan_m2,
                    'jml_peserta_m2' => $request->jml_peserta_m2,
                    'foto_ekskul_m2' => $cek_foto_m2,
        
                    'kegiatan_ekskul_m3' => $request->kegiatan_ekskul_m3,
                    'tgl_pelaksanaan_m3' => $request->tgl_pelaksanaan_m3,
                    'tmp_pelaksanaan_m3' => $request->tmp_pelaksanaan_m3,
                    'jml_peserta_m3' => $request->jml_peserta_m3,
                    'foto_ekskul_m3' => $cek_foto_m3,
                ]);
        
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            case '4':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                    
                    'kegiatan_ekskul_m2' => 'required',
                    'tgl_pelaksanaan_m2' => 'required',
                    'tmp_pelaksanaan_m2' => 'required',
                    'jml_peserta_m2' => 'required',
                    'foto_ekskul_m2' => 'mimes:png,jpg,jpeg|max:1100',

                    'kegiatan_ekskul_m3' => 'required',
                    'tgl_pelaksanaan_m3' => 'required',
                    'tmp_pelaksanaan_m3' => 'required',
                    'jml_peserta_m3' => 'required',
                    'foto_ekskul_m3' => 'mimes:png,jpg,jpeg|max:1100',

                    'kegiatan_ekskul_m4' => 'required',
                    'tgl_pelaksanaan_m4' => 'required',
                    'tmp_pelaksanaan_m4' => 'required',
                    'jml_peserta_m4' => 'required',
                    'foto_ekskul_m4' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 != '' && $foto_m2 != '' && $foto_m3 != '' && $foto_m4 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');

                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);

                    $foto_ekskul_m2 = $email . "_" . $priode . "_" . $foto_m2->getClientOriginalName();
                    $cek_foto_m2 = 'uploads/laporan_ekstra/' . $foto_ekskul_m2;
                    $foto_m2->move('uploads/laporan_ekstra/', $foto_ekskul_m2);

                    $foto_ekskul_m3 = $email . "_" . $priode . "_" . $foto_m3->getClientOriginalName();
                    $cek_foto_m3 = 'uploads/laporan_ekstra/' . $foto_ekskul_m3;
                    $foto_m3->move('uploads/laporan_ekstra/', $foto_ekskul_m3);

                    $foto_ekskul_m4 = $email . "_" . $priode . "_" . $foto_m4->getClientOriginalName();
                    $cek_foto_m4 = 'uploads/laporan_ekstra/' . $foto_ekskul_m4;
                    $foto_m4->move('uploads/laporan_ekstra/', $foto_ekskul_m4);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Minggu Pertama!');
                }
        
                LaporanEkskul::create([
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
        
                    'kegiatan_ekskul_m2' => $request->kegiatan_ekskul_m2,
                    'tgl_pelaksanaan_m2' => $request->tgl_pelaksanaan_m2,
                    'tmp_pelaksanaan_m2' => $request->tmp_pelaksanaan_m2,
                    'jml_peserta_m2' => $request->jml_peserta_m2,
                    'foto_ekskul_m2' => $cek_foto_m2,
        
                    'kegiatan_ekskul_m3' => $request->kegiatan_ekskul_m3,
                    'tgl_pelaksanaan_m3' => $request->tgl_pelaksanaan_m3,
                    'tmp_pelaksanaan_m3' => $request->tmp_pelaksanaan_m3,
                    'jml_peserta_m3' => $request->jml_peserta_m3,
                    'foto_ekskul_m3' => $cek_foto_m3,
        
                    'kegiatan_ekskul_m4' => $request->kegiatan_ekskul_m4,
                    'tgl_pelaksanaan_m4' => $request->tgl_pelaksanaan_m4,
                    'tmp_pelaksanaan_m4' => $request->tmp_pelaksanaan_m4,
                    'jml_peserta_m4' => $request->jml_peserta_m4,
                    'foto_ekskul_m4' => $cek_foto_m4,
                ]);
        
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            default:
                return redirect()->back()->with('error', 'Data Laporan Gagal Diinput');
                break;
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $laporan = LaporanEkskul::findorfail($id);
        $ekskul = DataEkstrakulikuler::OrderBy('nama_ekstra')->get();
        $user = User::OrderBy('name')->where('role','Guru')->get();
        return view('guru.ekstrakulikuler.laporan.edit', compact('laporan', 'ekskul', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $laporan = LaporanEkskul::findorfail($id);
        $laporan_cek = LaporanEkskul::where('id', $id)->first();
        $foto_m1 = $request->foto_ekskul_m1;
        $foto_m2 = $request->foto_ekskul_m2;
        $foto_m3 = $request->foto_ekskul_m3;
        $foto_m4 = $request->foto_ekskul_m4;
        $pembina = User::where('id', $request->pembina_ekskul)->value('name');

        switch ($request->jml_kegiatan ) {
            case '1':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 == '' && $laporan_cek->foto_ekskul_m1 != '') {
                    $cek_foto_m1 = $laporan_cek->foto_ekskul_m1;
                }else if ($foto_m1 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');
                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }
                         
                $data_laporan = [
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,

                    'kegiatan_ekskul_m2' => $laporan_cek->kegiatan_ekskul_m2 = NULL,
                    'tgl_pelaksanaan_m2' => $laporan_cek->tgl_pelaksanaan_m2 = NULL,
                    'tmp_pelaksanaan_m2' => $laporan_cek->tmp_pelaksanaan_m2 = NULL,
                    'jml_peserta_m2' => $laporan_cek->jml_peserta_m2 = NULL,
                    'foto_ekskul_m2' => $cek_foto_m2 = NULL,
        
                    'kegiatan_ekskul_m3' => $laporan_cek->kegiatan_ekskul_m3 = NULL,
                    'tgl_pelaksanaan_m3' => $laporan_cek->tgl_pelaksanaan_m3 = NULL,
                    'tmp_pelaksanaan_m3' => $laporan_cek->tmp_pelaksanaan_m3 = NULL,
                    'jml_peserta_m3' => $laporan_cek->jml_peserta_m3 = NULL,
                    'foto_ekskul_m3' => $cek_foto_m3 = NULL,
        
                    'kegiatan_ekskul_m4' => $laporan_cek->kegiatan_ekskul_m4 = NULL,
                    'tgl_pelaksanaan_m4' => $laporan_cek->tgl_pelaksanaan_m4 = NULL,
                    'tmp_pelaksanaan_m4' => $laporan_cek->tmp_pelaksanaan_m4 = NULL,
                    'jml_peserta_m4' => $laporan_cek->jml_peserta_m4 = NULL,
                    'foto_ekskul_m4' => $cek_foto_m4 = NULL,
                ];
                $laporan->update($data_laporan);

                return redirect()->route('LaporanEkskul.index')->with('success', 'Data siswa berhasil diperbarui!');
                break;
            case '2':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                    
                    'kegiatan_ekskul_m2' => 'required',
                    'tgl_pelaksanaan_m2' => 'required',
                    'tmp_pelaksanaan_m2' => 'required',
                    'jml_peserta_m2' => 'required',
                    'foto_ekskul_m2' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 == '' && $laporan_cek->foto_ekskul_m1 != '') {          
                    $cek_foto_m1 = $laporan_cek->foto_ekskul_m1;
                }else if ($foto_m1 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');

                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }

                if ($foto_m2 == '' && $laporan_cek->foto_ekskul_m2 != '') {
                    $cek_foto_m2 = $laporan_cek->foto_ekskul_m2;
                }else if ($foto_m2 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m2)->translatedFormat('d-F-Y');

                    $foto_ekskul_m2 = $email . "_" . $priode . "_" . $foto_m2->getClientOriginalName();
                    $cek_foto_m2 = 'uploads/laporan_ekstra/' . $foto_ekskul_m2;
                    $foto_m2->move('uploads/laporan_ekstra/', $foto_ekskul_m2);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }
        
        
                $data_laporan = [
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
        
                    'kegiatan_ekskul_m2' => $request->kegiatan_ekskul_m2,
                    'tgl_pelaksanaan_m2' => $request->tgl_pelaksanaan_m2,
                    'tmp_pelaksanaan_m2' => $request->tmp_pelaksanaan_m2,
                    'jml_peserta_m2' => $request->jml_peserta_m2,
                    'foto_ekskul_m2' => $cek_foto_m2,

                    'kegiatan_ekskul_m3' => $laporan_cek->kegiatan_ekskul_m3 = NULL,
                    'tgl_pelaksanaan_m3' => $laporan_cek->tgl_pelaksanaan_m3 = NULL,
                    'tmp_pelaksanaan_m3' => $laporan_cek->tmp_pelaksanaan_m3 = NULL,
                    'jml_peserta_m3' => $laporan_cek->jml_peserta_m3 = NULL,
                    'foto_ekskul_m3' => $cek_foto_m3 = NULL,
        
                    'kegiatan_ekskul_m4' => $laporan_cek->kegiatan_ekskul_m4 = NULL,
                    'tgl_pelaksanaan_m4' => $laporan_cek->tgl_pelaksanaan_m4 = NULL,
                    'tmp_pelaksanaan_m4' => $laporan_cek->tmp_pelaksanaan_m4 = NULL,
                    'jml_peserta_m4' => $laporan_cek->jml_peserta_m4 = NULL,
                    'foto_ekskul_m4' => $cek_foto_m4 = NULL,
                ];
                $laporan->update($data_laporan);
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            case '3':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                    
                    'kegiatan_ekskul_m2' => 'required',
                    'tgl_pelaksanaan_m2' => 'required',
                    'tmp_pelaksanaan_m2' => 'required',
                    'jml_peserta_m2' => 'required',
                    'foto_ekskul_m2' => 'mimes:png,jpg,jpeg|max:1100',

                    'kegiatan_ekskul_m3' => 'required',
                    'tgl_pelaksanaan_m3' => 'required',
                    'tmp_pelaksanaan_m3' => 'required',
                    'jml_peserta_m3' => 'required',
                    'foto_ekskul_m3' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 == '' && $laporan_cek->foto_ekskul_m1 != '') {          
                    $cek_foto_m1 = $laporan_cek->foto_ekskul_m1;
                }else if ($foto_m1 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');

                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }

                if ($foto_m2 == '' && $laporan_cek->foto_ekskul_m2 != '') {
                    $cek_foto_m2 = $laporan_cek->foto_ekskul_m2;
                }else if ($foto_m2 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m2)->translatedFormat('d-F-Y');

                    $foto_ekskul_m2 = $email . "_" . $priode . "_" . $foto_m2->getClientOriginalName();
                    $cek_foto_m2 = 'uploads/laporan_ekstra/' . $foto_ekskul_m2;
                    $foto_m2->move('uploads/laporan_ekstra/', $foto_ekskul_m2);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }
        
                if ($foto_m3 == '' && $laporan_cek->foto_ekskul_m3 != '') {
                    $cek_foto_m3 = $laporan_cek->foto_ekskul_m3;
                }else if ($foto_m3 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m3)->translatedFormat('d-F-Y');

                    $foto_ekskul_m3 = $email . "_" . $priode . "_" . $foto_m3->getClientOriginalName();
                    $cek_foto_m3 = 'uploads/laporan_ekstra/' . $foto_ekskul_m3;
                    $foto_m3->move('uploads/laporan_ekstra/', $foto_ekskul_m3);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Minggu Pertama!');
                }

                $data_laporan = [
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
        
                    'kegiatan_ekskul_m2' => $request->kegiatan_ekskul_m2,
                    'tgl_pelaksanaan_m2' => $request->tgl_pelaksanaan_m2,
                    'tmp_pelaksanaan_m2' => $request->tmp_pelaksanaan_m2,
                    'jml_peserta_m2' => $request->jml_peserta_m2,
                    'foto_ekskul_m2' => $cek_foto_m2,
        
                    'kegiatan_ekskul_m3' => $request->kegiatan_ekskul_m3,
                    'tgl_pelaksanaan_m3' => $request->tgl_pelaksanaan_m3,
                    'tmp_pelaksanaan_m3' => $request->tmp_pelaksanaan_m3,
                    'jml_peserta_m3' => $request->jml_peserta_m3,
                    'foto_ekskul_m3' => $cek_foto_m3,

                    'kegiatan_ekskul_m4' => $laporan_cek->kegiatan_ekskul_m4 = NULL,
                    'tgl_pelaksanaan_m4' => $laporan_cek->tgl_pelaksanaan_m4 = NULL,
                    'tmp_pelaksanaan_m4' => $laporan_cek->tmp_pelaksanaan_m4 = NULL,
                    'jml_peserta_m4' => $laporan_cek->jml_peserta_m4 = NULL,
                    'foto_ekskul_m4' => $cek_foto_m4 = NULL,
                ];
                $laporan->update($data_laporan);
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            case '4':
                $this->validate($request, [
                    'nama_ekskul' => 'required',
                    'pembina_ekskul' => 'required',
                    'jml_kegiatan' => 'required',
                    'kegiatan_ekskul_m1' => 'required',
                    'tgl_pelaksanaan_m1' => 'required',
                    'tmp_pelaksanaan_m1' => 'required',
                    'jml_peserta_m1' => 'required',
                    'foto_ekskul_m1' => 'mimes:png,jpg,jpeg|max:1100',
                    
                    'kegiatan_ekskul_m2' => 'required',
                    'tgl_pelaksanaan_m2' => 'required',
                    'tmp_pelaksanaan_m2' => 'required',
                    'jml_peserta_m2' => 'required',
                    'foto_ekskul_m2' => 'mimes:png,jpg,jpeg|max:1100',

                    'kegiatan_ekskul_m3' => 'required',
                    'tgl_pelaksanaan_m3' => 'required',
                    'tmp_pelaksanaan_m3' => 'required',
                    'jml_peserta_m3' => 'required',
                    'foto_ekskul_m3' => 'mimes:png,jpg,jpeg|max:1100',

                    'kegiatan_ekskul_m4' => 'required',
                    'tgl_pelaksanaan_m4' => 'required',
                    'tmp_pelaksanaan_m4' => 'required',
                    'jml_peserta_m4' => 'required',
                    'foto_ekskul_m4' => 'mimes:png,jpg,jpeg|max:1100',
                ]);

                if ($foto_m1 == '' && $laporan_cek->foto_ekskul_m1 != '') {          
                    $cek_foto_m1 = $laporan_cek->foto_ekskul_m1;
                }else if ($foto_m1 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m1)->translatedFormat('d-F-Y');

                    $foto_ekskul_m1 = $email . "_" . $priode . "_" . $foto_m1->getClientOriginalName();
                    $cek_foto_m1 = 'uploads/laporan_ekstra/' . $foto_ekskul_m1;
                    $foto_m1->move('uploads/laporan_ekstra/', $foto_ekskul_m1);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }

                if ($foto_m2 == '' && $laporan_cek->foto_ekskul_m2 != '') {
                    $cek_foto_m2 = $laporan_cek->foto_ekskul_m2;
                }else if ($foto_m2 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m2)->translatedFormat('d-F-Y');

                    $foto_ekskul_m2 = $email . "_" . $priode . "_" . $foto_m2->getClientOriginalName();
                    $cek_foto_m2 = 'uploads/laporan_ekstra/' . $foto_ekskul_m2;
                    $foto_m2->move('uploads/laporan_ekstra/', $foto_ekskul_m2);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Kegiatan!');
                }
        
                if ($foto_m3 == '' && $laporan_cek->foto_ekskul_m3 != '') {
                    $cek_foto_m3 = $laporan_cek->foto_ekskul_m3;
                }else if ($foto_m3 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m3)->translatedFormat('d-F-Y');

                    $foto_ekskul_m3 = $email . "_" . $priode . "_" . $foto_m3->getClientOriginalName();
                    $cek_foto_m3 = 'uploads/laporan_ekstra/' . $foto_ekskul_m3;
                    $foto_m3->move('uploads/laporan_ekstra/', $foto_ekskul_m3);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Minggu Pertama!');
                }
                
                if ($foto_m4 == '' && $laporan_cek->foto_ekskul_m4 != '') {
                    $cek_foto_m4 = $laporan_cek->foto_ekskul_m4;
                }else if ($foto_m4 != '') {
                    $email = Auth::user()->email;
                    $priode = Carbon::parse($request->tgl_pelaksanaan_m4)->translatedFormat('d-F-Y');

                    $foto_ekskul_m4 = $email . "_" . $priode . "_" . $foto_m4->getClientOriginalName();
                    $cek_foto_m4 = 'uploads/laporan_ekstra/' . $foto_ekskul_m4;
                    $foto_m4->move('uploads/laporan_ekstra/', $foto_ekskul_m4);
                } else {
                    return redirect()->back()->with('error', 'Mohon Upload Foto Minggu Pertama!');
                }
        
                $data_laporan = [
                    'user_id' => $request->pembina_ekskul,
                    'nama_ekskul' => $request->nama_ekskul,
                    'pembina_ekskul' => $pembina,
                    'jml_kegiatan' => $request->jml_kegiatan,
        
                    'kegiatan_ekskul_m1' => $request->kegiatan_ekskul_m1,
                    'tgl_pelaksanaan_m1' => $request->tgl_pelaksanaan_m1,
                    'tmp_pelaksanaan_m1' => $request->tmp_pelaksanaan_m1,
                    'jml_peserta_m1' => $request->jml_peserta_m1,
                    'foto_ekskul_m1' => $cek_foto_m1,
        
                    'kegiatan_ekskul_m2' => $request->kegiatan_ekskul_m2,
                    'tgl_pelaksanaan_m2' => $request->tgl_pelaksanaan_m2,
                    'tmp_pelaksanaan_m2' => $request->tmp_pelaksanaan_m2,
                    'jml_peserta_m2' => $request->jml_peserta_m2,
                    'foto_ekskul_m2' => $cek_foto_m2,
        
                    'kegiatan_ekskul_m3' => $request->kegiatan_ekskul_m3,
                    'tgl_pelaksanaan_m3' => $request->tgl_pelaksanaan_m3,
                    'tmp_pelaksanaan_m3' => $request->tmp_pelaksanaan_m3,
                    'jml_peserta_m3' => $request->jml_peserta_m3,
                    'foto_ekskul_m3' => $cek_foto_m3,
        
                    'kegiatan_ekskul_m4' => $request->kegiatan_ekskul_m4,
                    'tgl_pelaksanaan_m4' => $request->tgl_pelaksanaan_m4,
                    'tmp_pelaksanaan_m4' => $request->tmp_pelaksanaan_m4,
                    'jml_peserta_m4' => $request->jml_peserta_m4,
                    'foto_ekskul_m4' => $cek_foto_m4,
                ];
                $laporan->update($data_laporan);
                return redirect()->route('LaporanEkskul.index')->with('success', 'Data Kelas berhasil ditambah!');
                break;
            default:
                return redirect()->back()->with('error', 'Data Laporan Gagal Diinput');
                break;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = LaporanEkskul::findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Laporan berhasil dihapus secara permanent');
    }

    public function cetakLaporan($id)
    {
        $id = Crypt::decrypt($id);
        $laporan = LaporanEkskul::findorfail($id);

        $pdf = PDF::loadview('guru.ekstrakulikuler.laporan.cetak',['laporan'=>$laporan]);
	    return $pdf->stream();
    }

    public function rekap()
    {
        // $ekskul = Carbon::parse(RekapBulananEkskul::all()->bulan)->translatedFormat('F');

        $ekskul = RekapBulananEkskul::all()->sortBy('bulan');
        // $priode = Carbon::parse()->translatedFormat('d-F-Y');
        return view('guru.ekstrakulikuler.laporan.rekap', compact('ekskul'));
    }

    public function setRekap($id)
    {
        $id = Crypt::decrypt($id);
        $rekap = RekapBulananEkskul::findorfail($id);
        // $laporan_cek = LaporanEkskul::where('id', $id)->first();
        // $ekskul = RekapBulananEkskul::all()->sortBy('bulan');
        return view('guru.ekstrakulikuler.laporan.setRekap', compact('rekap'));
    }

    public function generateBulan()
    {

        for ($i=0; $i < 12; $i++) { 
            $y = new Carbon('2024-01-01');
            $b = $y->addMonthsWithoutOverflow($i);

            if ($b->endOfMonth()->isSunday()) {
               
                $sabtu_m1 = $b->subWeeks(4)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m1 = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m2 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m2   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m3 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m3   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m4 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m4   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m5 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m5   = $b->endOfWeek()->format('Y-m-d');

                RekapBulananEkskul::create([
                    'bulan' => $b,
                    'sabtu_m1' => $sabtu_m1,
                    'minggu_m1' => $minggu_m1,
                    'sabtu_m2' => $sabtu_m2,
                    'minggu_m2' => $minggu_m2,
                    'sabtu_m3' => $sabtu_m3,
                    'minggu_m3' => $minggu_m3,
                    'sabtu_m4' => $sabtu_m4,
                    'minggu_m4' => $minggu_m4,
                    'sabtu_m5' => $sabtu_m5,
                    'minggu_m5' => $minggu_m5,
                ]);
            }elseif ($b->endOfMonth()->isSaturday()) {
                $sabtu_m1 = $b->subWeeks(4)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m1 = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m2 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m2   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m3 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m3   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m4 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m4   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m5 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m5   = null;

                RekapBulananEkskul::create([
                    'bulan' => $b,
                    'sabtu_m1' => $sabtu_m1,
                    'minggu_m1' => $minggu_m1,
                    'sabtu_m2' => $sabtu_m2,
                    'minggu_m2' => $minggu_m2,
                    'sabtu_m3' => $sabtu_m3,
                    'minggu_m3' => $minggu_m3,
                    'sabtu_m4' => $sabtu_m4,
                    'minggu_m4' => $minggu_m4,
                    'sabtu_m5' => $sabtu_m5,
                    'minggu_m5' => $minggu_m5,
                ]);
            }elseif ($b->startOfMonth()->isSunday()) {
                $sabtu_m1 = NULL;
                $minggu_m1 = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m2 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m2   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m3 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m3   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m4 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m4   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m5 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m5   = $b->endOfWeek()->format('Y-m-d');

                RekapBulananEkskul::create([
                    'bulan' => $b,
                    'sabtu_m1' => $sabtu_m1,
                    'minggu_m1' => $minggu_m1,
                    'sabtu_m2' => $sabtu_m2,
                    'minggu_m2' => $minggu_m2,
                    'sabtu_m3' => $sabtu_m3,
                    'minggu_m3' => $minggu_m3,
                    'sabtu_m4' => $sabtu_m4,
                    'minggu_m4' => $minggu_m4,
                    'sabtu_m5' => $sabtu_m5,
                    'minggu_m5' => $minggu_m5,
                ]);
            }elseif ($b->startOfMonth()->isSaturday()) {
                $sabtu_m1 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m1 = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m2 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m2   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m3 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m3   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m4 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m4   = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m5 = $b->addWeeks(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m5   = $b->endOfWeek()->format('Y-m-d');

                RekapBulananEkskul::create([
                    'bulan' => $b,
                    'sabtu_m1' => $sabtu_m1,
                    'minggu_m1' => $minggu_m1,
                    'sabtu_m2' => $sabtu_m2,
                    'minggu_m2' => $minggu_m2,
                    'sabtu_m3' => $sabtu_m3,
                    'minggu_m3' => $minggu_m3,
                    'sabtu_m4' => $sabtu_m4,
                    'minggu_m4' => $minggu_m4,
                    'sabtu_m5' => $sabtu_m5,
                    'minggu_m5' => $minggu_m5,
                ]);
            }else {
                $sabtu_m1 = $b->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m1 = $b->endOfWeek()->format('Y-m-d');

                $sabtu_m2 = $b->addWeek(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m2   = $b->addWeek(0)->endOfWeek()->format('Y-m-d');

                $sabtu_m3 = $b->addWeek(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m3   = $b->addWeek(0)->endOfWeek()->format('Y-m-d');

                $sabtu_m4 = $b->addWeek(1)->endOfWeek()->subDays(1)->format('Y-m-d');
                $minggu_m4   = $b->addWeek(0)->endOfWeek()->format('Y-m-d');

                RekapBulananEkskul::create([
                    'bulan' => $b,
                    'sabtu_m1' => $sabtu_m1,
                    'minggu_m1' => $minggu_m1,
                    'sabtu_m2' => $sabtu_m2,
                    'minggu_m2' => $minggu_m2,
                    'sabtu_m3' => $sabtu_m3,
                    'minggu_m3' => $minggu_m3,
                    'sabtu_m4' => $sabtu_m4,
                    'minggu_m4' => $minggu_m4,
                ]);
            }       
        }
        return redirect()->back()->with('success', 'Laporan berhasil dihapus secara permanent');
    }

    public function cetakRekap($id)
    {
        $id = Crypt::decrypt($id);
        $rekap = RekapBulananEkskul::findorfail($id);
        $bulan = Carbon::parse($rekap->bulan)->translatedFormat('m');
        $laporan_all = LaporanEkskul::select("*")->whereMonth('tgl_pelaksanaan_m1', $bulan)->get()->sortByDesc('nama_ekskul');
        $pdf = PDF::loadview('guru.ekstrakulikuler.laporan.cetakRekap', ['laporan_all'=>$laporan_all], ['rekap'=>$rekap])->setPaper('A4','landscape');
	    return $pdf->stream();
    }
    
}
