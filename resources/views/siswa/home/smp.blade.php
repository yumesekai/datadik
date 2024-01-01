@extends('template_backend.home')
@section('heading', 'Data SMP')
@section('page')
<li class="breadcrumb-item active">Data SMP</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data SMP</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nama Sekolah SMP</label>
                            <input readonly type="text" id="sekolah_asal" name="sekolah_asal" value="{{ $smp->sekolah_asal }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nomer Ujian Nasional</label>
                            <input readonly type="text" id="no_un" name="no_un" value="{{ $smp->no_un }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nomer SKHUN</label>
                            <input readonly type="text" id="no_skhun" name="no_skhun" value="{{ $smp->no_skhun }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nomer Ijasah</label>
                            <input readonly type="text" id="no_ijasah" name="no_ijasah" value="{{ $smp->no_ijasah }}" class="form-control @error('kelas') is-invalid @enderror">
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
    $("#SmpSiswa").addClass("active");
</script>
@endsection