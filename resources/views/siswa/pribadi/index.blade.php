@extends('template_backend.home')
@section('heading', 'Data Pribadi')
@section('page')
<li class="breadcrumb-item active">Data Pribadi</li>
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
            <h3 class="card-title mx-2">Data Pribadi</h3>

            @empty(Auth::user()->tem_pribadi(Auth::user()->id)->status)
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('pribadi.verifPribadi') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-check"></i> &nbsp; Data Sudah Benar</button>
                </form>
                <a href="{{ route('pribadi.editSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a>
            </div>

            @endempty

            @if (!empty(Auth::user()->tem_pribadi(Auth::user()->id)->status))
            @if(Auth::user()->tem_pribadi(Auth::user()->id)->status == 'Pending')
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                <a href="{{ route('pribadi.editTemSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Edit Ajuan Sebelumnya</a>
            </div>
            @elseif(Auth::user()->tem_pribadi(Auth::user()->id)->status == null || Auth::user()->tem_pribadi(Auth::user()->id)->status == 'Setujui' || Auth::user()->tem_pribadi(Auth::user()->id)->status == 'Tolak')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('pribadi.verifPribadi') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-check"></i> &nbsp; Data Sudah Benar</button>
                </form>
                <a href="{{ route('pribadi.editSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a>
            </div>
            @endif
            @endif

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="post">
            @csrf

            <div class="card-body">
                @if(Auth::user()->pribadi(Auth::user()->id)->status == 'Data Sudah Benar')
                <div class="alert alert-success" role="alert">
                    Data Sudah Terverifikasi
                </div>
                @elseif(Auth::user()->pribadi(Auth::user()->id)->status == 'Setujui')
                <div class="alert alert-success" role="alert">
                    <h5>Status Pengajuan Disetujui</h5>
                    <hr>
                    <p class="mb-0">Catatan : {{$pribadi_tem->keterangan}}</p>
                </div>
                @elseif(Auth::user()->pribadi(Auth::user()->id)->status == 'Pending')
                <div class="alert alert-pending" role="alert">
                    Status Pengajuan Pending
                </div>
                @elseif(Auth::user()->pribadi(Auth::user()->id)->status == 'Tolak')
                <div class="alert alert-danger" role="alert">
                    <h5>Status Pengajuan Ditolak</h5>
                    <hr style="border-color: #f5c6cb;">
                    <p class="mb-0">Catatan : {{$pribadi_tem->keterangan}}</p>
                </div>
                @else

                @endif

            <div class="card-body">
                <div class="row">
                    <input type="text" id="id" name="id" value="{{ Auth::user()->pribadi(Auth::user()->id)->id }}" class="form-control d-none" readonly>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input readonly type="text" id="nisn" name="nisn" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" id="nama" name="nama" value="{{ Auth::user()->name }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input readonly type="text" id="kelas" name="kelas" value="{{ Auth::user()->kelas->nama_kelas }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <input readonly type="text" id="jk" name="jk" value="{{ Auth::user()->pribadi(Auth::user()->id)->jk }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input readonly type="text" id="nokk" name="nokk" value="{{ Auth::user()->pribadi(Auth::user()->id)->nokk }}" class="form-control @error('nokk') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input readonly type="text" id="nik" name="nik" value="{{ Auth::user()->pribadi(Auth::user()->id)->nik }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input readonly type="text" id="agama" name="agama" value="{{ Auth::user()->pribadi(Auth::user()->id)->agama }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input readonly type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->pribadi(Auth::user()->id)->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input readonly type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->pribadi(Auth::user()->id)->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input readonly type="text" id="alamat" name="alamat" value="{{ Auth::user()->pribadi(Auth::user()->id)->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input readonly type="text" id="desa" name="desa" value="{{ Auth::user()->pribadi(Auth::user()->id)->desa }}" class="form-control @error('desa') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelurahan">kelurahan</label>
                            <input readonly type="text" id="kelurahan" name="kelurahan" value="{{ Auth::user()->pribadi(Auth::user()->id)->kelurahan }}" class="form-control @error('keluarahan') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tmp_tinggal">Tempat Tinggal</label>
                            <input readonly type="text" id="tmp_tinggal" name="tmp_tinggal" value="{{ Auth::user()->pribadi(Auth::user()->id)->tmp_tinggal }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="transport">Mode Transportasi</label>
                            <input readonly type="text" id="transport" name="transport" value="{{ Auth::user()->pribadi(Auth::user()->id)->transport }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke- (Sesuai KK)</label>
                            <input readonly type="number" id="anak_ke" name="anak_ke" value="{{ Auth::user()->pribadi(Auth::user()->id)->anak_ke }}" class="form-control @error('anak_ke') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_tlp">Nomer Telpon (Orang Tua)</label>
                            <input readonly type="number" id="no_tlp" name="no_tlp" value="{{ Auth::user()->pribadi(Auth::user()->id)->no_tlp }}" class="form-control @error('no_tlp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_hp">Nomer Telpon (Siswa)</label>
                            <input readonly type="number" id="no_hp" name="no_hp" value="{{ Auth::user()->pribadi(Auth::user()->id)->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input readonly type="email" id="email" name="email" value="{{ Auth::user()->pribadi(Auth::user()->id)->email }}" class="form-control @error('email') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="beasiswa">Beasiswa</label>
                            <input readonly type="text" id="beasiswa" name="beasiswa" value="{{ Auth::user()->pribadi(Auth::user()->id)->beasiswa }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Upload Kartu Keluarga</label>
                            <p><a href="{{ asset(Auth::user()->berkas_kk) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset(Auth::user()->berkas_kk) }}" width="150px" height="150px" class="img-fluid mb-2">
                                </a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Upload Ijasah</label>
                            <p><a href="{{ asset(Auth::user()->berkas_ijasah) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset(Auth::user()->berkas_ijasah) }}" width="150px" height="150px" class="img-fluid mb-2">
                                </a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Upload Beasiswa</label>
                            <p><a href="{{ asset(Auth::user()->berkas_beasiswa) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset(Auth::user()->berkas_beasiswa) }}" width="150px" height="150px" class="img-fluid mb-2">
                                </a></p>
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror">
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
    $("#PribadiSiswa").addClass("active");
</script>
@endsection