@extends('template_backend.home')
@section('heading', 'Edit Siswa')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('pribadi.siswa') }}">Siswa</a></li>
<li class="breadcrumb-item active">Edit Siswa</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Siswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="text" id="id" name="id" value="{{ Auth::user()->id }}" class="form-control d-none" readonly>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="{{ $pribadi->nisn }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" value="{{ $pribadi->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" id="kelas" name="kelas" value="{{ $pribadi->kelas }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" @if ($pribadi->jk == 'L')
                                    selected
                                    @endif
                                    >Laki-Laki</option>
                                <option value="P" @if ($pribadi->jk == 'P')
                                    selected
                                    @endif
                                    >Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="text" id="nokk" name="nokk" value="{{ $pribadi->nokk }}" class="form-control @error('nokk') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" name="nik" value="{{ $pribadi->nik }}" class="form-control @error('nik') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select id="agama" name="agama" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Budha" @if ($pribadi->agama == 'Budha')
                                    selected
                                    @endif
                                    >Budha</option>
                                <option value="Hindu" @if ($pribadi->agama == 'Hindu')
                                    selected
                                    @endif
                                    >Hindu</option>
                                <option value="Islam" @if ($pribadi->agama == 'Islam')
                                    selected
                                    @endif
                                    >Islam</option>
                                <option value="Kristen" @if ($pribadi->agama == 'Kristen')
                                    selected
                                    @endif
                                    >Kristen</option>
                                <option value="Katholik" @if ($pribadi->agama == 'Katholik')
                                    selected
                                    @endif
                                    >Katholik</option>
                                <option value="Khonghucu" @if ($pribadi->agama == 'Khonghucu')
                                    selected
                                    @endif
                                    >Khonghucu</option>
                                <option value="Kepercayaan kpd Tuhan YME" @if ($pribadi->agama == 'Kepercayaan kpd Tuhan YME')
                                    selected
                                    @endif
                                    >Kepercayaan kpd Tuhan YME</option>
                                <option value="lainnya" @if ($pribadi->agama == 'lainnya')
                                    selected
                                    @endif
                                    >lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $pribadi->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $pribadi->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="{{ $pribadi->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" id="desa" name="desa" value="{{ $pribadi->desa }}" class="form-control @error('desa') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelurahan">keluarahan</label>
                            <input type="text" id="keluarahan" name="keluarahan" value="{{ $pribadi->kelurahan }}" class="form-control @error('keluarahan') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tmp_tinggal">Tempat Tinggal</label>
                            <select id="tmp_tinggal" name="tmp_tinggal" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Tempat Tinggal --</option>
                                <option value="Orang Tua" @if ($pribadi->tmp_tinggal == 'Orang Tua')
                                    selected
                                    @endif
                                    >Orang Tua</option>
                                <option value="Wali" @if ($pribadi->tmp_tinggal == 'Wali')
                                    selected
                                    @endif
                                    >Wali</option>
                                <option value="Kost" @if ($pribadi->tmp_tinggal == 'Kost')
                                    selected
                                    @endif
                                    >Kost</option>
                                <option value="Asrama" @if ($pribadi->tmp_tinggal == 'Asrama')
                                    selected
                                    @endif
                                    >Asrama</option>
                                <option value="Orang Tua" @if ($pribadi->tmp_tinggal == 'Orang Tua')
                                    selected
                                    @endif
                                    >Orang Tua</option>
                                <option value="Pantai Asuhan" @if ($pribadi->tmp_tinggal == 'Pantai Asuhan')
                                    selected
                                    @endif
                                    >Pantai Asuhan</option>
                                <option value="Pesantren" @if ($pribadi->tmp_tinggal == 'Pesantren')
                                    selected
                                    @endif
                                    >Pesantren</option>
                                <option value="Lainnya" @if ($pribadi->tmp_tinggal == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="transport">Mode Transportasi</label>
                            <select id="transport" name="transport" class="select2bs4 form-control @error('transport') is-invalid @enderror">
                                <option value="">-- Pilih Mode Transportasi --</option>
                                <option value="Jalan Kaki" @if ($pribadi->transport == 'Jalan Kaki')
                                    selected
                                    @endif
                                    >Jalan Kaki</option>
                                <option value="Angkutan umum/bus/pete-pete" @if ($pribadi->transport == 'Angkutan umum/bus/pete-pete')
                                    selected
                                    @endif
                                    >Angkutan umum/bus/pete-pete</option>
                                <option value="Mobil/bus antar jemput" @if ($pribadi->transport == 'Mobil/bus antar jemput')
                                    selected
                                    @endif
                                    >Mobil/bus antar jemput</option>
                                <option value="Kereta Api" @if ($pribadi->transport == 'Kereta Api')
                                    selected
                                    @endif
                                    >Kereta Api</option>
                                <option value="Ojek" @if ($pribadi->transport == 'Ojek')
                                    selected
                                    @endif
                                    >Ojek</option>
                                <option value="Andong/bendi/sado/dokar/delman/becak" @if ($pribadi->transport == 'Andong/bendi/sado/dokar/delman/becak')
                                    selected
                                    @endif
                                    >Andong/bendi/sado/dokar/delman/becak</option>
                                <option value="Perahu penyeberangan/rakit/getek" @if ($pribadi->transport == 'Perahu penyeberangan/rakit/getek')
                                    selected
                                    @endif
                                    >Perahu penyeberangan/rakit/getek</option>
                                <option value="Kuda" @if ($pribadi->transport == 'Kuda')
                                    selected
                                    @endif
                                    >Kuda</option>
                                <option value="Sepeda" @if ($pribadi->transport == 'Sepeda')
                                    selected
                                    @endif
                                    >Sepeda</option>
                                <option value="Sepeda Motor" @if ($pribadi->transport == 'Sepeda Motor')
                                    selected
                                    @endif
                                    >Sepeda Motor</option>
                                <option value="Mobil tem_pribadi" @if ($pribadi->transport == 'Mobil tem_pribadi')
                                    selected
                                    @endif
                                    >Mobil tem_pribadi</option>
                                <option value="Lainnya" @if ($pribadi->transport == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke- (Sesuai KK)</label>
                            <input type="number" id="anak_ke" name="anak_ke" value="{{ $pribadi->anak_ke }}" class="form-control @error('anak_ke') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_tlp">Nomer Telpon (Orang Tua)</label>
                            <input type="number" id="no_tlp" name="no_tlp" value="{{ $pribadi->no_tlp }}" class="form-control @error('no_tlp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="no_hp">Nomer Telpon (Siswa)</label>
                            <input type="number" id="no_hp" name="no_hp" value="{{ $pribadi->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $pribadi->email }}" class="form-control @error('email') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="beasiswa">Beasiswa</label>
                            <select id="beasiswa" name="beasiswa" class="select2bs4 form-control @error('beasiswa') is-invalid @enderror">
                                <option value="Tidak" @if ($pribadi->beasiswa == 'Tidak Mengajukan Beasiswa')
                                    selected
                                    @endif
                                    >Tidak Mengajukan Beasiswa</option>
                                <option value="Memiliki KPS/PKH" @if ($pribadi->beasiswa == 'Memiliki KPS/PKH')
                                    selected
                                    @endif
                                    >Memiliki KPS/PKH</option>
                                <option value="Memiliki KIP" @if ($pribadi->beasiswa == 'Memiliki KIP')
                                    selected
                                    @endif
                                    >Memiliki KIP</option>
                                <option value="Orang Tua Sudah Meninggal" @if ($pribadi->beasiswa == 'Orang Tua Sudah Meninggal')
                                    selected
                                    @endif
                                    >Orang Tua Sudah Meninggal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Upload Kartu Keluarga</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_kk" class="custom-file-input @error('foto') is-invalid @enderror" id="berkas_kk">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Upload Beasiswa</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="berkas_beasiswa" class="custom-file-input @error('foto') is-invalid @enderror" id="berkas_beasiswa">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <label for="status">Status</label>
                            <input type="text" id="status" name="status" value="Pending" class="form-control @error('status') is-invalid @enderror">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
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