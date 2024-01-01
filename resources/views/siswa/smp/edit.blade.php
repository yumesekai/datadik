@extends('template_backend.home')
@section('heading', 'Perbaiki Data SMP')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('pribadi.index') }}">Data SMP</a></li>
<li class="breadcrumb-item active">Perbaiki Data SMP</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Perbaiki Data SMP</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('smp.storeSiswa') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="text" id="smp_id" name="smp_id" value="{{ Auth::user()->smp(Auth::user()->id)->id }}" class="form-control d-none" readonly>
                    <input type="text" id="id" name="id" value="{{ Auth::user()->id }}" class="form-control d-none" readonly>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nama Sekolah SMP</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" value="{{ Auth::user()->smp(Auth::user()->id)->sekolah_asal }}" class="form-control @error('sekolah_asal') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nomer Ujian Nasional</label>
                            <input type="text" id="no_un" name="no_un" value="{{ Auth::user()->smp(Auth::user()->id)->no_un }}" class="form-control @error('no_un') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nomer SKHUN</label>
                            <input type="text" id="no_skhun" name="no_skhun" value="{{ Auth::user()->smp(Auth::user()->id)->no_skhun }}" class="form-control @error('no_skhun') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nomer Ijasah</label>
                            <input type="text" id="no_ijasah" name="no_ijasah" value="{{ Auth::user()->smp(Auth::user()->id)->no_ijasah }}" class="form-control @error('no_ijasah') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" value="Pending" class="form-control @error('status') is-invalid @enderror">
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('smp.siswa') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;

                    <button onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;" name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
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
    $("#SmpSiswa").addClass("active");
</script>
@endsection