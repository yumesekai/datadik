@extends('template_backend.home')
@section('heading', 'Tambah Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('ekstrakulikuler.index') }}">Data Ekstrakulikuler</a></li>
<li class="breadcrumb-item active">Tambah Data Ekstrakulikuler</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Ekstrakulikuler</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('ekstrakulikuler.store') }}" enctype="multipart/form-data" method="POST">
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
                            <label for="pilihan_1">Ekstra Pilihan 1</label>
                            <select onchange="unlock_pil2()" id="pilihan_1" name="pilihan_1" class="select2bs4 form-control @error('pilihan_1') is-invalid @enderror">
                                <option value="">-- Cari Ekstrakulikuler --</option>
                                @foreach ($DataEkstra as $data)
                                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_1') == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_2">Ekstra Pilihan 2</label>
                            <select onchange="unlock_pil3()" id="pilihan_2" disabled name="pilihan_2" class="select2bs4 form-control @error('pilihan_2') is-invalid @enderror">
                                <option value="">-- Cari Ekstrakulikuler --</option>
                                @foreach ($DataEkstra as $data)
                                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_2') == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_3">Ekstra Pilihan 3</label>
                            <select id="pilihan_3" disabled name="pilihan_3" class="select2bs4 form-control @error('pilihan_3') is-invalid @enderror">
                                <option value="">-- Cari Ekstrakulikuler --</option>
                                @foreach ($DataEkstra as $data)
                                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_3') == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('ekstrakulikuler.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#DataEkstra").addClass("active");

    function unlock_pil2() {
        if (document.getElementById("pilihan_1").value == '') {
            document.getElementById("pilihan_2").disabled = true;
            $("#pilihan_2").val(null).trigger("change");
            
        }else{
            document.getElementById("pilihan_2").disabled = false;
        }
            
    }

    function unlock_pil3() {
        if (document.getElementById("pilihan_2").value == '') {
            document.getElementById("pilihan_3").disabled = true;
            $("#pilihan_3").val(null).trigger("change");
            
        }else{
            document.getElementById("pilihan_3").disabled = false;
        }
            
    }
</script>
@endsection