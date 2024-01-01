@extends('template_backend.home')
@section('heading', 'Tambah Data Priodik')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('orangtua.index') }}">Data Priodik</a></li>
<li class="breadcrumb-item active">Tambah Data Priodik</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Priodik</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('priodik.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row required">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <select id="nama" name="nama" class="select2bs4 form-control @error('nama') is-invalid @enderror">
                                <option value="">-- Cari Nama --</option>
                                @foreach ($user as $data)
                                <option value="{{ $data->id }}" {{ old('nama') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Tinggi Badan</label>
                            <input type="text" id="tinggi_badan" name="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror" value="{{ old('tinggi_badan') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Berat Badan</label>
                            <input type="text" id="berat_badan" name="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror" value="{{ old('berat_badan') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jarak Sekolah</label>
                            <input type="text" id="jarak_sekolah" name="jarak_sekolah" class="form-control @error('jarak_sekolah') is-invalid @enderror" value="{{ old('jarak_sekolah') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jumlah Saudara</label>
                            <input type="text" id="jumlah_saudara" name="jumlah_saudara" class="form-control @error('jumlah_saudara') is-invalid @enderror" value="{{ old('jumlah_saudara') }}">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('priodik.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i> &nbsp; Tambah</button>
                </div>
            </div>
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