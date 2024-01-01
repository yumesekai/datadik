@extends('template_backend.home')
@section('heading', 'Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active">Data Ekstrakulikuler</li>
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
            <h3 class="card-title mx-2">Data Ekstrakulikuler</h3>

            @if(Auth::user()->ekstrakulikuler(Auth::user()->id)->pilihan_1 != '')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('ekstrakulikuler.editSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Ubah Pilihan Ekstrakulikuler</a>
            </div>
            @else
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('ekstrakulikuler.editSiswa') }}" class="mx-1 mt-2 text-dark btn btn-warning btn-sm"><i class="nav-icon fas fa-user-pen"></i> &nbsp; Tambah Ekstrakulikuler</a>
            </div>
            @endif
            </div>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf

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
                            <label for="pilihan_1">Pilihan 1 : </label>
                            <input readonly type="text" id="pilihan_1" name="pilihan_1" value="{{ Auth::user()->ekstrakulikuler(Auth::user()->id)->pilihan_1 }}" class="form-control @error('pilihan_1') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_2">Pilihan 2 : </label>
                            <input readonly type="text" id="pilihan_2" name="pilihan_2" value="{{ Auth::user()->ekstrakulikuler(Auth::user()->id)->pilihan_2 }}" class="form-control @error('pilihan_2') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_3">Pilihan 3 : </label>
                            <input readonly type="text" id="pilihan_3" name="pilihan_3" value="{{ Auth::user()->ekstrakulikuler(Auth::user()->id)->pilihan_3 }}" class="form-control @error('pilihan_3') is-invalid @enderror">
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
    $("#EkstraSiswa").addClass("active");
</script>
@endsection