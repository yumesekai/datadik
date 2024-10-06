@extends('template_backend.home')
@section('heading', 'Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('ekstrakulikuler.index') }}">Data Ekstrakulikuler</a></li>
@if(Auth::user()->role == 'Admin' )
<li class="breadcrumb-item active">Edit Data Ekstrakulikuler</li>
@else
<li class="breadcrumb-item active">Detail Data Ekstrakulikuler</li>
@endif
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        @if(Auth::user()->role == 'Admin' )
            <h3 class="card-title">Edit Data Ekstrakulikuler</h3>
            @else
            <h3 class="card-title">Detail Data Ekstrakulikuler</h3>
            @endif
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form id="ekstra" action="{{ route('ekstrakulikuler.update',$ekstra->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 required">
                        <input type="text" id="id" name="id" value="{{ $ekstra->id }}" class="form-control d-none" readonly>
                        <input type="text" id="angkatan" name="angkatan" value="{{ $ekstra->user->kelas->angkatan }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" id="nama" name="nama" value="{{ $ekstra->user->name }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>

		  <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="nama">Nomer Handphone</label>
                            <input type="number" id="no_hp" name="no_hp" value="{{ $ekstra->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>
                    </div>

                    <div id="valid1" class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_1">Ekstra Pilihan 1</label>
                            <select onchange="unlock_pil2()" id="pilihan_1" name="pilihan_1" class="select2bs4 form-control @error('pilihan_1') is-invalid @enderror">
                                @if($ekstra->pilihan_1 == '')
                                <option value="">-- Cari Ekstrakulikuler --</option>
                                @else
                                <option value="{{ $ekstra->pilihan_1}}">{{ $ekstra->pilihan_1}}</option>
                                @endif
                                @foreach ($DataEkstra as $data)
                                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_1') == $data->nama_ekstra || $ekstra->pilihan_1 == $data->nama_ekstra  ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="valid2" class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_2">Ekstra Pilihan 2</label>
                            <select onchange="unlock_pil3()" disabled id="pilihan_2" name="pilihan_2" class="select2bs4 form-control @error('pilihan_2') is-invalid @enderror">
                                @if($ekstra->pilihan_2 == '')
                                <option value="">-- Cari Ekstrakulikuler --</option>
                                @else
                                <option value="{{ $ekstra->pilihan_2}}">{{ $ekstra->pilihan_2}}</option>
                                <option value="">Tidak Memilih</option>
                                @endif
                                @foreach ($DataEkstra as $data)
                                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_2') == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="valid3" class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_3">Ekstra Pilihan 3</label>
                            <select id="pilihan_3" disabled name="pilihan_3" class="select2bs4 form-control @error('pilihan_3') is-invalid @enderror">
                                @if($ekstra->pilihan_3 == '')
                                <option value="">-- Cari Ekstrakulikuler --</option>
                                @else
                                <option value="{{ $ekstra->pilihan_3}}">{{ $ekstra->pilihan_3}}</option>
                                <option value="">Tidak Memilih</option>
                                @endif
                                @foreach ($DataEkstra as $data)
                                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_3') == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- /.card-body -->
            @if(Auth::user()->role == 'Admin' )
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('ekstrakulikuler.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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


    const windowOnload = window.onload = () => {
        if (document.getElementById("angkatan").value == 'X') {
            document.getElementById("pilihan_1").readonly = true;
            document.getElementById("valid1").classList.add("required");
            document.getElementById("valid2").classList.add("required");
            unlock_pil2();
            unlock_pil3();
        }else if(document.getElementById("angkatan").value == 'XI'){
            document.getElementById("valid1").classList.add("required");
            unlock_pil2();
            unlock_pil3();
        }else{
            unlock_pil2();
            unlock_pil3();
        }
    };
</script>
@endsection