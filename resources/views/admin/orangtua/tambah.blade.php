@extends('template_backend.home')
@section('heading', 'Tambah Data Orang Tua')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('orangtua.index') }}">Data Orang Tua</a></li>
<li class="breadcrumb-item active">Tambah Data Orang Tua</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Orang Tua</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('orangtua.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <select id="nama" name="nama" class="select2bs4 form-control @error('nama') is-invalid @enderror">
                                <option value="">-- Cari Nama --</option>
                                @foreach ($user as $data)
                                <option value="{{ $data->id }}" {{ old('nama') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">AYAH</h4>
                        <hr>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Nama Ayah</label>
                            <input type="text" id="nama_ayah" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ old('nama_ayah') }}">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">NIK Ayah</label>
                            <input type="number" id="nik_ayah" name="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" value="{{ old('nik_ayah') }}">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir Ayah</label>
                            <input type="number" id="tahun_ayah" name="tahun_ayah" class="form-control @error('tahun_ayah') is-invalid @enderror" value="{{ old('tahun_ayah') }}">
                        </div>
                    </div>

                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir Ayah</label>
                            <select id="pendidikan_ayah" name="pendidikan_ayah" class="select2bs4 form-control @error('pendidikan_ayah') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pendidikan --</option>
                                <option value="D1" {{ old('pendidikan_ayah') == 'D1' ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ old('pendidikan_ayah') == 'D2' ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4" {{ old('pendidikan_ayah') == 'D4' ? 'selected' : '' }}>D3</option>
                                <option value="Paket A" {{ old('pendidikan_ayah') == 'Paket A' ? 'selected' : '' }}>Paket A</option>
                                <option value="Paket B" {{ old('pendidikan_ayah') == 'Paket B' ? 'selected' : '' }}>Paket B</option>
                                <option value="Paket C" {{ old('pendidikan_ayah') == 'Paket C' ? 'selected' : '' }}>Paket C</option>
                                <option value="S1" {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_ayah') == 'S3' ? 'selected' : '' }}>S3</option>
                                <option value="PAUD" {{ old('pendidikan_ayah') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                                <option value="SD / sederajat" {{ old('pendidikan_ayah') == 'SD / sederajat' ? 'selected' : '' }}>SD / Sederajat</option>
                                <option value="SMP / sederajat" {{ old('pendidikan_ayah') == 'SMP / sederajat' ? 'selected' : '' }}>SMP / Sederajat</option>
                                <option value="SMA / sederajat" {{ old('pendidikan_ayah') == 'SMA / sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                                <option value="Putus SD" {{ old('pendidikan_ayah') == 'Putus SD' ? 'selected' : '' }}>Putus SD</option>
                                <option value="Tidak sekolah" {{ old('pendidikan_ayah') == 'Tidak sekolah' ? 'selected' : '' }}> Tidak Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Ayah</label>
                            <select id="pekerjaan_ayah" name="pekerjaan_ayah" class="select2bs4 form-control @error('pekerjaan_ayah') is-invalid @enderror">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Tidak Bekerja" {{ old('pekerjaan_ayah') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                <option value="Nelayan" {{ old('pekerjaan_ayah') == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                <option value="Petani" {{ old('pekerjaan_ayah') == 'Petani' ? 'selected' : '' }}>Petani</option>
                                <option value="Peternak" {{ old('pekerjaan_ayah') == 'Peternak' ? 'selected' : '' }}>Peternak</option>
                                <option value="PNS/TNI/Polri" {{ old('pekerjaan_ayah') == 'PNS/TNI/Polri' ? 'selected' : '' }}>PNS/PORLI/TNI</option>
                                <option value="Kariyawan Swasta" {{ old('pekerjaan_ayah') == 'Kariyawan Swasta' ? 'selected' : '' }}>Kariyawan Swasta</option>
                                <option value="Pedagang Kecil" {{ old('pekerjaan_ayah') == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                <option value="Pedagang Besar" {{ old('pekerjaan_ayah') == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                <option value="Wiraswasta" {{ old('pekerjaan_ayah') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="Wirausaha" {{ old('pekerjaan_ayah') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                <option value="Buruh" {{ old('pekerjaan_ayah') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                <option value="Tenaga Kerja Indonesia" {{ old('pekerjaan_ayah') == 'Tenaga Kerja Indonesia' ? 'selected' : '' }}>Tenaga Kerja Indonesia</option>
                                <option value="Sudah Meninggal" {{ old('pekerjaan_ayah') == 'Sudah Meninggal' ? 'selected' : '' }}> Sudah Meninggal</option>
                                <option value="Lainnya" {{ old('pekerjaan_ayah') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan Ayah</label>
                            <select id="penghasilan_ayah" name="penghasilan_ayah" class="select2bs4 form-control @error('penghasilan_ayah') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp. 500,000" {{ old('penghasilan_ayah') == 'Kurang dari Rp. 500,000' ? 'selected' : '' }}>Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999" {{ old('penghasilan_ayah') == 'Rp. 500,000 - Rp. 999,999' ? 'selected' : '' }}>Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999" {{ old('penghasilan_ayah') == 'Rp. 1,000,000 - Rp. 1,999,999' ? 'selected' : '' }}>Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999" {{ old('penghasilan_ayah') == 'Rp. 2,000,000 - Rp. 4,999,999' ? 'selected' : '' }}>Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000" {{ old('penghasilan_ayah') == 'Rp. 5,000,000 - Rp. 20,000,000' ? 'selected' : '' }}>Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000" {{ old('penghasilan_ayah') == 'Lebih dari Rp. 20,000,000' ? 'selected' : '' }}>Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak Berpenghasilan" {{ old('penghasilan_ayah') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus Ayah</label>
                            <select id="berkebutuhan_ayah" name="berkebutuhan_ayah" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Tidak" {{ old('berkebutuhan_ayah') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Netra" {{ old('berkebutuhan_ayah') == 'Netra' ? 'selected' : '' }}>Netra</option>
                                <option value="Rungu" {{ old('berkebutuhan_ayah') == 'Rungu' ? 'selected' : '' }}>Rungu</option>
                                <option value="Wicara" {{ old('berkebutuhan_ayah') == 'Wicara' ? 'selected' : '' }}>Wicara</option>
                                <option value="Cerdas Istimewa" {{ old('berkebutuhan_ayah') == 'Cerdas Istimewa' ? 'selected' : '' }}>Cerdas Istimewa</option>
                                <option value="Autis" {{ old('berkebutuhan_ayah') == 'Autis' ? 'selected' : '' }}>Autis</option>
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
                            <input type="text" id="nama_ibu" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ old('nama_ibu') }}">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">NIK ibu</label>
                            <input type="number" id="nik_ibu" name="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" value="{{ old('nik_ibu') }}">
                        </div>
                    </div>
                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir ibu</label>
                            <input type="number" id="tahun_ibu" name="tahun_ibu" class="form-control @error('tahun_ibu') is-invalid @enderror" value="{{ old('tahun_ibu') }}">
                        </div>
                    </div>

                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir ibu</label>
                            <select id="pendidikan_ibu" name="pendidikan_ibu" class="select2bs4 form-control @error('pendidikan_ibu') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pendidikan --</option>
                                <option value="D1" {{ old('pendidikan_ibu') == 'D1' ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ old('pendidikan_ibu') == 'D2' ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ old('pendidikan_ibu') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4" {{ old('pendidikan_ibu') == 'D4' ? 'selected' : '' }}>D3</option>
                                <option value="Paket A" {{ old('pendidikan_ibu') == 'Paket A' ? 'selected' : '' }}>Paket A</option>
                                <option value="Paket B" {{ old('pendidikan_ibu') == 'Paket B' ? 'selected' : '' }}>Paket B</option>
                                <option value="Paket C" {{ old('pendidikan_ibu') == 'Paket C' ? 'selected' : '' }}>Paket C</option>
                                <option value="S1" {{ old('pendidikan_ibu') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_ibu') == 'S3' ? 'selected' : '' }}>S3</option>
                                <option value="PAUD" {{ old('pendidikan_ibu') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                                <option value="SD / sederajat" {{ old('pendidikan_ibu') == 'SD / sederajat' ? 'selected' : '' }}>SD / Sederajat</option>
                                <option value="SMP / sederajat" {{ old('pendidikan_ibu') == 'SMP / sederajat' ? 'selected' : '' }}>SMP / Sederajat</option>
                                <option value="SMA / sederajat" {{ old('pendidikan_ibu') == 'SMA / sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                                <option value="Putus SD" {{ old('pendidikan_ibu') == 'Putus SD' ? 'selected' : '' }}>Putus SD</option>
                                <option value="Tidak Sekolah" {{ old('pendidikan_ibu') == 'Tidak Sekolah' ? 'selected' : '' }}> Tidak Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan ibu</label>
                            <select id="pekerjaan_ibu" name="pekerjaan_ibu" class="select2bs4 form-control @error('pekerjaan_ibu') is-invalid @enderror">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Tidak Bekerja" {{ old('pekerjaan_ibu') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                <option value="Nelayan" {{ old('pekerjaan_ibu') == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                <option value="Petani" {{ old('pekerjaan_ibu') == 'Petani' ? 'selected' : '' }}>Petani</option>
                                <option value="Peternak" {{ old('pekerjaan_ibu') == 'Peternak' ? 'selected' : '' }}>Peternak</option>
                                <option value="PNS/TNI/Polri" {{ old('pekerjaan_ibu') == 'PNS/TNI/Polri' ? 'selected' : '' }}>PNS/PORLI/TNI</option>
                                <option value="Kariyawan Swasta" {{ old('pekerjaan_ibu') == 'Kariyawan Swasta' ? 'selected' : '' }}>Kariyawan Swasta</option>
                                <option value="Pedagang Kecil" {{ old('pekerjaan_ibu') == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                <option value="Pedagang Besar" {{ old('pekerjaan_ibu') == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                <option value="Wiraswasta" {{ old('pekerjaan_ibu') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="Wirausaha" {{ old('pekerjaan_ibu') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                <option value="Buruh" {{ old('pekerjaan_ibu') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                <option value="Tenaga Kerja Indonesia" {{ old('pekerjaan_ibu') == 'Tenaga Kerja Indonesia' ? 'selected' : '' }}>Tenaga Kerja Indonesia</option>
                                <option value="Sudah Meninggal" {{ old('pekerjaan_ibu') == 'Sudah Meninggal' ? 'selected' : '' }}> Sudah Meninggal</option>
                                <option value="Lainnya" {{ old('pekerjaan_ibu') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 required">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan ibu</label>
                            <select id="penghasilan_ibu" name="penghasilan_ibu" class="select2bs4 form-control @error('penghasilan_ibu') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp. 500,000" {{ old('penghasilan_ibu') == 'Kurang dari Rp. 500,000' ? 'selected' : '' }}>Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999" {{ old('penghasilan_ibu') == 'Rp. 500,000 - Rp. 999,999' ? 'selected' : '' }}>Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999" {{ old('penghasilan_ibu') == 'Rp. 1,000,000 - Rp. 1,999,999' ? 'selected' : '' }}>Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999" {{ old('penghasilan_ibu') == 'Rp. 2,000,000 - Rp. 4,999,999' ? 'selected' : '' }}>Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000" {{ old('penghasilan_ibu') == 'Rp. 5,000,000 - Rp. 20,000,000' ? 'selected' : '' }}>Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000" {{ old('penghasilan_ibu') == 'Lebih dari Rp. 20,000,000' ? 'selected' : '' }}>Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak Berpenghasilan" {{ old('penghasilan_ibu') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus ibu</label>
                            <select id="berkebutuhan_ibu" name="berkebutuhan_ibu" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Tidak" {{ old('berkebutuhan_ibu') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Netra" {{ old('berkebutuhan_ibu') == 'Netra' ? 'selected' : '' }}>Netra</option>
                                <option value="Rungu" {{ old('berkebutuhan_ibu') == 'Rungu' ? 'selected' : '' }}>Rungu</option>
                                <option value="Wicara" {{ old('berkebutuhan_ibu') == 'Wicara' ? 'selected' : '' }}>Wicara</option>
                                <option value="Cerdas Istimewa" {{ old('berkebutuhan_ibu') == 'Cerdas Istimewa' ? 'selected' : '' }}>Cerdas Istimewa</option>
                                <option value="Autis" {{ old('berkebutuhan_ibu') == 'Autis' ? 'selected' : '' }}>Autis</option>
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
                            <input type="text" id="nama_wali" name="nama_wali" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('nama_wali') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK wali</label>
                            <input type="text" id="nik_wali" name="nik_wali" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('nik_wali') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir wali</label>
                            <input type="text" id="tahun_wali" name="tahun_wali" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('tahun_wali') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir wali</label>
                            <select id="pendidikan_wali" name="pendidikan_wali" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pendidikan --</option>
                                <option value="D1" {{ old('pendidikan_wali') == 'D1' ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ old('pendidikan_wali') == 'D2' ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ old('pendidikan_wali') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="Paket A" {{ old('pendidikan_wali') == 'Paket A' ? 'selected' : '' }}>Paket A</option>
                                <option value="Paket B" {{ old('pendidikan_wali') == 'Paket B' ? 'selected' : '' }}>Paket B</option>
                                <option value="Paket C" {{ old('pendidikan_wali') == 'Paket C' ? 'selected' : '' }}>Paket C</option>
                                <option value="S1" {{ old('pendidikan_wali') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_wali') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_wali') == 'S3' ? 'selected' : '' }}>S3</option>
                                <option value="PAUD" {{ old('pendidikan_wali') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                                <option value="SD / Sederajat" {{ old('pendidikan_wali') == 'SD / Sederajat' ? 'selected' : '' }}>SD / Sederajat</option>
                                <option value="SMP / Sederajat" {{ old('pendidikan_wali') == 'SMP / Sederajat' ? 'selected' : '' }}>SMP / Sederajat</option>
                                <option value="SMA / Sederajat" {{ old('pendidikan_wali') == 'SMA / Sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                                <option value="Putus SD" {{ old('pendidikan_wali') == 'Putus SD' ? 'selected' : '' }}>Putus SD</option>
                                <option value="Tidak Sekolah" {{ old('pendidikan_wali') == 'Tidak Sekolah' ? 'selected' : '' }}> Tidak Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan wali</label>
                            <select id="pekerjaan_wali" name="pekerjaan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Pekerjaan --</option>
                                <option value="Tidak Bekerja" {{ old('pekerjaan_wali') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                <option value="Nelayan" {{ old('pekerjaan_wali') == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                <option value="Petani" {{ old('pekerjaan_wali') == 'Petani' ? 'selected' : '' }}>Petani</option>
                                <option value="Peternak" {{ old('pekerjaan_wali') == 'Peternak' ? 'selected' : '' }}>Peternak</option>
                                <option value="PNS/PORLI/TNI" {{ old('pekerjaan_wali') == 'PNS/PORLI/TNI' ? 'selected' : '' }}>PNS/PORLI/TNI</option>
                                <option value="Kariyawan Swasta" {{ old('pekerjaan_wali') == 'Kariyawan Swasta' ? 'selected' : '' }}>Kariyawan Swasta</option>
                                <option value="Pedagang Kecil" {{ old('pekerjaan_wali') == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                <option value="Pedagang Besar" {{ old('pekerjaan_wali') == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                <option value="Wiraswasta" {{ old('pekerjaan_wali') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                <option value="Wirausaha" {{ old('pekerjaan_wali') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                <option value="Buruh" {{ old('pekerjaan_wali') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                <option value="Tenaga Kerja Indonesia" {{ old('pekerjaan_wali') == 'Tenaga Kerja Indonesia' ? 'selected' : '' }}>Tenaga Kerja Indonesia</option>
                                <option value="Sudah Meninggal" {{ old('pekerjaan_wali') == 'Sudah Meninggal' ? 'selected' : '' }}> Sudah Meninggal</option>
                                <option value="Lainnya" {{ old('pekerjaan_wali') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan wali</label>
                            <select id="penghasilan_wali" name="penghasilan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp. 500,000" {{ old('penghasilan_wali') == 'Kurang dari Rp. 500,000' ? 'selected' : '' }}>Kurang dari Rp. 500,000</option>
                                <option value="Rp. 500,000 - Rp. 999,999" {{ old('penghasilan_wali') == 'Rp. 500,000 - Rp. 999,999' ? 'selected' : '' }}>Rp. 500,000 - Rp. 999,999</option>
                                <option value="Rp. 1,000,000 - Rp. 1,999,999" {{ old('penghasilan_wali') == 'Rp. 1,000,000 - Rp. 1,999,999' ? 'selected' : '' }}>Rp. 1,000,000 - Rp. 1,999,999</option>
                                <option value="Rp. 2,000,000 - Rp. 4,999,999" {{ old('penghasilan_wali') == 'Rp. 2,000,000 - Rp. 4,999,999' ? 'selected' : '' }}>Rp. 2,000,000 - Rp. 4,999,999</option>
                                <option value="Rp. 5,000,000 - Rp. 20,000,000" {{ old('penghasilan_wali') == 'Rp. 5,000,000 - Rp. 20,000,000' ? 'selected' : '' }}>Rp. 5,000,000 - Rp. 20,000,000</option>
                                <option value="Lebih dari Rp. 20,000,000" {{ old('penghasilan_wali') == 'Lebih dari Rp. 20,000,000' ? 'selected' : '' }}>Lebih dari Rp. 20,000,000</option>
                                <option value="Tidak Berpenghasilan" {{ old('penghasilan_wali') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus wali</label>
                            <select id="berkebutuhan_wali" name="berkebutuhan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                            <option value="">-- Pilih Penghasilan --</option>
                                <option value="Tidak" {{ old('berkebutuhan_wali') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Netra" {{ old('berkebutuhan_wali') == 'Netra' ? 'selected' : '' }}>Netra</option>
                                <option value="Rungu" {{ old('berkebutuhan_wali') == 'Rungu' ? 'selected' : '' }}>Rungu</option>
                                <option value="Wicara" {{ old('berkebutuhan_wali') == 'Wicara' ? 'selected' : '' }}>Wicara</option>
                                <option value="Cerdas Istimewa" {{ old('berkebutuhan_wali') == 'Cerdas Istimewa' ? 'selected' : '' }}>Cerdas Istimewa</option>
                                <option value="Autis" {{ old('berkebutuhan_wali') == 'Autis' ? 'selected' : '' }}>Autis</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Data Wali -->

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('orangtua.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
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
    $("#orangtua").addClass("active");
</script>
@endsection
