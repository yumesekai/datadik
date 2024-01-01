<?php

namespace App\Http\Controllers;

use App\Ekstrakulikuler;
use Auth;
use App\User;
use App\Guru;
use App\Siswa;
use App\Mapel;
use App\Kelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $admin = User::OrderBy('name','asc')->where('role', 'Admin')->get();
        $kepsek = User::OrderBy('name','asc')->where('role', 'Kepsek')->get();
        $guru = User::OrderBy('name','asc')->where('role', 'Guru')->get();
        $siswa = User::OrderBy('kelas_id')->OrderBy('name','asc')->where('role', 'Siswa')->get();
        $countAdmin = $admin->count();
        $countGuru = $guru->count();
        $adminKepsek = $admin->union($kepsek);
        $kelas = Kelas::all();
        return view('admin.user.index', compact('adminKepsek', 'guru', 'siswa', 'user', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);
        User::updateOrCreate([
            'id' => $request->id
        ],
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan User baru!');
        
        
    }

    public function getEdit(Request $request)
    {
        $user = User::where('id', $request->id)->get();
        foreach ($user as $val) {
            $newForm[] = array(
                'id' => $val->id,
                'name' => $val->name,
                'email' => $val->email,
                'password' => Hash::make($val->password),
                'role' => $val->role,
                'kelas_id' => $val->kelas_id,
            );
        }
        return response()->json($newForm);
    }

   
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Data user berhasil dihapus secara permanent');
    }

    public function export_excel()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    public function excelUser()
    {
        $filepath = public_path('uploads/data_import/IM_USER_GURU.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_USER_GURU.xls', $headers);
    }
    
    public function excelUserSiswa()
    {
        $filepath = public_path('uploads/data_import/IM_USER_SISWA.xls');
        $headers = array('Content-Type: application/xls',);
        return response()->download($filepath, 'IM_USER_SISWA.xls', $headers);
    }

    public function edit_password()
    {
        return view('password');
    }

    public function ubah_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::findorfail(Auth::user()->id);
        if ($request->password_lama) {
            if (Hash::check($request->password_lama, $user->password)) {
                if ($request->password_lama == $request->password) {
                    return redirect()->back()->with('error', 'Maaf password yang anda masukkan sama!');
                } else {
                    $user_password = [
                        'password' => Hash::make($request->password),
                    ];
                    $user->update($user_password);
                    return redirect()->back()->with('success', 'Password anda berhasil diperbarui!');
                }
            } else {
                return redirect()->back()->with('error', 'Tolong masukkan password lama anda dengan benar!');
            }
        } else {
            return redirect()->back()->with('error', 'Tolong masukkan password lama anda terlebih dahulu!');
        }
    }

    public function trash()
    {
        $user = User::onlyTrashed()->paginate(10);
        return view('admin.user.trash', compact('user'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::withTrashed()->findorfail($id);
        $user->restore();
        return redirect()->back()->with('info', 'Data user berhasil direstore! (Silahkan cek data user)');
    }

    public function kill($id)
    {
        $user = User::withTrashed()->findorfail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Data user berhasil dihapus secara permanent');
    }

    public function email(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $countUser = User::where('email', $request->email)->count();
        if ($countUser >= 1) {
            return redirect()->route('reset.password', Crypt::encrypt($user->id))->with('success', 'email ini sudah terdaftar!');
        } else {
            return redirect()->back()->with('error', 'Maaf email ini belum terdaftar!');
        }
    }

    public function password($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findorfail($id);
        return view('auth.passwords.reset', compact('user'));
    }

    public function update_password(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::findorfail($id);
        $user_data = [
            'password' => Hash::make($request->password)
        ];
        $user->update($user_data);
        return redirect()->route('login')->with('success', 'User berhasil diperbarui!');
    }

    public function profile()
    {
        return view('user.pengaturan');
    }

    public function edit_profile()
    {
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('user.profile', compact('mapel', 'kelas'));
    }

    public function ubah_profile(Request $request)
    {
        if ($request->role == 'Guru') {
            $this->validate($request, [
                'nama_guru' => 'required',
                'mapel_id' => 'required',
                'jk' => 'required',
            ]);
            $guru = Guru::where('id_card', Auth::user()->id_card)->first();
            $user = User::where('id_card', Auth::user()->id_card)->first();
            dd($user);
            if ($user) {
                $user_data = [
                    'name' => $request->name
                ];
                $user->update($user_data);
            } else {
            }
            $guru_data = [
                'nama_guru' => $request->name,
                'mapel_id' => $request->mapel_id,
                'jk' => $request->jk,
                'telp' => $request->telp,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir
            ];
            $guru->update($guru_data);
            return redirect()->route('profile')->with('success', 'Profile anda berhasil diperbarui!');
        } elseif ($request->role == 'Siswa') {
            $this->validate($request, [
                'nama_siswa' => 'required',
                'jk' => 'required',
                'kelas_id' => 'required'
            ]);
            $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
            $user = User::where('no_induk', Auth::user()->no_induk)->first();
            if ($user) {
                $user_data = [
                    'name' => $request->name
                ];
                $user->update($user_data);
            } else {
            }
            $siswa_data = [
                'nis' => $request->nis,
                'nama_siswa' => $request->name,
                'jk' => $request->jk,
                'kelas_id' => $request->kelas_id,
                'telp' => $request->telp,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
            ];
            $siswa->update($siswa_data);
            return redirect()->route('profile')->with('success', 'Profile anda berhasil diperbarui!');
        } else {
            $user = User::findorfail(Auth::user()->id);
            $data_user = [
                'name' => $request->name,
            ];
            $user->update($data_user);
            return redirect()->route('profile')->with('success', 'Profile anda berhasil diperbarui!');
        }
    }

    public function edit_foto()
    {
        if (Auth::user()->role == 'Guru' || Auth::user()->role == 'Siswa') {
            return view('user.foto');
        } else {
            return redirect()->back()->with('error', 'Not Found 404!');
        }
    }

    public function ubah_foto(Request $request)
    {
        if ($request->role == 'Guru') {
            $this->validate($request, [
                'foto' => 'required'
            ]);
            $guru = Guru::where('id_card', Auth::user()->id_card)->first();
            $foto = $request->foto;
            $new_foto = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $foto->getClientOriginalName();
            $guru_data = [
                'foto' => 'uploads/guru/' . $new_foto,
            ];
            $foto->move('uploads/guru/', $new_foto);
            $guru->update($guru_data);
            return redirect()->route('profile')->with('success', 'Foto Profile anda berhasil diperbarui!');
        } else {
            $this->validate($request, [
                'foto' => 'required'
            ]);
            $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
            $foto = $request->foto;
            $new_foto = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $foto->getClientOriginalName();
            $siswa_data = [
                'foto' => 'uploads/siswa/' . $new_foto,
            ];
            $foto->move('uploads/siswa/', $new_foto);
            $siswa->update($siswa_data);
            return redirect()->route('profile')->with('success', 'Foto Profile anda berhasil diperbarui!!');
        }
    }

    public function edit_email()
    {
        return view('user.email');
    }

    public function ubah_email(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email'
        ]);
        $user = User::findorfail(Auth::user()->id);
        $cekUser = User::where('email', $request->email)->count();
        if ($cekUser >= 1) {
            return redirect()->back()->with('error', 'Maaf email ini sudah terdaftar!');
        } else {
            $user_email = [
                'email' => $request->email,
            ];
            $user->update($user_email);
            return redirect()->back()->with('success', 'email anda berhasil diperbarui!');
        }
    }

    

    public function cek_email(Request $request)
    {
        $countUser = User::where('email', $request->email)->count();
        if ($countUser >= 1) {
            return response()->json(['success' => 'email Anda Benar']);
        } else {
            return response()->json(['error' => 'Maaf user not found!']);
        }
    }

    public function cek_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $countUser = User::where('email', $request->email)->count();
        if ($countUser >= 1) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json(['success' => 'Password Anda Benar']);
            } else {
                return response()->json(['error' => 'Maaf user not found!']);
            }
        } else {
            return response()->json(['warning' => 'Maaf user not found!']);
        }
    }
}
