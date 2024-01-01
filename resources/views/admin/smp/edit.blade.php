@extends('template_backend.home')
@section('heading', 'Data SMP')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('orangtua.index') }}">Data SMP</a></li>
@if(Auth::user()->role == 'Admin' )
<li class="breadcrumb-item active">Edit Data SMP</li>
@else
<li class="breadcrumb-item active">Detail Data SMP</li>
@endif
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            @if(Auth::user()->role == 'Admin' )
            <h3 class="card-title">Edit Data SMP</h3>
            @else
            <h3 class="card-title">Detail Data SMP</h3>
            @endif
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('smp.update',$smp->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="id" name="id" value="{{ $smp->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input readonly type="text" id="nisn" name="nisn" value="{{ $smp->user->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" id="nama" name="nama" value="{{ $smp->user->name }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input readonly type="text" id="kelas" name="kelas" value="{{ $smp->user->kelas }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nama Sekolah SMP</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" value="{{ $smp->sekolah_asal }}" class="form-control @error('sekolah_asal') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Nomer Ujian Nasional</label>
                            <input type="text" id="no_un" name="no_un" value="{{ $smp->no_un }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nomer SKHUN</label>
                            <input type="text" id="no_skhun" name="no_skhun" value="{{ $smp->no_skhun }}" class="form-control @error('no_skhun') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="kelas">Nomer Ijasah</label>
                            <input type="text" id="no_ijasah" name="no_ijasah" value="{{ $smp->no_ijasah }}" class="form-control @error('no_ijasah') is-invalid @enderror">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
            @if(Auth::user()->role == 'Admin' )
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('smp.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#smp").addClass("active");
</script>
@endsection