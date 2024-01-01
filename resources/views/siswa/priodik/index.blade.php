@extends('template_backend.home')
@section('heading', 'Data Priodik')
@section('page')
<li class="breadcrumb-item active">Data Priodik</li>
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
            <h3 class="card-title mx-2">Data Priodik</h3>

            @empty(Auth::user()->tem_priodik(Auth::user()->id)->status)
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('priodik.verifPriodik') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-check"></i> &nbsp; Data Sudah Benar</button>
                </form>
                <a href="{{ route('priodik.editSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a>
            </div>

            @endempty

            @if (!empty(Auth::user()->tem_priodik(Auth::user()->id)->status))
            @if(Auth::user()->tem_priodik(Auth::user()->id)->status == 'Pending')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('priodik.editTemSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Edit Ajuan Sebelumnya</a>
            </div>
            @elseif(Auth::user()->tem_priodik(Auth::user()->id)->status == null || Auth::user()->tem_priodik(Auth::user()->id)->status == 'Disetujui' || Auth::user()->tem_priodik(Auth::user()->id)->status == 'Tidak Disetujui')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('priodik.verifPriodik') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm mx-1 mt-2"><i class="nav-icon fas fa-user-check"></i> &nbsp; Data Sudah Benar</button>
                </form>
                <a href="{{ route('priodik.editSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Perbaiki Data</a>
            </div>
            @endif
            @endif
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="card-body">
                @if(Auth::user()->priodik(Auth::user()->id)->status == 'Data Sudah Benar')
                <div class="alert alert-success" role="alert">
                    Data Sudah Terverifikasi
                </div>
                @elseif(Auth::user()->priodik(Auth::user()->id)->status == 'Setujui')
                <div class="alert alert-success" role="alert">
                    <h5>Status Pengajuan Disetujui</h5>
                    <hr>
                    <p class="mb-0">Catatan : {{$priodik_tem->keterangan}}</p>
                </div>
                @elseif(Auth::user()->priodik(Auth::user()->id)->status == 'Pending')
                <div class="alert alert-pending" role="alert">
                    Status Pengajuan Pending
                </div>
                @elseif(Auth::user()->priodik(Auth::user()->id)->status == 'Tolak')
                <div class="alert alert-danger" role="alert">
                    <h5>Status Pengajuan Ditolak</h5>
                    <hr style="border-color: #f5c6cb;">
                    <p class="mb-0">Catatan : {{$priodik_tem->keterangan}}</p>
                </div>
                @else

                @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="id" name="id" value="{{ Auth::user()->id }}" class="form-control d-none" readonly>
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
                        <div class="form-group">
                            <label for="kelas">Tinggi Badan</label>
                            <input readonly type="text" id="tinggi_badan" name="tinggi_badan" value="{{ Auth::user()->priodik(Auth::user()->id)->tinggi_badan }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Berat Badan</label>
                            <input readonly type="text" id="berat_badan" name="berat_badan" value="{{ Auth::user()->priodik(Auth::user()->id)->berat_badan }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jarak Sekolah</label>
                            <input readonly type="text" id="jarak_sekolah" name="jarak_sekolah" value="{{ Auth::user()->priodik(Auth::user()->id)->jarak_sekolah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jumlah Saudara</label>
                            <input readonly type="text" id="jumlah_saudara" name="jumlah_saudara" value="{{ Auth::user()->priodik(Auth::user()->id)->jumlah_saudara }}" class="form-control @error('kelas') is-invalid @enderror">
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
    $("#PriodikSiswa").addClass("active");
</script>
@endsection