@extends('template_backend.home')
@section('heading', 'Data Priodik')
@section('page')
<li class="breadcrumb-item active">Data Priodik</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Priodik</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Tinggi Badan</label>
                            <input readonly type="text" id="tinggi_badan" name="tinggi_badan" value="{{ $priodik->tinggi_badan }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Berat Badan</label>
                            <input readonly type="text" id="berat_badan" name="berat_badan" value="{{ $priodik->berat_badan }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jarak Sekolah</label>
                            <input readonly type="text" id="jarak_sekolah" name="jarak_sekolah" value="{{ $priodik->jarak_sekolah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jumlah Saudara</label>
                            <input readonly type="text" id="jumlah_saudara" name="jumlah_saudara" value="{{ $priodik->jumlah_saudara }}" class="form-control @error('kelas') is-invalid @enderror">
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