@extends('template_backend.home')
@section('heading', 'Tambah Laporan Ekskul')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('LaporanEkskul.index') }}">Laporan Ekstrakurikuler</a></li>
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
        <form action="{{ route('LaporanEkskul.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                
                @if(Auth::user()->role == 'Admin')
                    <div class="col-md-12 required">
                        <div class="form-group">
                        <label for="pembina_ekskul">Pembina Ekstrakurikuler</label>
                            <select id="pembina_ekskul" name="pembina_ekskul" class="select2bs4 form-control @error('pembina_ekskul') is-invalid @enderror">
                                <option value="">-- Select {{ __('Pembina') }} --</option>
                                    @foreach ($user as $data)
						            <option value="{{ $data->id }}" {{ old('pembina_ekskul') == $data->name ? 'selected' : '' }}>{{ $data->name }}</option>
				                    @endforeach
                            </select>
                        </div>
                    </div>
                @else
                <input readonly type="text" id="pembina_ekskul" name="pembina_ekskul" class="form-control @error('pembina_ekskul') is-invalid @enderror d-none" value="{{ Auth::User()->id }}">
                   <div class="col-md-12">
                        <div class="form-group">
                        <label for="pembina_ekskul">Pembina Ekstrakurikuler</label>
                            <input readonly type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::User()->name }}">
                        </div>
                    </div>
                @endif
                    <div class="col-md-12 required">
                        <div class="form-group">
                        <label for="nama_ekskul">Ekstrakurikuler</label>
                            <select id="nama_ekskul" name="nama_ekskul" class="select2bs4 form-control @error('nama_ekskul') is-invalid @enderror">
                                <option value="">-- Select {{ __('Ekstrakulikuler') }} --</option>
                                    @foreach ($ekskul as $data)
						            <option value="{{ $data->nama_ekstra }}" {{ old('nama_ekskul') == $data->nama_ekstra ? 'selected' : '' }}>{{ $data->nama_ekstra }}</option>
				                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                        <label for="nama_ekskul">Jumlah Kegiatan</label>
                            <select id="jml_kegiatan" name="jml_kegiatan" class="select2bs4 form-control @error('jml_kegiatan') is-invalid @enderror">
                                <option value="">-- Select {{ __('Jumlah Kegiatan') }} --</option>
						            <option value="1" {{ old('jml_kegiatan') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('jml_kegiatan') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('jml_kegiatan') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('jml_kegiatan') == '4' ? 'selected' : '' }}>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a type="button" onclick="jml_kegiatan_pil()" class="btn btn-primary text-white"><i class="nav-icon fas fa-save"></i> &nbsp; Tampilkan</a>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body -->


            <div id="laporan_m1" class="card card-primary d-none">
            <div class="card-header">
                <h3 class="card-title">Laporan Ekstrakurikuler Kegiatan 1</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <label for="kegiatan_ekskul_m1">Kegiatan Ekstrakurikuler</label>
                            <textarea id="kegiatan_ekskul_m1" name="kegiatan_ekskul_m1" class="form-control @error('kegiatan_ekskul_m1') is-invalid @enderror">{{ old('kegiatan_ekskul_m1') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="tgl_pelaksanaan_m1">Tanggal Pelaksanaa</label>
                            <input type="date" id="tgl_pelaksanaan_m1" name="tgl_pelaksanaan_m1" class="form-control @error('tgl_pelaksanaan_m1') is-invalid @enderror" value="{{ old('tgl_pelaksanaan_m1') }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="tmp_pelaksanaan_m1">Tempat Pelaksanaa</label>
                            <input type="text" id="tmp_pelaksanaan_m1" name="tmp_pelaksanaan_m1" class="form-control @error('tmp_pelaksanaan_m1') is-invalid @enderror" value="{{ old('tmp_pelaksanaan_m1') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="jml_peserta_m1">Jumlah Peserta</label>
                            <input type="number" id="jml_peserta_m1" name="jml_peserta_m1" class="form-control @error('jml_peserta_m1') is-invalid @enderror" value="{{ old('jml_peserta_m1') }}">
                        </div>
                    </div>
                    <div id="beasiswa_required" class="col-md-6">
                        <div class="form-group has-validation">
                            <label for="foto">Upload Foto Kegiatan <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_ekskul_m1" id="foto_ekskul_m1" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('foto_ekskul_m1') is-invalid @enderror">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body-Kegiatan-1 -->

            <!-- /.card-body-Kegiatan-2 -->
            <div id="laporan_m2" class="card card-primary d-none">
            <div class="card-header">
                <h3 class="card-title">Laporan Ekstrakurikuler Kegiatan 2</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <label for="kegiatan_ekskul_m2">Kegiatan Ekstrakurikuler</label>
                            <textarea id="kegiatan_ekskul_m2" name="kegiatan_ekskul_m2" class="form-control @error('kegiatan_ekskul_m2') is-invalid @enderror">{{ old('kegiatan_ekskul_m2') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="tgl_pelaksanaan_m2">Tanggal Pelaksanaa</label>
                            <input type="date" id="tgl_pelaksanaan_m2" name="tgl_pelaksanaan_m2" class="form-control @error('tgl_pelaksanaan_m2') is-invalid @enderror" value="{{ old('tgl_pelaksanaan_m2') }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="tmp_pelaksanaan_m2">Tempat Pelaksanaa</label>
                            <input type="text" id="tmp_pelaksanaan_m2" name="tmp_pelaksanaan_m2" class="form-control @error('tmp_pelaksanaan_m2') is-invalid @enderror" value="{{ old('tmp_pelaksanaan_m2') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="jml_peserta_m2">Jumlah Peserta</label>
                            <input type="number" id="jml_peserta_m2" name="jml_peserta_m2" class="form-control @error('jml_peserta_m2') is-invalid @enderror" value="{{ old('jml_peserta_m2') }}">
                        </div>
                    </div>
                    <div id="beasiswa_required" class="col-md-6">
                        <div class="form-group has-validation">
                            <label for="foto">Upload Foto Kegiatan <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_ekskul_m2" id="foto_ekskul_m2" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('foto_ekskul_m2') is-invalid @enderror" >
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body-Kegiatan-2 -->

            <!-- /.card-body-Kegiatan-3 -->
            <div id="laporan_m3" class="card card-primary d-none">
            <div class="card-header">
                <h3 class="card-title">Laporan Ekstrakurikuler Kegiatan 3</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <label for="kegiatan_ekskul_m3">Kegiatan Ekstrakurikuler</label>
                            <textarea id="kegiatan_ekskul_m3" name="kegiatan_ekskul_m3" class="form-control @error('kegiatan_ekskul_m3') is-invalid @enderror">{{ old('kegiatan_ekskul_m3') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="tgl_pelaksanaan_m3">Tanggal Pelaksanaa</label>
                            <input type="date" id="tgl_pelaksanaan_m3" name="tgl_pelaksanaan_m3" class="form-control @error('tgl_pelaksanaan_m3') is-invalid @enderror" value="{{ old('tgl_pelaksanaan_m3') }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="tmp_pelaksanaan_m3">Tempat Pelaksanaa</label>
                            <input type="text" id="tmp_pelaksanaan_m3" name="tmp_pelaksanaan_m3" class="form-control @error('tmp_pelaksanaan_m3') is-invalid @enderror" value="{{ old('tmp_pelaksanaan_m3') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="jml_peserta_m3">Jumlah Peserta</label>
                            <input type="number" id="jml_peserta_m3" name="jml_peserta_m3" class="form-control @error('jml_peserta_m3') is-invalid @enderror" value="{{ old('jml_peserta_m3') }}">
                        </div>
                    </div>
                    <div id="beasiswa_required" class="col-md-12">
                        <div class="form-group has-validation">
                            <label for="foto">Upload Foto Kegiatan <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_ekskul_m3" id="foto_ekskul_m3" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('foto_ekskul_m3') is-invalid @enderror">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body-Kegiatan-3 -->

            <!-- /.card-body-Kegiatan-4 -->
            <div id="laporan_m4" class="card card-primary d-none">
            <div class="card-header">
                <h3 class="card-title">Laporan Ekstrakurikuler Kegiatan 4</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <label for="kegiatan_ekskul_m4">Kegiatan Ekstrakurikuler</label>
                            <textarea id="kegiatan_ekskul_m4" name="kegiatan_ekskul_m4" class="form-control @error('kegiatan_ekskul_m4') is-invalid @enderror">{{ old('kegiatan_ekskul_m4') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="tgl_pelaksanaan_m4">Tanggal Pelaksanaa</label>
                            <input type="date" id="tgl_pelaksanaan_m4" name="tgl_pelaksanaan_m4" class="form-control @error('tgl_pelaksanaan_m4') is-invalid @enderror" value="{{ old('tgl_pelaksanaan_m4') }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="tmp_pelaksanaan_m4">Tempat Pelaksanaa</label>
                            <input type="text" id="tmp_pelaksanaan_m4" name="tmp_pelaksanaan_m4" class="form-control @error('tmp_pelaksanaan_m4') is-invalid @enderror" value="{{ old('tmp_pelaksanaan_m4') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="jml_peserta_m4">Jumlah Peserta</label>
                            <input type="number" id="jml_peserta_m4" name="jml_peserta_m4" class="form-control @error('jml_peserta_m4') is-invalid @enderror" value="{{ old('jml_peserta_m4') }}">
                        </div>
                    </div>
                    <div id="beasiswa_required" class="col-md-6">
                        <div class="form-group has-validation">
                            <label for="foto">Upload Foto Kegiatan <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_ekskul_m4" id="foto_ekskul_m4" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('foto_ekskul_m4') is-invalid @enderror">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.card-body-minggu-4 -->

            <div id="footer_laporan" class="card-footer d-none">
                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="{{route('LaporanEkskul.index')}}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambah</button>
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
    $("#LaporanEkskul").addClass("active");

    function jml_kegiatan_pil() {
        if (document.getElementById("jml_kegiatan").value == '1') {
            document.getElementById("laporan_m1").classList.remove("d-none"); 
            document.getElementById("footer_laporan").classList.remove("d-none");     
            document.getElementById("laporan_m2").classList.add("d-none");
            document.getElementById("laporan_m3").classList.add("d-none");
            document.getElementById("laporan_m4").classList.add("d-none");
        }else if(document.getElementById("jml_kegiatan").value == '2'){
            document.getElementById("laporan_m1").classList.remove("d-none");
            document.getElementById("laporan_m2").classList.remove("d-none");
            document.getElementById("footer_laporan").classList.remove("d-none"); 
            document.getElementById("laporan_m3").classList.add("d-none");
            document.getElementById("laporan_m4").classList.add("d-none");
        }else if(document.getElementById("jml_kegiatan").value == '3'){
            document.getElementById("laporan_m1").classList.remove("d-none");
            document.getElementById("laporan_m2").classList.remove("d-none");
            document.getElementById("laporan_m3").classList.remove("d-none");
            document.getElementById("footer_laporan").classList.remove("d-none");
            document.getElementById("laporan_m4").classList.add("d-none");
        }else if(document.getElementById("jml_kegiatan").value == '4'){
            document.getElementById("laporan_m1").classList.remove("d-none");
            document.getElementById("laporan_m2").classList.remove("d-none");
            document.getElementById("laporan_m3").classList.remove("d-none");
            document.getElementById("laporan_m4").classList.remove("d-none");
            document.getElementById("footer_laporan").classList.remove("d-none"); 
        }else{
            document.getElementById("laporan_m1").classList.add("d-none");
            document.getElementById("laporan_m2").classList.add("d-none");
            document.getElementById("laporan_m3").classList.add("d-none");
            document.getElementById("laporan_m4").classList.add("d-none");
            document.getElementById("footer_laporan").classList.add("d-none"); 
        }
            
    }
</script>
@endsection