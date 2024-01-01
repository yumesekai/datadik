@extends('template_backend.home')
@section('heading', 'Perbaiki Data Pribadi')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('pribadi.siswa') }}">Data Pribadi</a></li>
<li class="breadcrumb-item active">Perbaiki Data Pribadi</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" style="background-color: rgba(0,0,0,.03);">
            <b>CATATAN</b>
        </div>
        <div class="col-md-12">
            <div class="card-body" style="font-size: 15px;">
                <ul>
                    <li>Data yang berisi tanda <a style="font-size: 200; color: red;"> * </a> <b>WAJIB di isi</b></li>
                    <li>Tidak perlu mengupload berkas beasiswa jika memilih <b>TIDAK MENGAJUKAN BEASISWA </b></li>
                    <li>Pastikan semua data sudah SESUAI sebelum menekan tombol simpan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Perbaiki Data Pribadi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pribadi.updateSiswa') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="text" id="id" name="id" value="{{ Auth::user()->id }}" class="form-control d-none" readonly>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->nisn }}" class="form-control @error('nisn') is-invalid @enderror"">
                        </div>
                        <div class=" form-group required">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input readonly type="text" id="kelas" name="kelas" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->kelas }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" @if (Auth::user()->tem_pribadi(Auth::user()->id)->jk == 'L')
                                    selected
                                    @endif
                                    >Laki-Laki</option>
                                <option value="P" @if (Auth::user()->tem_pribadi(Auth::user()->id)->jk == 'P')
                                    selected
                                    @endif
                                    >Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" id="nokk" name="nokk" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->nokk }}" class="form-control @error('nokk') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" id="nik" name="nik" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->nik }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Budha" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Budha')
                                    selected
                                    @endif
                                    >Budha</option>
                                <option value="Hindu" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Hindu')
                                    selected
                                    @endif
                                    >Hindu</option>
                                <option value="Islam" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Islam')
                                    selected
                                    @endif
                                    >Islam</option>
                                <option value="Kristen" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Kristen')
                                    selected
                                    @endif
                                    >Kristen</option>
                                <option value="Katholik" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Katholik')
                                    selected
                                    @endif
                                    >Katholik</option>
                                <option value="Khonghucu" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Khonghucu')
                                    selected
                                    @endif
                                    >Khonghucu</option>
                                <option value="Kepercayaan kpd Tuhan YME" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'Kepercayaan kpd Tuhan YME')
                                    selected
                                    @endif
                                    >Kepercayaan kpd Tuhan YME</option>
                                <option value="lainnya" @if (Auth::user()->tem_pribadi(Auth::user()->id)->agama == 'lainnya')
                                    selected
                                    @endif
                                    >lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" id="desa" name="desa" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->desa }}" class="form-control @error('desa') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="kelurahan">kelurahan</label>
                            <input type="text" id="kelurahan" name="kelurahan" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->kelurahan }}" class="form-control @error('kelurahan') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="tmp_tinggal">Tempat Tinggal</label>
                            <select id="tmp_tinggal" name="tmp_tinggal" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Tempat Tinggal --</option>
                                <option value="Orang Tua" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Orang Tua')
                                    selected
                                    @endif
                                    >Orang Tua</option>
                                <option value="Wali" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Wali')
                                    selected
                                    @endif
                                    >Wali</option>
                                <option value="Kost" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Kost')
                                    selected
                                    @endif
                                    >Kost</option>
                                <option value="Asrama" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Asrama')
                                    selected
                                    @endif
                                    >Asrama</option>
                                <option value="Orang Tua" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Orang Tua')
                                    selected
                                    @endif
                                    >Orang Tua</option>
                                <option value="Pantai Asuhan" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Pantai Asuhan')
                                    selected
                                    @endif
                                    >Pantai Asuhan</option>
                                <option value="Pesantren" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Pesantren')
                                    selected
                                    @endif
                                    >Pesantren</option>
                                <option value="Lainnya" @if (Auth::user()->tem_pribadi(Auth::user()->id)->tmp_tinggal == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="transport">Mode Transportasi</label>
                            <select id="transport" name="transport" class="select2bs4 form-control @error('transport') is-invalid @enderror">
                                <option value="">-- Pilih Mode Transportasi --</option>
                                <option value="Jalan Kaki" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Jalan Kaki')
                                    selected
                                    @endif
                                    >Jalan Kaki</option>
                                <option value="Angkutan umum/bus/pete-pete" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Angkutan umum/bus/pete-pete')
                                    selected
                                    @endif
                                    >Angkutan umum/bus/pete-pete</option>
                                <option value="Mobil/bus antar jemput" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Mobil/bus antar jemput')
                                    selected
                                    @endif
                                    >Mobil/bus antar jemput</option>
                                <option value="Kereta Api" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Kereta Api')
                                    selected
                                    @endif
                                    >Kereta Api</option>
                                <option value="Ojek" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Ojek')
                                    selected
                                    @endif
                                    >Ojek</option>
                                <option value="Andong/bendi/sado/dokar/delman/becak" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Andong/bendi/sado/dokar/delman/becak')
                                    selected
                                    @endif
                                    >Andong/bendi/sado/dokar/delman/becak</option>
                                <option value="Perahu penyeberangan/rakit/getek" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Perahu penyeberangan/rakit/getek')
                                    selected
                                    @endif
                                    >Perahu penyeberangan/rakit/getek</option>
                                <option value="Kuda" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Kuda')
                                    selected
                                    @endif
                                    >Kuda</option>
                                <option value="Sepeda" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Sepeda')
                                    selected
                                    @endif
                                    >Sepeda</option>
                                <option value="Sepeda Motor" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Sepeda Motor')
                                    selected
                                    @endif
                                    >Sepeda Motor</option>
                                <option value="Mobil tem_pribadi" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Mobil tem_pribadi')
                                    selected
                                    @endif
                                    >Mobil tem_pribadi</option>
                                <option value="Lainnya" @if (Auth::user()->tem_pribadi(Auth::user()->id)->transport == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke- (Sesuai KK)</label>
                            <input type="number" id="anak_ke" name="anak_ke" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->anak_ke }}" class="form-control @error('anak_ke') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="no_tlp">Nomer Telpon (Orang Tua)</label>
                            <input type="number" id="no_tlp" name="no_tlp" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->no_tlp }}" class="form-control @error('no_tlp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_hp">Nomer Telpon (Siswa)</label>
                            <input type="number" id="no_hp" name="no_hp" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->tem_pribadi(Auth::user()->id)->email }}" class="form-control @error('email') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="beasiswa">Beasiswa</label>
                            <select id="beasiswa" name="beasiswa" class="select2bs4 form-control @error('beasiswa') is-invalid @enderror">
                                <option value="Tidak" @if (Auth::user()->tem_pribadi(Auth::user()->id)->beasiswa == 'Tidak Mengajukan Beasiswa')
                                    selected
                                    @endif
                                    >Tidak Mengajukan Beasiswa</option>
                                <option value="Memiliki KPS/PKH" @if (Auth::user()->tem_pribadi(Auth::user()->id)->beasiswa == 'Memiliki KPS/PKH')
                                    selected
                                    @endif
                                    >Memiliki KPS/PKH</option>
                                <option value="Memiliki KIP" @if (Auth::user()->tem_pribadi(Auth::user()->id)->beasiswa == 'Memiliki KIP')
                                    selected
                                    @endif
                                    >Memiliki KIP</option>
                                <option value="Orang Tua Sudah Meninggal" @if (Auth::user()->tem_pribadi(Auth::user()->id)->beasiswa == 'Orang Tua Sudah Meninggal')
                                    selected
                                    @endif
                                    >Orang Tua Sudah Meninggal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Upload Kartu Keluarga <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_kk" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('berkas_kk') is-invalid @enderror" id="berkas_kk">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="image-area">
                                    <p><a href="{{ asset(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_kk) }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_kk) }}" width="100px" height="100px" class="img-fluid mb-2">
                                        </a></p>
                                        <a class="remove-image" style="display: inline; color:#fff;"><i class="fa-solid fa-check fa-xs"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Upload Ijasah <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_ijasah" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('berkas_ijasah') is-invalid @enderror" id="berkas_ijasah">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="image-area">
                                    <p><a href="{{ asset(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_ijasah) }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_ijasah) }}" width="100px" height="100px" class="img-fluid mb-2">
                                        </a></p>
                                        <a class="remove-image" style="display: inline; color:#fff;"><i class="fa-solid fa-check fa-xs"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Upload Beasiswa <a style="font-size: 12px;">(png/jpg|max: 1MB)</a></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_beasiswa" accept="image/png, image/jpg, image/jpeg" class="custom-file-input @error('berkas_beasiswa') is-invalid @enderror" id="berkas_beasiswa">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_beasiswa != '')
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="image-area">
                                    <p><a href="{{ asset(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_beasiswa) }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ asset(Auth::user()->tem_pribadi(Auth::user()->id)->berkas_beasiswa) }}" width="100px" height="100px" class="img-fluid mb-2">
                                        </a></p>
                                        <a class="remove-image" style="display: inline; color:#fff;"><i class="fa-solid fa-check fa-xs"></i></a>
                                </div>
                            </div>
                        </div>
                        @else
                        @endif
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
                    <a href="{{ route('pribadi.siswa') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;

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
    $("#PribadiSiswa").addClass("active");
</script>
@endsection