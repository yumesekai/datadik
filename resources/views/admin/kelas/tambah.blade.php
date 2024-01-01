@extends('template_backend.home')
@section('heading', 'Tambah Data Kelas')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('kelas.index') }}">Data Kelas</a></li>
<li class="breadcrumb-item active">Tambah Data Kelas</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kelas</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('kelas.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row required">
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="nama kelas">Nama Kelas</label>
                            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" value="{{ old('nama_kelas') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="nama ekstra">Angkatan</label>
                            <input type="text" id="angkatan" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ old('angkatan') }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('kelas.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#kelas").addClass("active");
</script>
@endsection