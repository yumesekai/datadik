@extends('template_backend.home')
@section('heading', 'Perbaiki Data Orang Tua')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('orangtua.index') }}">Data Orang Tua</a></li>
<li class="breadcrumb-item active">Perbaiki Data Orang Tua</li>
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
                    <li>Data yang berisi tanda <a style="font-size: 200; color: red;"> * </a> WAJIB di isi</li>
                    <li>Jika siswa memiliki WALI sebagai penanggung jawab, maka isi SEMUA DATA pada FORM WALI</li>
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
            <h3 class="card-title">Perbaiki Data Orang Tua</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('orangtua.updateSiswa') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">AYAH</h4>
                        <hr>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Nama Ayah</label>
                            <input type="text" id="nama_ayah" name="nama_ayah" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->nama_ayah }}" class="form-control @error('nama_ayah') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">NIK Ayah</label>
                            <input type="number" id="nik_ayah" name="nik_ayah" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->nik_ayah }}" class="form-control @error('nik_ayah') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir Ayah</label>
                            <input type="number" id="tahun_ayah" name="tahun_ayah" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->tahun_ayah }}" class="form-control @error('tahun_ayah') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir Ayah</label>
                            <select id="pendidikan_ayah" name="pendidikan_ayah" class="select2bs4 form-control @error('pendidikan_ayah') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pendidikan --</option>
                                <option value="D1" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'D1')
                                    selected
                                    @endif
                                    >D1</option>
                                <option value="D2" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'D2')
                                    selected
                                    @endif
                                    >D2</option>
                                <option value="D3" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'D3')
                                    selected
                                    @endif
                                    >D3</option>
                                <option value="D4" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'D4')
                                    selected
                                    @endif
                                    >D4</option>
                                <option value="Paket A" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'Paket A')
                                    selected
                                    @endif
                                    >Paket A</option>
                                <option value="Paket B" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'Paket B')
                                    selected
                                    @endif
                                    >Paket B</option>
                                <option value="Paket C" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'Paket C')
                                    selected
                                    @endif
                                    >Paket C</option>
                                <option value="S1" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'S1')
                                    selected
                                    @endif
                                    >S1</option>
                                <option value="S2" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'S2')
                                    selected
                                    @endif
                                    >S2</option>
                                <option value="S3" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'S3')
                                    selected
                                    @endif
                                    >S3</option>
                                <option value="PAUD" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'PAUD')
                                    selected
                                    @endif
                                    >PAUD</option>
                                <option value="SD / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'SD / sederajat')
                                    selected
                                    @endif
                                    >SD / sederajat</option>
                                <option value="SMP / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'SMP / sederajat')
                                    selected
                                    @endif
                                    >SMP / sederajat</option>
                                <option value="SMA / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'SMA / sederajat')
                                    selected
                                    @endif
                                    >SMA / sederajat</option>
                                <option value="Putus SD" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'Putus SD')
                                    selected
                                    @endif
                                    >Putus SD</option>
                                <option value="Tidak sekolah" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ayah == 'Tidak sekolah')
                                    selected
                                    @endif
                                    >Tidak Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Ayah</label>
                            <select id="pekerjaan_ayah" name="pekerjaan_ayah" class="select2bs4 form-control @error('pekerjaan_ayah') is-invalid @enderror">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Tidak Bekerja" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Tidak Bekerja')
                                    selected
                                    @endif
                                    >Tidak Bekerja</option>
                                <option value="Nelayan" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Nelayan')
                                    selected
                                    @endif
                                    >Nelayan</option>
                                <option value="Petani" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Petani')
                                    selected
                                    @endif
                                    >Petani</option>
                                <option value="Peternak" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Peternak')
                                    selected
                                    @endif
                                    >Peternak</option>
                                <option value="PNS/TNI/Polri" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'PNS/TNI/Polri')
                                    selected
                                    @endif
                                    >PNS/TNI/Polri</option>
                                <option value="Karyawan Swasta" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Karyawan Swasta')
                                    selected
                                    @endif
                                    >Karyawan Swasta</option>
                                <option value="Pedagang Kecil" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Pedagang Kecil')
                                    selected
                                    @endif
                                    >Pedagang Kecil</option>
                                <option value="Pedagang Besar" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Pedagang Besar')
                                    selected
                                    @endif
                                    >Pedagang Besar</option>
                                <option value="Wiraswasta" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Wiraswasta')
                                    selected
                                    @endif
                                    >Wiraswasta</option>
                                <option value="Wirausaha" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Wirausaha')
                                    selected
                                    @endif
                                    >Wirausaha</option>
                                <option value="Buruh" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Buruh')
                                    selected
                                    @endif
                                    >Buruh</option>
                                <option value="Tenaga Kerja Indonesia" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Tenaga Kerja Indonesia')
                                    selected
                                    @endif
                                    >Tenaga Kerja Indonesia</option>
                                <option value="Sudah Meninggal" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Sudah Meninggal')
                                    selected
                                    @endif
                                    >Sudah Meninggal</option>
                                <option value="Lainnya" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ayah == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan Ayah</label>
                            <select id="penghasilan_ayah" name="penghasilan_ayah" class="select2bs4 form-control @error('penghasilan_ayah') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp. 500,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Kurang dari Rp. 500,000')
                                    selected
                                    @endif
                                    >Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Rp. 500,000 - Rp. 999,999')
                                    selected
                                    @endif
                                    >Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Rp. 1,000,000 - Rp. 1,999,999')
                                    selected
                                    @endif
                                    >Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Rp. 2,000,000 - Rp. 4,999,999')
                                    selected
                                    @endif
                                    >Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Rp. 5,000,000 - Rp. 20,000,000')
                                    selected
                                    @endif
                                    >Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Lebih dari Rp. 20,000,000')
                                    selected
                                    @endif
                                    >Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak Berpenghasilan" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ayah == 'Tidak Berpenghasilan')
                                    selected
                                    @endif
                                    >Tidak Berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus Ayah</label>
                            <select id="berkebutuhan_ayah" name="berkebutuhan_ayah" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Tidak" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ayah == 'Tidak')
                                    selected
                                    @endif
                                    >Tidak</option>
                                <option value="Netra" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ayah == 'Netra')
                                    selected
                                    @endif
                                    >Netra</option>
                                <option value="Rungu" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ayah == 'Rungu')
                                    selected
                                    @endif
                                    >Rungu</option>
                                <option value="Wicara" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ayah == 'Wicara')
                                    selected
                                    @endif
                                    >Wicara</option>
                                <option value="Cerdas Istimewa" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ayah == 'Cerdas Istimewa')
                                    selected
                                    @endif
                                    >Cerdas Istimewa</option>
                                <option value="Autis" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ayah == 'Autis')
                                    selected
                                    @endif
                                    >Autis</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Data Ayah -->

                    <!-- Start Data Ibu -->
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">IBU</h4>
                        <hr>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Nama ibu</label>
                            <input type="text" id="nama_ibu" name="nama_ibu" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->nama_ibu }}" class="form-control @error('nama_ibu') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">NIK ibu</label>
                            <input type="number" id="nik_ibu" name="nik_ibu" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->nik_ibu }}" class="form-control @error('nik_ibu') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir ibu</label>
                            <input type="number" id="tahun_ibu" name="tahun_ibu" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->tahun_ibu }}" class="form-control @error('tahun_ibu') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir ibu</label>
                            <select id="pendidikan_ibu" name="pendidikan_ibu" class="select2bs4 form-control @error('pendidikan_ibu') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pendidikan --</option>
                                <option value="D1" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'D1')
                                    selected
                                    @endif
                                    >D1</option>
                                <option value="D2" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'D2')
                                    selected
                                    @endif
                                    >D2</option>
                                <option value="D3" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'D3')
                                    selected
                                    @endif
                                    >D3</option>
                                <option value="D4" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'D4')
                                    selected
                                    @endif
                                    >D4</option>
                                <option value="Paket A" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'Paket A')
                                    selected
                                    @endif
                                    >Paket A</option>
                                <option value="Paket B" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'Paket B')
                                    selected
                                    @endif
                                    >Paket B</option>
                                <option value="Paket C" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'Paket C')
                                    selected
                                    @endif
                                    >Paket C</option>
                                <option value="S1" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'S1')
                                    selected
                                    @endif
                                    >S1</option>
                                <option value="S2" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'S2')
                                    selected
                                    @endif
                                    >S2</option>
                                <option value="S3" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'S3')
                                    selected
                                    @endif
                                    >S3</option>
                                <option value="PAUD" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'PAUD')
                                    selected
                                    @endif
                                    >PAUD</option>
                                <option value="SD / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'SD / sederajat')
                                    selected
                                    @endif
                                    >SD / sederajat</option>
                                <option value="SMP / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'SMP / sederajat')
                                    selected
                                    @endif
                                    >SMP / sederajat</option>
                                <option value="SMA / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'SMA / sederajat')
                                    selected
                                    @endif
                                    >SMA / sederajat</option>
                                <option value="Putus SD" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'Putus SD')
                                    selected
                                    @endif
                                    >Putus SD</option>
                                <option value="Tidak sekolah" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_ibu == 'Tidak sekolah')
                                    selected
                                    @endif
                                    >Tidak Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan ibu</label>
                            <select id="pekerjaan_ibu" name="pekerjaan_ibu" class="select2bs4 form-control @error('pekerjaan_ibu') is-invalid @enderror">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Tidak Bekerja" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Tidak Bekerja')
                                    selected
                                    @endif
                                    >Tidak Bekerja</option>
                                <option value="Nelayan" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Nelayan')
                                    selected
                                    @endif
                                    >Nelayan</option>
                                <option value="Petani" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Petani')
                                    selected
                                    @endif
                                    >Petani</option>
                                <option value="Peternak" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Peternak')
                                    selected
                                    @endif
                                    >Peternak</option>
                                <option value="PNS/TNI/Polri" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'PNS/TNI/Polri')
                                    selected
                                    @endif
                                    >PNS/TNI/Polri</option>
                                <option value="Karyawan Swasta" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Karyawan Swasta')
                                    selected
                                    @endif
                                    >Karyawan Swasta</option>
                                <option value="Pedagang Kecil" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Pedagang Kecil')
                                    selected
                                    @endif
                                    >Pedagang Kecil</option>
                                <option value="Pedagang Besar" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Pedagang Besar')
                                    selected
                                    @endif
                                    >Pedagang Besar</option>
                                <option value="Wiraswasta" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Wiraswasta')
                                    selected
                                    @endif
                                    >Wiraswasta</option>
                                <option value="Wirausaha" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Wirausaha')
                                    selected
                                    @endif
                                    >Wirausaha</option>
                                <option value="Buruh" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Buruh')
                                    selected
                                    @endif
                                    >Buruh</option>
                                <option value="Tenaga Kerja Indonesia" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Tenaga Kerja Indonesia')
                                    selected
                                    @endif
                                    >Tenaga Kerja Indonesia</option>
                                <option value="Sudah Meninggal" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Sudah Meninggal')
                                    selected
                                    @endif
                                    >Sudah Meninggal</option>
                                <option value="Lainnya" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_ibu == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan ibu</label>
                            <select id="penghasilan_ibu" name="penghasilan_ibu" class="select2bs4 form-control @error('penghasilan_ibu') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp. 500,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Kurang dari Rp. 500,000')
                                    selected
                                    @endif
                                    >Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Rp. 500,000 - Rp. 999,999')
                                    selected
                                    @endif
                                    >Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Rp. 1,000,000 - Rp. 1,999,999')
                                    selected
                                    @endif
                                    >Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Rp. 2,000,000 - Rp. 4,999,999')
                                    selected
                                    @endif
                                    >Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Rp. 5,000,000 - Rp. 20,000,000')
                                    selected
                                    @endif
                                    >Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Lebih dari Rp. 20,000,000')
                                    selected
                                    @endif
                                    >Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak Berpenghasilan" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_ibu == 'Tidak Berpenghasilan')
                                    selected
                                    @endif
                                    >Tidak Berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus ibu</label>
                            <select id="berkebutuhan_ibu" name="berkebutuhan_ibu" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Tidak" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ibu == 'Tidak')
                                    selected
                                    @endif
                                    >Tidak</option>
                                <option value="Netra" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ibu == 'Netra')
                                    selected
                                    @endif
                                    >Netra</option>
                                <option value="Rungu" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ibu == 'Rungu')
                                    selected
                                    @endif
                                    >Rungu</option>
                                <option value="Wicara" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ibu == 'Wicara')
                                    selected
                                    @endif
                                    >Wicara</option>
                                <option value="Cerdas Istimewa" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ibu == 'Cerdas Istimewa')
                                    selected
                                    @endif
                                    >Cerdas Istimewa</option>
                                <option value="Autis" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_ibu == 'Autis')
                                    selected
                                    @endif
                                    >Autis</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Data Ibu -->

                    <!-- Start Data Wali -->
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">WALI</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Nama wali</label>
                            <input type="text" id="nama_wali" name="nama_wali" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->nama_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK wali</label>
                            <input type="number" id="nik_wali" name="nik_wali" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->nik_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir wali</label>
                            <input type="number" id="tahun_wali" name="tahun_wali" value="{{ Auth::user()->tem_orangtua(Auth::user()->id)->tahun_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir wali</label>
                            <select id="pendidikan_wali" name="pendidikan_wali" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pendidikan --</option>
                                <option value="D1" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'D1')
                                    selected
                                    @endif
                                    >D1</option>
                                <option value="D2" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'D2')
                                    selected
                                    @endif
                                    >D2</option>
                                <option value="D3" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'D3')
                                    selected
                                    @endif
                                    >D3</option>
                                <option value="Paket A" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'Paket A')
                                    selected
                                    @endif
                                    >Paket A</option>
                                <option value="Paket B" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'Paket B')
                                    selected
                                    @endif
                                    >Paket B</option>
                                <option value="Paket C" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'Paket C')
                                    selected
                                    @endif
                                    >Paket C</option>
                                <option value="S1" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'S1')
                                    selected
                                    @endif
                                    >S1</option>
                                <option value="S2" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'S2')
                                    selected
                                    @endif
                                    >S2</option>
                                <option value="S3" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'S3')
                                    selected
                                    @endif
                                    >S3</option>
                                <option value="PAUD" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'PAUD')
                                    selected
                                    @endif
                                    >PAUD</option>
                                <option value="SD / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'SD / sederajat')
                                    selected
                                    @endif
                                    >SD / sederajat</option>
                                <option value="SMP / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'SMP / sederajat')
                                    selected
                                    @endif
                                    >SMP / sederajat</option>
                                <option value="SMA / sederajat" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'SMA / sederajat')
                                    selected
                                    @endif
                                    >SMA / sederajat</option>
                                <option value="Putus SD" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'Putus SD')
                                    selected
                                    @endif
                                    >Putus SD</option>
                                <option value="Tidak Sekolah" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pendidikan_wali == 'Tidak Sekolah')
                                    selected
                                    @endif
                                    >Tidak Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan wali</label>
                            <select id="pekerjaan_wali" name="pekerjaan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Tidak Bekerja" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Tidak Bekerja')
                                    selected
                                    @endif
                                    >Tidak Bekerja</option>
                                <option value="Nelayan" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Nelayan')
                                    selected
                                    @endif
                                    >Nelayan</option>
                                <option value="Petani" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Petani')
                                    selected
                                    @endif
                                    >Petani</option>
                                <option value="Peternak" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Peternak')
                                    selected
                                    @endif
                                    >Peternak</option>
                                <option value="PNS/TNI/Polri" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'PNS/TNI/Polri')
                                    selected
                                    @endif
                                    >PNS/TNI/Polri</option>
                                <option value="Karyawan Swasta" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Karyawan Swasta')
                                    selected
                                    @endif
                                    >Karyawan Swasta</option>
                                <option value="Pedagang Kecil" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Pedagang Kecil')
                                    selected
                                    @endif
                                    >Pedagang Kecil</option>
                                <option value="Pedagang Besar" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Pedagang Besar')
                                    selected
                                    @endif
                                    >Pedagang Besar</option>
                                <option value="Wiraswasta" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Wiraswasta')
                                    selected
                                    @endif
                                    >Wiraswasta</option>
                                <option value="Wirausaha" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Wirausaha')
                                    selected
                                    @endif
                                    >Wirausaha</option>
                                <option value="Buruh" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Buruh')
                                    selected
                                    @endif
                                    >Buruh</option>
                                <option value="Tenaga Kerja Indonesia" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Tenaga Kerja Indonesia')
                                    selected
                                    @endif
                                    >Tenaga Kerja Indonesia</option>
                                <option value="Sudah Meninggal" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Sudah Meninggal')
                                    selected
                                    @endif
                                    >Sudah Meninggal</option>
                                <option value="Lainnya" @if (Auth::user()->tem_orangtua(Auth::user()->id)->pekerjaan_wali == 'Lainnya')
                                    selected
                                    @endif
                                    >Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan wali</label>
                            <select id="penghasilan_wali" name="penghasilan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp. 500,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Kurang dari Rp. 500,000')
                                    selected
                                    @endif
                                    >Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Rp. 500,000 - Rp. 999,999')
                                    selected
                                    @endif
                                    >Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Rp. 1,000,000 - Rp. 1,999,999')
                                    selected
                                    @endif
                                    >Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Rp. 2,000,000 - Rp. 4,999,999')
                                    selected
                                    @endif
                                    >Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Rp. 5,000,000 - Rp. 20,000,000')
                                    selected
                                    @endif
                                    >Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Lebih dari Rp. 20,000,000')
                                    selected
                                    @endif
                                    >Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak Berpenghasilan" @if (Auth::user()->tem_orangtua(Auth::user()->id)->penghasilan_wali == 'Tidak Berpenghasilan')
                                    selected
                                    @endif
                                    >Tidak Berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus wali</label>
                            <select id="berkebutuhan_wali" name="berkebutuhan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Tidak" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_wali == 'Tidak')
                                    selected
                                    @endif
                                    >Tidak</option>
                                <option value="Netra" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_wali == 'Netra')
                                    selected
                                    @endif
                                    >Netra</option>
                                <option value="Rungu" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_wali == 'Rungu')
                                    selected
                                    @endif
                                    >Rungu</option>
                                <option value="Wicara" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_wali == 'Wicara')
                                    selected
                                    @endif
                                    >Wicara</option>
                                <option value="Cerdas Istimewa" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_wali == 'Cerdas Istimewa')
                                    selected
                                    @endif
                                    >Cerdas Istimewa</option>
                                <option value="Autis" @if (Auth::user()->tem_orangtua(Auth::user()->id)->berkebutuhan_wali == 'Autis')
                                    selected
                                    @endif
                                    >Autis</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Data Wali -->

                    <div class="form-group d-none">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" value="Sudah Terverifikasi" class="form-control @error('status') is-invalid @enderror">
                    </div>
                </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-flex justify-content-between">
            <a href="{{ route('orangtua.siswa') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    $("#OrangtuaSiswa").addClass("active");
</script>
@endsection
