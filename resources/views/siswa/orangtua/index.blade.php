@extends('template_backend.home')
@section('heading', 'Data Orang Tua')
@section('page')
<li class="breadcrumb-item active">Data Orang Tua</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: rgba(0,0,0,.03);">
            <b>CATATAN</b>
        </div>
        <div class="col-md-12">
            <div class="card-body" style="font-size: 15px;">
                <ul>
                    <li>Mohon dicek data dengan cermat dan sungguh sungguh</li>
                    <li>Jika data yang tampil SUDAH SESUAI silahkan menekan tombol <button class="btn btn-success btn-sm mx-2" style="font-size: 9px;"><i class="nav-icon fas fa-user-check"></i> &nbsp; Data Sudah Benar</button></li>
                    <li>Jika data yang tampil TIDAK SESUAI silahkan menekan tombol <a class="text-dark btn btn-warning btn-sm" style="font-size: 9px;"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a></li>
                    <li><a class="text-dark btn btn-warning btn-sm" style="font-size: 9px;"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Edit Ajuan Sebelumnya</a> Tombol ini digunakan jika ingin mengubah data yang SUDAH DIAJUKAN</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mx-2">Data Orang Tua</h3>
            @empty(Auth::user()->tem_orangtua(Auth::user()->id)->status)
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('orangtua.verifOrangtua') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-check"></i> &nbsp; Data Sudah Benar</button>
                </form>
                <a href="{{ route('orangtua.editSiswa') }}" class="text-dark btn btn-warning btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a>
            </div>
            @endempty

            @if (!empty(Auth::user()->tem_orangtua(Auth::user()->id)->status))
            @if(Auth::user()->tem_orangtua(Auth::user()->id)->status == 'Pending')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('orangtua.editTemSiswa') }}" class="text-dark btn btn-warning btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Edit Ajuan Sebelumnya</a>
            </div>
            @elseif(Auth::user()->tem_orangtua(Auth::user()->id)->status == null || Auth::user()->tem_orangtua(Auth::user()->id)->status == 'Disetujui' || Auth::user()->tem_orangtua(Auth::user()->id)->status == 'Tidak Disetujui')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('orangtua.verifOrangtua') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm mx-2 mx-1 mt-2"><i class="nav-icon fas fa-user-check "></i> &nbsp; Data Sudah Benar</button>
                </form>
                <a href="{{ route('orangtua.editSiswa') }}" class="text-dark btn btn-warning btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a>
            </div>
            @endif
            @endif



        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                @if(Auth::user()->orangtua(Auth::user()->id)->status == 'Data Sudah Benar')
                <div class="alert alert-success" role="alert">
                    Data Sudah Terverifikasi
                </div>
                @elseif(Auth::user()->orangtua(Auth::user()->id)->status == 'Setujui')
                <div class="alert alert-success" role="alert">
                    <h5>Status Pengajuan Disetujui</h5>
                    <hr>
                    <p class="mb-0">Catatan : {{$orangtua_tem->keterangan}}</p>
                </div>
                @elseif(Auth::user()->orangtua(Auth::user()->id)->status == 'Pending')
                <div class="alert alert-pending" role="alert">
                    Status Pengajuan Pending
                </div>
                @elseif(Auth::user()->orangtua(Auth::user()->id)->status == 'Tolak')
                <div class="alert alert-danger" role="alert">
                    <h5>Status Pengajuan Ditolak</h5>
                    <hr style="border-color: #f5c6cb;">
                    <p class="mb-0">Catatan : {{$orangtua_tem->keterangan}}</p>
                </div>
                @else

                @endif
                
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="id" name="id" value="{{  Auth::user()->orangtua(Auth::user()->id)->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input readonly type="text" id="nisn" name="nisn" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" id="nama" name="nama" value="{{ Auth::user()->name }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input readonly type="text" id="kelas" name="kelas" value="{{ Auth::user()->kelas->nama_kelas }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">AYAH</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Nama Ayah</label>
                            <input readonly type="text" id="nama_ayah" name="nama_ayah" value="{{ Auth::user()->orangtua(Auth::user()->id)->nama_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK Ayah</label>
                            <input readonly type="text" id="nik_ayah" name="nik_ayah" value="{{ Auth::user()->orangtua(Auth::user()->id)->nik_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir Ayah</label>
                            <input readonly type="text" id="tahun_ayah" name="tahun_ayah" value="{{ Auth::user()->orangtua(Auth::user()->id)->tahun_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir Ayah</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->pendidikan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Ayah</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->pekerjaan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan Ayah</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->penghasilan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bekebutuhan">Berkebutuhan Khusus Ayah</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->berkebutuhan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- End Data Ayah -->

                    <!-- Start Data Ibu -->
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">IBU</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Nama ibu</label>
                            <input readonly type="text" id="nama_ibu" name="nama_ibu" value="{{ Auth::user()->orangtua(Auth::user()->id)->nama_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK ibu</label>
                            <input readonly type="text" id="nik_ibu" name="nik_ibu" value="{{ Auth::user()->orangtua(Auth::user()->id)->nik_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir ibu</label>
                            <input readonly type="text" id="tahun_ibu" name="tahun_ibu" value="{{ Auth::user()->orangtua(Auth::user()->id)->tahun_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir ibu</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->pendidikan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan ibu</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->pekerjaan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan ibu</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->penghaslian_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus ibu</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->berkebutuhan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- End Data Ibu -->

                    <!-- Start Data Wali -->
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">WALI</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Nama wali</label>
                            <input readonly type="text" id="nama_wali" name="nama_wali" value="{{ Auth::user()->orangtua(Auth::user()->id)->nama_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK wali</label>
                            <input readonly type="text" id="nik_wali" name="nik_wali" value="{{ Auth::user()->orangtua(Auth::user()->id)->nik_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir wali</label>
                            <input readonly type="text" id="tahun_wali" name="tahun_wali" value="{{ Auth::user()->orangtua(Auth::user()->id)->tahun_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir wali</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->pendidikan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan wali</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->pekerjaan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan wali</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->penghasilan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus wali</label>
                            <input readonly value="{{Auth::user()->orangtua(Auth::user()->id)->berkebutuhan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- End Data Wali -->

                    <div class="form-group d-none">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" value="Pending" class="form-control @error('status') is-invalid @enderror">
                    </div>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
    </form>
</div>
<!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $("#DataSiswa").addClass("active");
    $("#liDataSiswa").addClass("menu-open");
    $("#OrangtuaSiswa").addClass("active");
</script>
@endsection