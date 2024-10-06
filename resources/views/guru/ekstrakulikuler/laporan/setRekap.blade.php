@extends('template_backend.home')
@section('heading', 'Tambah Laporan Ekskul')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('kelas.index') }}">Laporan Ekskul</a></li>
<li class="breadcrumb-item active">Tambah Laporan Ekskul</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pilih Ekstrakurikuler</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('LaporanEkskul.updateRekap',$laporan->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                <label for="kegiatan_ekskul_m1">Minggu Ke-1</label>
                    <div class="col-md-12">
                        <div class="form-group">
                             <label for="kegiatan_ekskul_m1">Hari Sabtu Minggu Ke-1</label>
                            <textarea id="kegiatan_ekskul_m1" name="kegiatan_ekskul_m1" class="form-control @error('kegiatan_ekskul_m1') is-invalid @enderror">{{ old('kegiatan_ekskul_m1', $laporan->kegiatan_ekskul_m1 ?? '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="tmp_pelaksanaan_m1">Hari Sabtu Minggu Ke-1</label>
                            <input type="text" id="tmp_pelaksanaan_m1" name="tmp_pelaksanaan_m1" class="form-control @error('tmp_pelaksanaan_m1') is-invalid @enderror" value="{{ old('tmp_pelaksanaan_m1', $laporan->tmp_pelaksanaan_m1 ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="jml_peserta_m1">Jumlah Peserta</label>
                            <input type="number" id="jml_peserta_m1" name="jml_peserta_m1" class="form-control @error('jml_peserta_m1') is-invalid @enderror" value="{{ old('jml_peserta_m1', $laporan->jml_peserta_m1 ?? '') }}">
                        </div>
                    </div>
                    <div id="beasiswa_required" class="col-md-4">
                        <div class="form-group has-validation">
                            <label for="foto">Upload Foto Kegiatan <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_ekskul_m1" id="foto_ekskul_m1" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('foto_ekskul_m1') is-invalid @enderror">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                            <br>
                            <img src="{{ asset(''.$laporan->foto_ekskul_m1) }}" width="150">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body-Kegiatan-1 -->

            <div id="footer_laporan" class="card-footer d-none">
                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="{{route('LaporanEkskul.index')}}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Ubah</button>
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