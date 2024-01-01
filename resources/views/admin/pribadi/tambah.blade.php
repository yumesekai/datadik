@extends('template_backend.home')
@section('heading', 'Tambah Data Pribadi')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('pribadi.index') }}">Data Pribadi</a></li>
<li class="breadcrumb-item active">Tambah Data Pribadi</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pribadi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pribadi.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <select id="nama" name="nama" class="select2bs4 form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                <option value="">-- Cari Nama --</option>
                                @foreach ($user as $data)
                                <option value="{{ $data->id }}" {{ old('nama') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror" value="{{ old('jk') }}">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" id="nokk" name="nokk" class="form-control @error('nokk') is-invalid @enderror" value="{{ old('nokk') }}">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                <option value="Kepercayaan kpd Tuhan YME" {{ old('agama') == 'Kepercayaan kpd Tuhan YME' ? 'selected' : '' }}>Kepercayaan kpd Tuhan YME</option>
                                <option value="lainnya" {{ old('agama') == 'lainnya' ? 'selected' : '' }}>lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror" value="{{ old('tmp_lahir') }}">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" id="desa" name="desa" class="form-control @error('desa') is-invalid @enderror" value="{{ old('desa') }}">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="kelurahan">kelurahan</label>
                            <input type="text" id="kelurahan" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" value="{{ old('kelurahan') }}">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="tmp_tinggal">Tempat Tinggal</label>
                            <select id="tmp_tinggal" name="tmp_tinggal" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Tempat Tinggal --</option>
                                <option value="Orang Tua" {{ old('tmp_tinggal') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                <option value="Wali" {{ old('tmp_tinggal') == 'Wali' ? 'selected' : '' }}>Wali</option>
                                <option value="Kost" {{ old('tmp_tinggal') == 'Kost' ? 'selected' : '' }}>Kost</option>
                                <option value="Asrama" {{ old('tmp_tinggal') == 'Asrama' ? 'selected' : '' }}>Asrama</option>
                                <option value="Pantai Asuhan" {{ old('tmp_tinggal') == 'Pantai Asuhan' ? 'selected' : '' }}>Pantai Asuhan</option>
                                <option value="Pesantren" {{ old('tmp_tinggal') == 'Pesantren' ? 'selected' : '' }}>Pesantren</option>
                                <option value="Lainnya" {{ old('tmp_tinggal') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="transport">Mode Transportasi</label>
                            <select id="transport" name="transport" class="select2bs4 form-control @error('transport') is-invalid @enderror" value="{{ old('transport') }}">
                                <option value="">-- Pilih Mode Transportasi --</option>
                                <option value="Jalan Kaki" {{ old('transport') == 'Jalan Kaki' ? 'selected' : '' }}>Jalan Kaki</option>
                                <option value="Angkutan umum/bus/pete-pete" {{ old('transport') == 'Angkutan umum/bus/pete-pete' ? 'selected' : '' }}>Angkutan umum/bus/pete-pete</option>
                                <option value="Mobil/bus antar jemput" {{ old('transport') == 'Mobil/bus antar jemput' ? 'selected' : '' }}>Mobil/bus antar jemput</option>
                                <option value="Kereta Api" {{ old('transport') == 'Kereta Api' ? 'selected' : '' }}>Kereta Api</option>
                                <option value="Ojek" {{ old('transport') == 'Ojek' ? 'selected' : '' }}>Ojek</option>
                                <option value="Andong/bendi/sado/dokar/delman/becak" {{ old('transport') == 'Andong/bendi/sado/dokar/delman/becak' ? 'selected' : '' }}>Andong/bendi/sado/dokar/delman/becak</option>
                                <option value="Perahu penyeberangan/rakit/getek" {{ old('transport') == 'Perahu penyeberangan/rakit/getek' ? 'selected' : '' }}>Perahu penyeberangan/rakit/getek</option>
                                <option value="Kuda" {{ old('transport') == 'Kuda' ? 'selected' : '' }}>Kuda</option>
                                <option value="Sepeda" {{ old('transport') == 'Sepeda' ? 'selected' : '' }}>Sepeda</option>
                                <option value="Sepeda Motor" {{ old('transport') == 'Sepeda Motor' ? 'selected' : '' }}>Sepeda Motor</option>
                                <option value="Mobil Pribadi" {{ old('transport') == 'Mobil Pribadi' ? 'selected' : '' }}>Mobil Pribadi</option>
                                <option value="Lainnya" {{ old('transport') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke- (Sesuai KK)</label>
                            <input type="number" id="anak_ke" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" value="{{ old('anak_ke') }}">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="no_tlp">Nomer Telpon (Orang Tua)</label>
                            <input type="number" id="no_tlp" name="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror" value="{{ old('no_tlp') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_hp">Nomer Telpon (Siswa)</label>
                            <input type="number" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="beasiswa">Beasiswa</label>
                            <select id="beasiswa" name="beasiswa" class="select2bs4 form-control @error('beasiswa') is-invalid @enderror">
                                <option value="Tidak" {{ old('beasiswa') == 'Tidak' ? 'selected' : '' }}>Tidak Mengajukan Beasiswa</option>
                                <option value="Memiliki KPS/PKH" {{ old('beasiswa') == 'Memiliki KPS/PKH' ? 'selected' : '' }}>Memiliki KPS/PKH</option>
                                <option value="Memiliki KIP" {{ old('beasiswa') == 'Memiliki KIP' ? 'selected' : '' }}>Memiliki KIP</option>
                                <option value="Orang Tua Sudah Meninggal" {{ old('beasiswa') == 'Orang Tua Sudah Meninggal' ? 'selected' : '' }}>Orang Tua Sudah Meninggal</option>
                            </select>
                        </div>
                    </div>
                    <div id="kk_required" class="col-md-4 required">
                        <div class="form-group">
                            <label for="foto">Upload Kartu Keluarga <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_kk" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('berkas_kk') is-invalid @enderror" id="berkas_kk">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="kk_required" class="col-md-4 required">
                        <div class="form-group">
                            <label for="foto">Upload Ijasah <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_ijasah" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('berkas_ijasah') is-invalid @enderror" id="berkas_ijasah">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="beasiswa_required" class="col-md-4">
                        <div class="form-group has-validation">
                            <label for="foto">Upload Beasiswa <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_beasiswa" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('berkas_beasiswa') is-invalid @enderror" id="berkas_beasiswa">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="{{ route('pribadi.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#DataSiswa").addClass("active");
    $("#liDataSiswa").addClass("menu-open");
    $("#pribadi").addClass("active");
</script>
@endsection