@extends('template_backend.home')
@section('heading', 'Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('ekstrakulikuler.indexSiswa') }}">Data Ekstrakulikuler</a></li>
@if(Auth::user()->ekstrakulikuler(Auth::user()->id)->pilihan_1 != '')
<li class="breadcrumb-item active">Ubah Data Ekstrakulikuler</li>
@else
<li class="breadcrumb-item active">Tambah Data Ekstrakulikuler</li>
@endif
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            @if(Auth::user()->ekstrakulikuler(Auth::user()->id)->pilihan_1 != '')
            <h3 class="card-title">Ubah Data Ekstrakulikuler</h3>
            @else
            <h3 class="card-title">Tambah Data Ekstrakulikuler</h3>
            @endif
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form id="ekstra" action="{{ route('ekstrakulikuler.updateSiswa') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                <input type="text" id="id" name="id" value="{{ Auth::user()->id }}" class="form-control d-none" readonly>
                <input type="text" id="angkatan" name="angkatan" value="{{ Auth::user()->kelas->angkatan }}" class="form-control d-none" readonly>
                    <div id="valid1" class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_1">Ekstra Pilihan 1</label>
                            <select onchange="unlock_pil2()" id="pilihan_1" name="pilihan_1" class="readonly select2bs4 form-control @error('pilihan_1') is-invalid @enderror">
                            <option  value="">-- Select {{ __('Ekstrakulikuler') }} --</option>
                                @foreach ($DataEkstra as $data)
					                @if($data->nama_ekstra == 'Room Division')
                                		<option value=""></option>
                                	@else
						                <option value="{{ $data->nama_ekstra }}" {{ old('pilihan_1') == $data->nama_ekstra || $ekstra->pilihan_1 == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
					                @endif
				                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="valid2" class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_2">Ekstra Pilihan 2</label>
                            <select onchange="unlock_pil3()" disabled id="pilihan_2" name="pilihan_2" class="select2bs4 form-control @error('pilihan_2') is-invalid @enderror">
                                <option value="">-- Select {{ __('Ekstrakulikuler') }} --</option>
                                @foreach ($DataEkstra as $data)
					@if($data->nama_ekstra == 'Room Division')
                                		<option value=""></option>
                                	@else
						<option value="{{ $data->nama_ekstra }}" {{ old('pilihan_2') == $data->nama_ekstra || $ekstra->pilihan_2 == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
                                	@endif
				@endforeach
                            </select>
                        </div>
                    </div>

                    <div id="valid3" class="col-md-12">
                        <div class="form-group">
                            <label for="pilihan_3">Ekstra Pilihan 3</label>
                            <select id="pilihan_3" disabled name="pilihan_3" class="select2bs4 form-control @error('pilihan_3') is-invalid @enderror">
                                <option value="">-- Select {{ __('Ekstrakulikuler') }} --</option>
                                @foreach ($DataEkstra as $data)
					@if($data->nama_ekstra == 'Room Division')
                                		<option value=""></option>
                                	@else
						<option value="{{ $data->nama_ekstra }}" {{ old('pilihan_3') == $data->nama_ekstra || $ekstra->pilihan_3 == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
					@endif
				@endforeach
                            </select>
                        </div>
                    </div>
		   <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="nama">Nomer Handphone</label>
                            <input type="number" id="no_hp" name="no_hp" value="{{ Auth::user()->ekstrakulikuler(Auth::user()->id)->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>
                    </div>
    
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('ekstrakulikuler.indexSiswa') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;

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
    $("#EkstraSiswa").addClass("active");

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