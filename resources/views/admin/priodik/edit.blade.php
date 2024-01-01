@extends('template_backend.home')
@section('heading', 'Data Priodik')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('orangtua.index') }}">Data Priodik</a></li>
@if(Auth::user()->role == 'Admin' )
<li class="breadcrumb-item active">Edit Data Priodik</li>
@else
<li class="breadcrumb-item active">Detail Data Priodik</li>
@endif
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        @if(Auth::user()->role == 'Admin' )
            <h3 class="card-title">Edit Data Priodik</h3>
            @else
            <h3 class="card-title">Detail Data Priodik</h3>
            @endif
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('priodik.update',$priodik->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row required">
                    <div class="col-md-4">
                        <input type="text" id="id" name="id" value="{{ $priodik->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input readonly type="text" id="nisn" name="nisn" value="{{ $priodik->user->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" id="nama" name="nama" value="{{ $priodik->user->name }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input readonly type="text" id="kelas" name="kelas" value="{{ $priodik->user->kelas }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Tinggi Badan</label>
                            <input type="text" id="tinggi_badan" name="tinggi_badan" value="{{ $priodik->tinggi_badan }}" class="form-control @error('tinggi_badan') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Berat Badan</label>
                            <input type="text" id="berat_badan" name="berat_badan" value="{{ $priodik->berat_badan }}" class="form-control @error('berat_badan') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jarak Sekolah</label>
                            <input type="text" id="jarak_sekolah" name="jarak_sekolah" value="{{ $priodik->jarak_sekolah }}" class="form-control @error('jarak_sekolah') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jumlah Saudara</label>
                            <input type="text" id="jumlah_saudara" name="jumlah_saudara" value="{{ $priodik->jumlah_saudara }}" class="form-control @error('jumlah_saudara') is-invalid @enderror">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
            @if(Auth::user()->role == 'Admin' )
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('priodik.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
                </div>
            </div>
            @endif
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $("#DataSiswa").addClass("active");
    $("#liDataSiswa").addClass("menu-open");
    $("#priodik").addClass("active");
</script>
@endsection