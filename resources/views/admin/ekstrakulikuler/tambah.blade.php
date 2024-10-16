@extends('template_backend.home')
@section('heading', 'Tambah Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('DataEkstrakulikuler.index') }}">Data Ekstrakulikuler</a></li>
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
        <form action="{{ route('DataEkstrakulikuler.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row required">
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="nama ekstra">Nama Ekstrakulikuler</label>
                            <input type="text" id="nama_ekstra" name="nama_ekstra" class="form-control @error('nama_ekstra') is-invalid @enderror" value="{{ old('nama_ekstra') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="user_id">Pembina Ekstrakulikuler</label>
                            <select id="user_id" name="user_id" class="select2bs4 form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}">
                                <option value="">-- Pilih Pembina Ekstrakulikuler --</option>
                                @foreach($user as $data)
                                <option value="{{ $data->id }}" {{ old('user_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="jenis_ekstra">Jenis Ekstrakulikuler</label>
                            <select id="jenis_ekstra" name="jenis_ekstra" class="select2bs4 form-control @error('jenis_ekstra') is-invalid @enderror" value="{{ old('jenis_ekstra') }}">
                                <option value="">-- Pilih Jenis Ekstrakulikuler --</option>
                                <option value="wajib" {{ old('jenis_ekstra') == 'L' ? 'selected' : '' }}>WAJIB</option>
                                <option value="umum" {{ old('jenis_ekstra') == 'P' ? 'selected' : '' }}>UMUM</option>
                            </select>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('DataEkstrakulikuler.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#PembinaEkskul").addClass("active");
    $("#liPembinaEkskul").addClass("menu-open");
    $("#Ekstrakulikuler").addClass("active");
</script>
@endsection