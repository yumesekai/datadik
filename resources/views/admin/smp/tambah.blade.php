@extends('template_backend.home')
@section('heading', 'Tambah Data SMP')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('orangtua.index') }}">Data SMP</a></li>
<li class="breadcrumb-item active">Tambah Data SMP</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data SMP</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('smp.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 required">
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

                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nama Sekolah SMP</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control @error('sekolah_asal') is-invalid @enderror" value="{{ old('sekolah_asal') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nomer Ujian Nasional</label>
                            <input type="text" id="no_un" name="no_un" class="form-control @error('no_un') is-invalid @enderror" value="{{ old('no_un') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nomer SKHUN</label>
                            <input type="text" id="no_skhun" name="no_skhun" class="form-control @error('no_skhun') is-invalid @enderror" value="{{ old('no_skhun') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nomer Ijasah</label>
                            <input type="text" id="no_ijasah" name="no_ijasah" class="form-control @error('no_ijasah') is-invalid @enderror" value="{{ old('no_ijasah') }}">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('smp.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#smp").addClass("active");
</script>
@endsection