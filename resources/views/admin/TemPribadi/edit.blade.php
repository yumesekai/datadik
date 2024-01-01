@extends('template_backend.home')
@section('heading', 'Detail Pengajuan Data Pribadi')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('TemPribadi.index') }}">Pengajuan Data Pribadi</a></li>
<li class="breadcrumb-item active">Detail Pengajuan Data Pribadi</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Pengajuan Data Pribadi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('TemPribadi.update', $tem_pribadi->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <input type="text" id="id" name="id" value="{{ $tem_pribadi->id }}" class="form-control d-none" readonly>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Baru</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Lama</h4>
                        </div>
                    </div>

                    <!-- /.start Data Baru -->
                    <div class="col-md-6">
                        <div class="form-group required">
                            <label id="nisn_cek" class="">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="{{ $tem_pribadi->nisn }}" class="form-control @error('nisn') is-invalid @enderror">
                        </div>
                        <div class="form-group required">
                            <label id="nama_cek" class="">Nama</label>
                            <input type="text" id="nama" name="nama" value="{{ $tem_pribadi->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="jk_cek" class="">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" @if ($tem_pribadi->jk == 'L')
                                    selected
                                    @endif
                                    >Laki-Laki</option>
                                <option value="P" @if ($tem_pribadi->jk == 'P')
                                    selected
                                    @endif
                                    >Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label id="nokk_cek" class="">No KK</label>
                            <input type="text" id="nokk" name="nokk" value="{{ $tem_pribadi->nokk }}" class="form-control @error('nokk') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="nik_cek" class="">NIK</label>
                            <input type="text" id="nik" name="nik" value="{{ $tem_pribadi->nik }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="agama_cek" class="">Agama</label>
                            <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Budha" @if ($tem_pribadi->agama == 'Budha')
                                    selected
                                    @endif
                                    >Budha</option>
                                <option value="Hindu" @if ($tem_pribadi->agama == 'Hindu')
                                    selected
                                    @endif
                                    >Hindu</option>
                                <option value="Islam" @if ($tem_pribadi->agama == 'Islam')
                                    selected
                                    @endif
                                    >Islam</option>
                                <option value="Kristen" @if ($tem_pribadi->agama == 'Kristen')
                                    selected
                                    @endif
                                    >Kristen</option>
                                <option value="Katholik" @if ($tem_pribadi->agama == 'Katholik')
                                    selected
                                    @endif
                                    >Katholik</option>
                                <option value="Khonghucu" @if ($tem_pribadi->agama == 'Khonghucu')
                                    selected
                                    @endif
                                    >Khonghucu</option>
                                <option value="Kepercayaan kpd Tuhan YME" @if ($tem_pribadi->agama == 'Kepercayaan kpd Tuhan YME')
                                    selected
                                    @endif
                                    >Kepercayaan kpd Tuhan YME</option>
                                <option value="lainnya" @if ($tem_pribadi->agama == 'lainnya')
                                    selected
                                    @endif
                                    >lainnya</option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label id="tmp_lahir_cek" class="">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $tem_pribadi->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="tgl_lahir_cek" class="">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $tem_pribadi->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="alamat_cek" class="">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="{{ $tem_pribadi->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="desa_cek" class="">Desa</label>
                            <input type="text" id="desa" name="desa" value="{{ $tem_pribadi->desa }}" class="form-control @error('desa') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="kelurahan_cek" class="">kelurahan</label>
                            <input type="text" id="kelurahan" name="kelurahan" value="{{ $tem_pribadi->kelurahan }}" class="form-control @error('kelurahan') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="tmp_tinggal_cek" class="" for="tmp_tinggal">Tempat Tinggal</label>
                            <select id="tmp_tinggal" name="tmp_tinggal" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Tempat Tinggal --</option>
                                <option value="Orang Tua" @if ($tem_pribadi->tmp_tinggal == 'Orang Tua')
                                    selected
                                    @endif
                                    >Orang Tua</option>
                                <option value="Wali" @if ($tem_pribadi->tmp_tinggal == 'Wali')
                                    selected
                                    @endif
                                    >Wali</option>
                                <option value="Kost" @if ($tem_pribadi->tmp_tinggal == 'Kost')
                                    selected
                                    @endif
                                    >Kost</option>
                                <option value="Asrama" @if ($tem_pribadi->tmp_tinggal == 'Asrama')
                                    selected
                                    @endif
                                    >Asrama</option>
                                <option value="Orang Tua" @if ($tem_pribadi->tmp_tinggal == 'Orang Tua')
                                    selected
                                    @endif
                                    >Orang Tua</option>
                                <option value="Pantai Asuhan" @if ($tem_pribadi->tmp_tinggal == 'Pantai Asuhan')
                                    selected
                                    @endif
                                    >Pantai Asuhan</option>
                                <option value="Pesantren" @if ($tem_pribadi->tmp_tinggal == 'Pesantren')
                                    selected
                                    @endif
                                    >Pesantren</option>
                                <option value="Lainnya" @if ($tem_pribadi->tmp_tinggal == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label id="transport_cek" for="transport">Mode Transportasi</label>
                            <select id="transport" name="transport" class="select2bs4 form-control @error('transport') is-invalid @enderror">
                                <option value="">-- Pilih Mode Transportasi --</option>
                                <option value="Jalan Kaki" @if ($tem_pribadi->transport == 'Jalan Kaki')
                                    selected
                                    @endif
                                    >Jalan Kaki</option>
                                <option value="Angkutan umum/bus/pete-pete" @if ($tem_pribadi->transport == 'Angkutan umum/bus/pete-pete')
                                    selected
                                    @endif
                                    >Angkutan umum/bus/pete-pete</option>
                                <option value="Mobil/bus antar jemput" @if ($tem_pribadi->transport == 'Mobil/bus antar jemput')
                                    selected
                                    @endif
                                    >Mobil/bus antar jemput</option>
                                <option value="Kereta Api" @if ($tem_pribadi->transport == 'Kereta Api')
                                    selected
                                    @endif
                                    >Kereta Api</option>
                                <option value="Ojek" @if ($tem_pribadi->transport == 'Ojek')
                                    selected
                                    @endif
                                    >Ojek</option>
                                <option value="Andong/bendi/sado/dokar/delman/becak" @if ($tem_pribadi->transport == 'Andong/bendi/sado/dokar/delman/becak')
                                    selected
                                    @endif
                                    >Andong/bendi/sado/dokar/delman/becak</option>
                                <option value="Perahu penyeberangan/rakit/getek" @if ($tem_pribadi->transport == 'Perahu penyeberangan/rakit/getek')
                                    selected
                                    @endif
                                    >Perahu penyeberangan/rakit/getek</option>
                                <option value="Kuda" @if ($tem_pribadi->transport == 'Kuda')
                                    selected
                                    @endif
                                    >Kuda</option>
                                <option value="Sepeda" @if ($tem_pribadi->transport == 'Sepeda')
                                    selected
                                    @endif
                                    >Sepeda</option>
                                <option value="Sepeda Motor" @if ($tem_pribadi->transport == 'Sepeda Motor')
                                    selected
                                    @endif
                                    >Sepeda Motor</option>
                                <option value="Mobil Pribadi" @if ($tem_pribadi->transport == 'Mobil Pribadi')
                                    selected
                                    @endif
                                    >Mobil Pribadi</option>
                                <option value="Lainnya" @if ($tem_pribadi->transport == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label id="anak_cek" for="anak_ke">Anak Ke- (Sesuai KK)</label>
                            <input type="number" id="anak_ke" name="anak_ke" value="{{ $tem_pribadi->anak_ke }}" class="form-control @error('anak_ke') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="no_tlp_cek" for="no_tlp">Nomer Telpon (Orang Tua)</label>
                            <input type="number" id="no_tlp" name="no_tlp" value="{{ $tem_pribadi->no_tlp }}" class="form-control @error('no_tlp') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label id="no_hp_cek" for="no_hp">Nomer Telpon (Siswa)</label>
                            <input type="number" id="no_hp" name="no_hp" value="{{ $tem_pribadi->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label id="email_cek" for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $tem_pribadi->email }}" class="form-control @error('email') is-invalid @enderror">
                        </div>

                        <div class="form-group required">
                            <label id="beasiswa_cek" for="beasiswa">Beasiswa</label>
                            <select id="beasiswa" name="beasiswa" class="select2bs4 form-control @error('beasiswa') is-invalid @enderror">
                                <option value="Tidak" @if ($tem_pribadi->beasiswa == 'Tidak Mengajukan Beasiswa')
                                    selected
                                    @endif
                                    >Tidak Mengajukan Beasiswa</option>
                                <option value="Memiliki KPS/PKH" @if ($tem_pribadi->beasiswa == 'Memiliki KPS/PKH')
                                    selected
                                    @endif
                                    >Memiliki KPS/PKH</option>
                                <option value="Memiliki KIP" @if ($tem_pribadi->beasiswa == 'Memiliki KIP')
                                    selected
                                    @endif
                                    >Memiliki KIP</option>
                                <option value="Orang Tua Sudah Meninggal" @if ($tem_pribadi->beasiswa == 'Orang Tua Sudah Meninggal')
                                    selected
                                    @endif
                                    >Orang Tua Sudah Meninggal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <strong id="berkas_kk_cek" class="">Berkas Kartu Keluarga</strong>
                            <p><a href="{{ asset($tem_pribadi->berkas_kk) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset($tem_pribadi->berkas_kk) }}" width="50px" height="50px" class="img-fluid mb-2">
                                    <input type="text" id="berkas_kk" name="berkas_kk" value="{{ $tem_pribadi->berkas_kk }}" class="form-control d-none" readonly>
                                </a></p>
                        </div>

                        <div class="form-group">
                            <strong id="berkas_ijasah_cek" class="">Berkas Ijasah</strong>
                            <p><a href="{{ asset($tem_pribadi->berkas_ijasah) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset($tem_pribadi->berkas_ijasah) }}" width="50px" height="50px" class="img-fluid mb-2">
                                    <input type="text" id="berkas_ijasah" name="berkas_ijasah" value="{{ $tem_pribadi->berkas_ijasah }}" class="form-control d-none" readonly>
                                </a></p>
                        </div>

                        <div class="form-group">
                            <strong id="berkas_beasiswa_cek" class=""> Berkas Beasiswa</strong>
                            <p><a href="{{ asset($tem_pribadi->berkas_beasiswa) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset($tem_pribadi->berkas_beasiswa) }}" width="50px" height="50px" class="img-fluid mb-2">
                                    <input type="text" id="berkas_beasiswa" name="berkas_beasiswa" value="{{ $tem_pribadi->berkas_beasiswa }}" class="form-control d-none" readonly>
                                </a></p>
                        </div>
                    </div>
                    <!-- /.end Data Baru -->

                    <!-- /.start Data Lama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input id="nisn_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->user->email }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input id="nama_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->user->name }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <input readonly id="jk_lama" type="text" value="{{ $tem_pribadi->pribadi->jk }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input id="nokk_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->nokk }}" class="form-control @error('nokk') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input id="nik_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->nik }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="Agama">Agama</label>
                            <input id="agama_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->agama }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input id="tmp_lahir_lama" readonly type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $tem_pribadi->pribadi->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input id="tgl_lahir_lama" readonly type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $tem_pribadi->pribadi->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input readonly type="text" id="alamat_lama" value="{{ $tem_pribadi->pribadi->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input id="desa_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->desa }}" class="form-control @error('desa') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelurahan">kelurahan</label>
                            <input id="kelurahan_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->kelurahan }}" class="form-control @error('keluarahan') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="Tempat Tinggal">Tempat Tinggal</label>
                            <input id="tmp_tinggal_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->tmp_tinggal }}" class="form-control @error('tmp_tinggal') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="Transport">Mode Transportasi</label>
                            <input id="transport_lama" readonly type="text" value="{{ $tem_pribadi->pribadi->transport }}" class="form-control @error('transport') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="anak_ke">Anak Ke- (Sesuai KK)</label>
                            <input readonly type="number" id="anak_ke_lama" name="anak_ke_lama" value="{{ $tem_pribadi->pribadi->anak_ke }}" class="form-control @error('anak_ke') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="no_tlp">Nomer Telpon (Orang Tua)</label>
                            <input readonly type="number" id="no_tlp_lama" name="no_tlp" value="{{ $tem_pribadi->pribadi->no_tlp }}" class="form-control @error('no_tlp') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomer Telpon (Siswa)</label>
                            <input readonly type="number" id="no_hp_lama" name="no_hp" value="{{ $tem_pribadi->pribadi->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input readonly type="email" id="email_lama" name="email" value="{{ $tem_pribadi->pribadi->email }}" class="form-control @error('email') is-invalid @enderror ">
                        </div>

                        <div class="form-group">
                            <label for="email">Beasiswa</label>
                            <input readonly type="text" id="beasiswa_lama" value="{{ $tem_pribadi->pribadi->beasiswa }}" class="form-control @error('email') is-invalid @enderror ">
                        </div>

                        <div class="form-group">
                            <strong></i> Berkas Kartu Keluarga</strong>
                            <p><a href="{{ asset($tem_pribadi->user->berkas_kk) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset($tem_pribadi->user->berkas_kk) }}" width="50px" height="50px" class="img-fluid mb-2">
                                    <input readonly class="d-none" type="text" id="berkas_kk_lama" value="{{ $tem_pribadi->user->berkas_kk }}">
                                </a></p>
                        </div>

                        <div class="form-group">
                            <strong></i> Berkas Ijasah</strong>
                            <p><a href="{{ asset($tem_pribadi->user->berkas_ijasah) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset($tem_pribadi->user->berkas_ijasah) }}" width="50px" height="50px" class="img-fluid mb-2">
                                    <input readonly class="d-none" type="text" id="berkas_ijasah_lama" value="{{ $tem_pribadi->user->berkas_ijasah }}">
                                </a></p>
                        </div>

                        <div class="form-group">
                            <strong></i> Berkas Beasiswa</strong>
                            <p><a href="{{ asset($tem_pribadi->user->berkas_beasiswa) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset($tem_pribadi->user->berkas_beasiswa) }}" width="50px" height="50px" class="img-fluid mb-2">
                                    <input readonly class="d-none" type="text" id="berkas_beasiswa_lama" value="{{ $tem_pribadi->user->berkas_beasiswa }}">
                                </a></p>
                        </div>
                    </div>
                    <!-- /.end Data Lama -->

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group required">
                            <label for="status">Status Data</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="Setujui" @if ($tem_pribadi->status == 'Setujui')
                                    selected
                                    @endif
                                    >Disetujui</option>   
                            <option value="Tolak" @if ($tem_pribadi->status == 'Tolak')
                                    selected
                                    @endif
                                    >Ditolak</option>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="ket" name="ket" value="{{ $tem_pribadi->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            @if(Auth::user()->role == 'Admin' && $tem_pribadi->status == 'Pending')
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('TemPribadi.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Kirim Data</button>
                </div>
            </div>
            @endif
        </form>
    </div>
    <!-- /.card -->
    <script>
        function nisn() {
            if (document.getElementById("nisn").value != document.getElementById("nisn_lama").value) {
                document.getElementById("nisn_cek").classList.add("text-red");
            } else {

            };
        }

        function nama() {
            if (document.getElementById("nama").value != document.getElementById("nama_lama").value) {
                document.getElementById("nama_cek").classList.add("text-red");
            } else {

            };
        }

        function jk() {
            if (document.getElementById("jk").value != document.getElementById("jk_lama").value) {
                document.getElementById("jk_cek").classList.add("text-red");
            } else {

            };
        }

        function nokk() {
            if (document.getElementById("nokk").value != document.getElementById("nokk_lama").value) {
                document.getElementById("nokk_cek").classList.add("text-red");
            } else {

            };
        }

        function nik() {
            if (document.getElementById("nik").value != document.getElementById("nik_lama").value) {
                document.getElementById("nik_cek").classList.add("text-red");
            } else {

            };
        }

        function agama() {
            if (document.getElementById("agama").value != document.getElementById("agama_lama").value) {
                document.getElementById("agama_cek").classList.add("text-red");
            } else {

            };
        }

        function tmp_lahir() {
            if (document.getElementById("tmp_lahir").value != document.getElementById("tmp_lahir_lama").value) {
                document.getElementById("tmp_lahir_cek").classList.add("text-red");
            } else {

            };
        }

        function tgl_lahir() {
            if (document.getElementById("tgl_lahir").value != document.getElementById("tgl_lahir_lama").value) {
                document.getElementById("tgl_lahir_cek").classList.add("text-red");
            } else {

            };
        }

        function alamat() {
            if (document.getElementById("alamat").value != document.getElementById("alamat_lama").value) {
                document.getElementById("alamat_cek").classList.add("text-red");
            } else {

            };
        }

        function desa() {
            if (document.getElementById("desa").value != document.getElementById("desa_lama").value) {
                document.getElementById("desa_cek").classList.add("text-red");
            } else {

            };
        }

        function kelurahan() {
            if (document.getElementById("kelurahan").value != document.getElementById("kelurahan_lama").value) {
                document.getElementById("kelurahan_cek").classList.add("text-red");
            } else {

            };
        }

        function tmp_tinggal() {
            if (document.getElementById("tmp_tinggal").value != document.getElementById("tmp_tinggal_lama").value) {
                document.getElementById("tmp_tinggal_cek").classList.add("text-red");
            } else {

            };
        }

        function transport() {
            if (document.getElementById("transport").value != document.getElementById("transport_lama").value) {
                document.getElementById("transport_cek").classList.add("text-red");
            } else {

            };
        }

        function anak_ke() {
            if (document.getElementById("anak_ke").value != document.getElementById("anak_ke_lama").value) {
                document.getElementById("anak_cek").classList.add("text-red");
            } else {

            };
        }

        function no_tlp() {
            if (document.getElementById("no_tlp").value != document.getElementById("no_tlp_lama").value) {
                document.getElementById("no_tlp_cek").classList.add("text-red");
            } else {

            };
        }

        function no_hp() {
            if (document.getElementById("no_hp").value != document.getElementById("no_hp_lama").value) {
                document.getElementById("no_hp_cek").classList.add("text-red");
            } else {

            };
        }

        function email() {
            if (document.getElementById("email").value != document.getElementById("email_lama").value) {
                document.getElementById("email_cek").classList.add("text-red");
            } else {

            };
        }

        function beasiswa() {
            if (document.getElementById("beasiswa").value != document.getElementById("beasiswa_lama").value) {
                document.getElementById("beasiswa_cek").classList.add("text-red");
            } else {

            };
        }

        function berkas_kk() {
            if (document.getElementById("berkas_kk").value != document.getElementById("berkas_kk_lama").value) {
                document.getElementById("berkas_kk_cek").classList.add("text-red");
            } else {

            };
        }

        function berkas_ijasah() {
            if (document.getElementById("berkas_ijasah").value != document.getElementById("berkas_ijasah_lama").value) {
                document.getElementById("berkas_ijasah_cek").classList.add("text-red");
            } else {

            };
        }

        function berkas_beasiswa() {
            if (document.getElementById("berkas_beasiswa").value != document.getElementById("berkas_beasiswa_lama").value) {
                document.getElementById("berkas_beasiswa_cek").classList.add("text-red");
            } else {

            };
        }


        const windowOnload = window.onload = () => {
            nisn();
            nama();
            jk();
            nokk();
            nik();
            agama();
            tmp_lahir();
            tgl_lahir();
            alamat();
            desa();
            kelurahan();
            tmp_tinggal();
            transport();
            anak_ke();
            no_tlp();
            no_hp();
            email();
            beasiswa();
            berkas_beasiswa();
            berkas_kk();
            berkas_ijasah();
        };
    </script>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $("#AjuanData").addClass("active");
    $("#liAjuanData").addClass("menu-open");
    $("#TemPribadi").addClass("active");
</script>
@endsection