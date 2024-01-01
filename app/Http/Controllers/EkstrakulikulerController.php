<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\DataEkstrakulikuler;
use App\Ekstrakulikuler;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekstra = Ekstrakulikuler::OrderBy('kelas_id')->get();
        return view('admin.EkstraSiswa.index', compact('ekstra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::OrderBy('name')->where('role', 'Siswa')->get();
        $DataEkstra = DataEkstrakulikuler::OrderBy('nama_ekstra')->get();
        return view('admin.EkstraSiswa.tambah', compact('user', 'DataEkstra'));
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
            'nama' => 'required',
            'pilihan_1' => 'required',
        ]);

        if ($request->pilihan_2 == $request->pilihan_1 || $request->pilihan_3 == $request->pilihan_1) {
            return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
        }elseif ($request->pilihan_2 == $request->pilihan_3) {
            if ($request->pilihan_3 == '') {
                Ekstrakulikuler::create([
                    'user_id' => $request->nama,
                    'pilihan_1' => $request->pilihan_1,
                    'pilihan_2' => $request->pilihan_2,
                    'pilihan_3' => $request->pilihan_3,
                ]);
        
                return redirect()->route('ekstrakulikuler.index')->with('success', 'Data siswa berhasil diperbarui!');
            }
            return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
        }else {
            Ekstrakulikuler::create([
                'user_id' => $request->nama,
                'pilihan_1' => $request->pilihan_1,
                'pilihan_2' => $request->pilihan_2,
                'pilihan_3' => $request->pilihan_3,
            ]);
    
            return redirect()->route('ekstrakulikuler.index')->with('success', 'Data siswa berhasil diperbarui!');
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $DataEkstra = DataEkstrakulikuler::OrderBy('nama_ekstra')->get();
        $ekstra = Ekstrakulikuler::findorfail($id);
        return view('admin.EkstraSiswa.edit', compact('ekstra', 'DataEkstra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ekstra = Ekstrakulikuler::findorfail($id);

        if ($request->pilihan_2 == $request->pilihan_1 || $request->pilihan_3 == $request->pilihan_1) {
            return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
        }elseif ($request->pilihan_2 == $request->pilihan_3) {
            if ($request->pilihan_3 == '') {
                $this->validate($request, [
                    'pilihan_1' => 'required',
                ]);
        
                $ekstra_data = [
                    'pilihan_1' => $request->pilihan_1,
                    'pilihan_2' => $request->pilihan_2,
                    'pilihan_3' => $request->pilihan_3,
                ];
                $ekstra->update($ekstra_data);
        
                return redirect()->route('ekstrakulikuler.index')->with('success', 'Data siswa berhasil diperbarui!');
            }
            return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
        }else {
            $this->validate($request, [
                'pilihan_1' => 'required',
            ]);
    
            $ekstra_data = [
                'pilihan_1' => $request->pilihan_1,
                'pilihan_2' => $request->pilihan_2,
                'pilihan_3' => $request->pilihan_3,
            ];
            $ekstra->update($ekstra_data);
    
            return redirect()->route('ekstrakulikuler.index')->with('success', 'Data siswa berhasil diperbarui!');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekstra = Ekstrakulikuler::findorfail($id);
        $ekstra->forceDelete();
        return redirect()->back()->with('success', 'Data Ekstra berhasil dihapus secara permanent');
    }

    public function generateByUser()
    {
        $x = 'Pramuka';
        $user = User::all()->where('role','Siswa');
        $cekData = Ekstrakulikuler::all()->count();
        $i = 0;
        if ($cekData == $i) {
            foreach ($user as $data) {
                if ($data->kelas->angkatan == 'X') {
                 Ekstrakulikuler::create([
                     'user_id' => $data->id,
                     'kelas_id' => $data->kelas_id,
                     'pilihan_1' => $x,
                 ]);
                } else {
                 Ekstrakulikuler::create([
                     'user_id' => $data->id,
                     'kelas_id' => $data->kelas_id,
                 ]);
                }
             }
             return redirect()->route('ekstrakulikuler.index')->with('success', 'Data siswa berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data Ekstra gagal digenerate karena masih ada data');
        }
     
    }

    //Bagian Guru Side
    public function indexGuru()
    {
        $ekstra = Ekstrakulikuler::all();
        return view('guru.Ekstrakulikuler.index', compact('ekstra'));
    }

    //Bagian Siswa Side
    public function indexSiswa()
    {
        $ekstra = Ekstrakulikuler::all();
        return view('siswa.Ekstrakulikuler.index', compact('ekstra'));
    }

    public function editSiswa()
    {
        $ekstra = Ekstrakulikuler::where('user_id', Auth::user()->id)->first();
        $DataEkstra = DataEkstrakulikuler::OrderBy('nama_ekstra')->get();
        return view('siswa.Ekstrakulikuler.edit', compact('ekstra', 'DataEkstra'));
    }

    public function updateSiswa(Request $request)
    {

        $ekstra = Ekstrakulikuler::where('user_id', Auth::user()->id)->first();

        if (Auth::user()->kelas->angkatan == 'X') {
            $this->validate($request, [
                'pilihan_1' => 'required',
                'pilihan_2' => 'required',
            ]);

            if ($request->pilihan_2 == $request->pilihan_1 || $request->pilihan_3 == $request->pilihan_1) {
                return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
            }elseif ($request->pilihan_2 == $request->pilihan_3) {
                if ($request->pilihan_3 == '') {
                    $ekstra_data = [
                        'pilihan_2' => $request->pilihan_2,
                        'pilihan_3' => $request->pilihan_3,
                    ];
                    $ekstra->update($ekstra_data);
            
                    return redirect()->route('ekstrakulikuler.indexSiswa')->with('success', 'Data siswa berhasil diperbarui!');
                }
                return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
            }else {
                $ekstra_data = [
                    'pilihan_2' => $request->pilihan_2,
                    'pilihan_3' => $request->pilihan_3,
                ];
                $ekstra->update($ekstra_data);
        
                return redirect()->route('ekstrakulikuler.indexSiswa')->with('success', 'Data siswa berhasil diperbarui!');
            }
        }elseif (Auth::user()->kelas->angkatan == 'XI') {
            $this->validate($request, [
                'pilihan_1' => 'required',
            ]);
        }else {
            $this->validate($request, [
                
            ]);
        }

        if ($request->pilihan_2 == $request->pilihan_1 || $request->pilihan_3 == $request->pilihan_1) {
            return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
        }elseif ($request->pilihan_2 == $request->pilihan_3) {
            if ($request->pilihan_3 == '') {
                $ekstra_data = [
                    'pilihan_1' => $request->pilihan_1,
                    'pilihan_2' => $request->pilihan_2,
                    'pilihan_3' => $request->pilihan_3,
                ];
                $ekstra->update($ekstra_data);
        
                return redirect()->route('ekstrakulikuler.indexSiswa')->with('success', 'Data siswa berhasil diperbarui!');
            }
            return redirect()->back()->with('error', 'Data Ekstra gagal ditambah');
        }else {
            $ekstra_data = [
                'pilihan_1' => $request->pilihan_1,
                'pilihan_2' => $request->pilihan_2,
                'pilihan_3' => $request->pilihan_3,
            ];
            $ekstra->update($ekstra_data);
    
            return redirect()->route('ekstrakulikuler.indexSiswa')->with('success', 'Data siswa berhasil diperbarui!');
        }
    }

    public function guru()
    {
        $user = Auth::user()->kelas->id;
        $ekstra = Ekstrakulikuler::all()->where('kelas_id', $user);
        return view('guru.ekstrakulikuler.index', compact('ekstra'));
    }
}
