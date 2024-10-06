@extends('template_backend.home')
@section('heading', 'Detail Pengajuan Data Orang Tua')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('TemOrangtua.index') }}">Data Orang Tua</a></li>
<li class="breadcrumb-item active">Detail Pengajuan Data Orang Tua</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <div class="d-grid gap-2 d-md-flex justify-content-between">
                <h3 class="card-title">Data Orang Tua <b>{{ $tem_orangtua->user->name }} </b></h3>
                <a href="{{ asset($tem_orangtua->user->berkas_kk) }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer"><i class="nav-icon fas fa-image"></i>&nbsp; Berkas Kartu Keluarga</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('TemOrangtua.update', $tem_orangtua->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <!-- Start Data Baru -->
                    <div class="col-md-6">
                        <input type="text" id="id" name="id" value="{{ $tem_orangtua->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Baru</h4>
                        </div>
                        <div class="">
                            <hr>
                            <h4 class="text-center text-uppercase font-weight-bold">AYAH</h4>
                            <hr>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="nama_ayah_cek" class="">Nama Ayah</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" value="{{ $tem_orangtua->nama_ayah }}" class="form-control @error('nama_ayah') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="nik_ayah_cek" class="">NIK Ayah</label>
                                <input type="number" id="nik_ayah" name="nik_ayah" value="{{ $tem_orangtua->nik_ayah }}" class="form-control @error('nik_ayah') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="tahun_ayah_cek" class="">Tahun Lahir Ayah</label>
                                <input type="number" id="tahun_ayah" name="tahun_ayah" value="{{ $tem_orangtua->tahun_ayah }}" class="form-control @error('tahun_ayah') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group required">
                                <label id="pendidikan_ayah_cek" class="">Pendidikan Terakhir Ayah</label>
                                <select id="pendidikan_ayah" name="pendidikan_ayah" class="select2bs4 form-control @error('pendidikan_ayah') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Pendidikan --</option>
                                    <option value="D1" @if ($tem_orangtua->pendidikan_ayah == 'D1')
                                        selected
                                        @endif
                                        >D1</option>
                                    <option value="D2" @if ($tem_orangtua->pendidikan_ayah == 'D2')
                                        selected
                                        @endif
                                        >D2</option>
                                    <option value="D3" @if ($tem_orangtua->pendidikan_ayah == 'D3')
                                        selected
                                        @endif
                                        >D3</option>
                                    <option value="D4" @if ($tem_orangtua->pendidikan_ayah == 'D4')
                                        selected
                                        @endif
                                        >D4</option>
                                    <option value="Paket A" @if ($tem_orangtua->pendidikan_ayah == 'Paket A')
                                        selected
                                        @endif
                                        >Paket A</option>
                                    <option value="Paket B" @if ($tem_orangtua->pendidikan_ayah == 'Paket B')
                                        selected
                                        @endif
                                        >Paket B</option>
                                    <option value="Paket C" @if ($tem_orangtua->pendidikan_ayah == 'Paket C')
                                        selected
                                        @endif
                                        >Paket C</option>
                                    <option value="S1" @if ($tem_orangtua->pendidikan_ayah == 'S1')
                                        selected
                                        @endif
                                        >S1</option>
                                    <option value="S2" @if ($tem_orangtua->pendidikan_ayah == 'S2')
                                        selected
                                        @endif
                                        >S2</option>
                                    <option value="S3" @if ($tem_orangtua->pendidikan_ayah == 'S3')
                                        selected
                                        @endif
                                        >S3</option>
                                    <option value="PAUD" @if ($tem_orangtua->pendidikan_ayah == 'PAUD')
                                        selected
                                        @endif
                                        >PAUD</option>
                                    <option value="SD / sederajat" @if ($tem_orangtua->pendidikan_ayah == 'SD / sederajat')
                                        selected
                                        @endif
                                        >SD / Sederajat</option>
                                    <option value="SMP / sederajat" @if ($tem_orangtua->pendidikan_ayah == 'SMP / sederajat')
                                        selected
                                        @endif
                                        >SMP / Sederajat</option>
                                    <option value="SMA / sederajat" @if ($tem_orangtua->pendidikan_ayah == 'SMA / sederajat')
                                        selected
                                        @endif
                                        >SMA / Sederajat</option>
                                    <option value="Putus SD" @if ($tem_orangtua->pendidikan_ayah == 'Putus SD')
                                        selected
                                        @endif
                                        >Putus SD</option>
                                    <option value="Tidak sekolah" @if ($tem_orangtua->pendidikan_ayah == 'Tidak sekolah')
                                        selected
                                        @endif
                                        >Tidak Sekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="pekerjaan_ayah_cek" class="">Pekerjaan Ayah</label>
                                <select id="pekerjaan_ayah" name="pekerjaan_ayah" class="select2bs4 form-control @error('pekerjaan_ayah') is-invalid @enderror">
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="Tidak Bekerja" @if ($tem_orangtua->pekerjaan_ayah == 'Tidak Bekerja')
                                        selected
                                        @endif
                                        >Tidak Bekerja</option>
                                    <option value="Nelayan" @if ($tem_orangtua->pekerjaan_ayah == 'Nelayan')
                                        selected
                                        @endif
                                        >Nelayan</option>
                                    <option value="Petani" @if ($tem_orangtua->pekerjaan_ayah == 'Petani')
                                        selected
                                        @endif
                                        >Petani</option>
                                    <option value="Peternak" @if ($tem_orangtua->pekerjaan_ayah == 'Peternak')
                                        selected
                                        @endif
                                        >Peternak</option>
                                    <option value="PNS/TNI/Polri" @if ($tem_orangtua->pekerjaan_ayah == 'PNS/TNI/Polri')
                                        selected
                                        @endif
                                        >PNS/PORLI/TNI</option>
                                    <option value="Karyawan Swasta" @if ($tem_orangtua->pekerjaan_ayah == 'Karyawan Swasta')
                                        selected
                                        @endif
                                        >Kariyawan Swasta</option>
                                    <option value="Pedagang Kecil" @if ($tem_orangtua->pekerjaan_ayah == 'Pedagang Kecil')
                                        selected
                                        @endif
                                        >Pedagang Kecil</option>
                                    <option value="Pedagang Besar" @if ($tem_orangtua->pekerjaan_ayah == 'Pedagang Besar')
                                        selected
                                        @endif
                                        >Pedagang Besar</option>
                                    <option value="Wiraswasta" @if ($tem_orangtua->pekerjaan_ayah == 'Wiraswasta')
                                        selected
                                        @endif
                                        >Wiraswasta</option>
                                    <option value="Wirausaha" @if ($tem_orangtua->pekerjaan_ayah == 'Wirausaha')
                                        selected
                                        @endif
                                        >Wirausaha</option>
                                    <option value="Buruh" @if ($tem_orangtua->pekerjaan_ayah == 'Buruh')
                                        selected
                                        @endif
                                        >Buruh</option>
                                    <option value="Tenaga Kerja Indonesia" @if ($tem_orangtua->pekerjaan_ayah == 'Tenaga Kerja Indonesia')
                                        selected
                                        @endif
                                        >Tenaga Kerja Indonesia</option>
                                    <option value="Sudah Meninggal" @if ($tem_orangtua->pekerjaan_ayah == 'Sudah Meninggal')
                                        selected
                                        @endif
                                        >Sudah Meninggal</option>
                                    <option value="Lainnya" @if ($tem_orangtua->pekerjaan_ayah == 'Lainnya')
                                        selected
                                        @endif
                                        >Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="penghasilan_ayah_cek" class="">Penghasilan Ayah</label>
                                <select id="penghasilan_ayah" name="penghasilan_ayah" class="select2bs4 form-control @error('penghasilan_ayah') is-invalid @enderror">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Kurang dari Rp. 500,000" @if ($tem_orangtua->penghasilan_ayah == 'Kurang dari Rp. 500,000')
                                        selected
                                        @endif
                                        >Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999" @if ($tem_orangtua->penghasilan_ayah == 'Rp. 500,000 - Rp. 999,999')
                                        selected
                                        @endif
                                        >Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999" @if ($tem_orangtua->penghasilan_ayah == 'Rp. 1,000,000 - Rp. 1,999,999')
                                        selected
                                        @endif
                                        >Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999" @if ($tem_orangtua->penghasilan_ayah == 'Rp. 2,000,000 - Rp. 4,999,999')
                                        selected
                                        @endif
                                        >Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000" @if ($tem_orangtua->penghasilan_ayah == 'Rp. 5,000,000 - Rp. 20,000,000')
                                        selected
                                        @endif
                                        >Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000" @if ($tem_orangtua->penghasilan_ayah == 'Lebih dari Rp. 20,000,000')
                                        selected
                                        @endif
                                        >Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan" @if ($tem_orangtua->penghasilan_ayah == 'Tidak Berpenghasilan')
                                        selected
                                        @endif
                                        >Tidak Berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="berkebutuhan_ayah_cek" class="">Berkebutuhan Khusus Ayah</label>
                                <select id="berkebutuhan_ayah" name="berkebutuhan_ayah" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Tidak" @if ($tem_orangtua->berkebutuhan_ayah == 'Tidak')
                                        selected
                                        @endif
                                        >Tidak</option>
                                    <option value="Netra" @if ($tem_orangtua->berkebutuhan_ayah == 'Netra')
                                        selected
                                        @endif
                                        >Netra</option>
                                    <option value="Rungu" @if ($tem_orangtua->berkebutuhan_ayah == 'Rungu')
                                        selected
                                        @endif
                                        >Rungu</option>
                                    <option value="Wicara" @if ($tem_orangtua->berkebutuhan_ayah == 'Wicara')
                                        selected
                                        @endif
                                        >Wicara</option>
                                    <option value="Cerdas Istimewa" @if ($tem_orangtua->berkebutuhan_ayah == 'Cerdas Istimewa')
                                        selected
                                        @endif
                                        >Cerdas Istimewa</option>
                                    <option value="Autis" @if ($tem_orangtua->berkebutuhan_ayah == 'Autis')
                                        selected
                                        @endif
                                        >Autis</option>
                                </select>
                            </div>
                        </div>
                        <!-- End Data Ayah -->

                        <!-- Start Data Ibu -->
                        <div class="">
                            <hr>
                            <h4 class="text-center text-uppercase font-weight-bold">IBU</h4>
                            <hr>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="nama_ibu_cek" class="">Nama ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" value="{{ $tem_orangtua->nama_ibu }}" class="form-control @error('nama_ibu') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="nik_ibu_cek" class="">NIK ibu</label>
                                <input type="number" id="nik_ibu" name="nik_ibu" value="{{ $tem_orangtua->nik_ibu }}" class="form-control @error('nik_ibu') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="tahun_ibu_cek" class="">Tahun Lahir ibu</label>
                                <input type="number" id="tahun_ibu" name="tahun_ibu" value="{{ $tem_orangtua->tahun_ibu }}" class="form-control @error('tahun_ibu') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group required">
                                <label id="pendidikan_ibu_cek" class="">Pendidikan Terakhir ibu</label>
                                <select id="pendidikan_ibu" name="pendidikan_ibu" class="select2bs4 form-control @error('pendidikan_ibu') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Pendidikan --</option>
                                    <option value="D1" @if ($tem_orangtua->pendidikan_ibu == 'D1')
                                        selected
                                        @endif
                                        >D1</option>
                                    <option value="D2" @if ($tem_orangtua->pendidikan_ibu == 'D2')
                                        selected
                                        @endif
                                        >D2</option>
                                    <option value="D3" @if ($tem_orangtua->pendidikan_ibu == 'D3')
                                        selected
                                        @endif
                                        >D3</option>
                                    <option value="D4" @if ($tem_orangtua->pendidikan_ibu == 'D4')
                                        selected
                                        @endif
                                        >D4</option>
                                    <option value="Paket A" @if ($tem_orangtua->pendidikan_ibu == 'Paket A')
                                        selected
                                        @endif
                                        >Paket A</option>
                                    <option value="Paket B" @if ($tem_orangtua->pendidikan_ibu == 'Paket B')
                                        selected
                                        @endif
                                        >Paket B</option>
                                    <option value="Paket C" @if ($tem_orangtua->pendidikan_ibu == 'Paket C')
                                        selected
                                        @endif
                                        >Paket C</option>
                                    <option value="S1" @if ($tem_orangtua->pendidikan_ibu == 'S1')
                                        selected
                                        @endif
                                        >S1</option>
                                    <option value="S2" @if ($tem_orangtua->pendidikan_ibu == 'S2')
                                        selected
                                        @endif
                                        >S2</option>
                                    <option value="S3" @if ($tem_orangtua->pendidikan_ibu == 'S3')
                                        selected
                                        @endif
                                        >S3</option>
                                    <option value="PAUD" @if ($tem_orangtua->pendidikan_ibu == 'PAUD')
                                        selected
                                        @endif
                                        >PAUD</option>
                                    <option value="SD / sederajat" @if ($tem_orangtua->pendidikan_ibu == 'SD / sederajat')
                                        selected
                                        @endif
                                        >SD / Sederajat</option>
                                    <option value="SMP / sederajat" @if ($tem_orangtua->pendidikan_ibu == 'SMP / sederajat')
                                        selected
                                        @endif
                                        >SMP / Sederajat</option>
                                    <option value="SMA / sederajat" @if ($tem_orangtua->pendidikan_ibu == 'SMA / sederajat')
                                        selected
                                        @endif
                                        >SMA / Sederajat</option>
                                    <option value="Putus SD" @if ($tem_orangtua->pendidikan_ibu == 'Putus SD')
                                        selected
                                        @endif
                                        >Putus SD</option>
                                    <option value="Tidak sekolah" @if ($tem_orangtua->pendidikan_ibu == 'Tidak sekolah')
                                        selected
                                        @endif
                                        >Tidak Sekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="pekerjaan_ibu_cek" class="">Pekerjaan ibu</label>
                                <select id="pekerjaan_ibu" name="pekerjaan_ibu" class="select2bs4 form-control @error('pekerjaan_ibu') is-invalid @enderror">
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="Tidak Bekerja" @if ($tem_orangtua->pekerjaan_ibu == 'Tidak Bekerja')
                                        selected
                                        @endif
                                        >Tidak Bekerja</option>
                                    <option value="Nelayan" @if ($tem_orangtua->pekerjaan_ibu == 'Nelayan')
                                        selected
                                        @endif
                                        >Nelayan</option>
                                    <option value="Petani" @if ($tem_orangtua->pekerjaan_ibu == 'Petani')
                                        selected
                                        @endif
                                        >Petani</option>
                                    <option value="Peternak" @if ($tem_orangtua->pekerjaan_ibu == 'Peternak')
                                        selected
                                        @endif
                                        >Peternak</option>
                                    <option value="PNS/PORLI/TNI" @if ($tem_orangtua->pekerjaan_ibu == 'PNS/PORLI/TNI')
                                        selected
                                        @endif
                                        >PNS/PORLI/TNI</option>
                                    <option value="Kariyawan Swasta" @if ($tem_orangtua->pekerjaan_ibu == 'Kariyawan Swasta')
                                        selected
                                        @endif
                                        >Kariyawan Swasta</option>
                                    <option value="Pedagang Kecil" @if ($tem_orangtua->pekerjaan_ibu == 'Pedagang Kecil')
                                        selected
                                        @endif
                                        >Pedagang Kecil</option>
                                    <option value="Pedagang Besar" @if ($tem_orangtua->pekerjaan_ibu == 'Pedagang Besar')
                                        selected
                                        @endif
                                        >Pedagang Besar</option>
                                    <option value="Wiraswasta" @if ($tem_orangtua->pekerjaan_ibu == 'Wiraswasta')
                                        selected
                                        @endif
                                        >Wiraswasta</option>
                                    <option value="Wirausaha" @if ($tem_orangtua->pekerjaan_ibu == 'Wirausaha')
                                        selected
                                        @endif
                                        >Wirausaha</option>
                                    <option value="Buruh" @if ($tem_orangtua->pekerjaan_ibu == 'Buruh')
                                        selected
                                        @endif
                                        >Buruh</option>
                                    <option value="Tenaga Kerja Indonesia" @if ($tem_orangtua->pekerjaan_ibu == 'Tenaga Kerja Indonesia')
                                        selected
                                        @endif
                                        >Tenaga Kerja Indonesia</option>
                                    <option value="Sudah Meninggal" @if ($tem_orangtua->pekerjaan_ibu == 'Sudah Meninggal')
                                        selected
                                        @endif
                                        >Sudah Meninggal</option>
                                    <option value="Lainnya" @if ($tem_orangtua->pekerjaan_ibu == 'Lainnya')
                                        selected
                                        @endif
                                        >Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group required">
                                <label id="penghasilan_ibu_cek" class="">Penghasilan ibu</label>
                                <select id="penghasilan_ibu" name="penghasilan_ibu" class="select2bs4 form-control @error('penghasilan_ibu') is-invalid @enderror">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Kurang dari Rp. 500,000" @if ($tem_orangtua->penghasilan_ibu == 'Kurang dari Rp. 500,000')
                                        selected
                                        @endif
                                        >Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999" @if ($tem_orangtua->penghasilan_ibu == 'Rp. 500,000 - Rp. 999,999')
                                        selected
                                        @endif
                                        >Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999" @if ($tem_orangtua->penghasilan_ibu == 'Rp. 1,000,000 - Rp. 1,999,999')
                                        selected
                                        @endif
                                        >Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999" @if ($tem_orangtua->penghasilan_ibu == 'Rp. 2,000,000 - Rp. 4,999,999')
                                        selected
                                        @endif
                                        >Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000" @if ($tem_orangtua->penghasilan_ibu == 'Rp. 5,000,000 - Rp. 20,000,000')
                                        selected
                                        @endif
                                        >Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000" @if ($tem_orangtua->penghasilan_ibu == 'Lebih dari Rp. 20,000,000')
                                        selected
                                        @endif
                                        >Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan" @if ($tem_orangtua->penghasilan_ibu == 'Tidak Berpenghasilan')
                                        selected
                                        @endif
                                        >Tidak Berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="berkebutuhan_ibu_cek" class="">Berkebutuhan Khusus ibu</label>
                                <select id="berkebutuhan_ibu" name="berkebutuhan_ibu" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Tidak" @if ($tem_orangtua->berkebutuhan_ibu == 'Tidak')
                                        selected
                                        @endif
                                        >Tidak</option>
                                    <option value="Netra" @if ($tem_orangtua->berkebutuhan_ibu == 'Netra')
                                        selected
                                        @endif
                                        >Netra</option>
                                    <option value="Rungu" @if ($tem_orangtua->berkebutuhan_ibu == 'Rungu')
                                        selected
                                        @endif
                                        >Rungu</option>
                                    <option value="Wicara" @if ($tem_orangtua->berkebutuhan_ibu == 'Wicara')
                                        selected
                                        @endif
                                        >Wicara</option>
                                    <option value="Cerdas Istimewa" @if ($tem_orangtua->berkebutuhan_ibu == 'Cerdas Istimewa')
                                        selected
                                        @endif
                                        >Cerdas Istimewa</option>
                                    <option value="Autis" @if ($tem_orangtua->berkebutuhan_ibu == 'Autis')
                                        selected
                                        @endif
                                        >Autis</option>
                                </select>
                            </div>
                        </div>
                        <!-- End Data Ibu -->

                        <!-- Start Data Wali -->
                        <div class="">
                            <hr>
                            <h4 class="text-center text-uppercase font-weight-bold">WALI</h4>
                            <hr>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="nama_wali_cek" class="">Nama wali</label>
                                <input type="text" id="nama_wali" name="nama_wali" value="{{ $tem_orangtua->nama_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="nik_wali_cek" class="">NIK wali</label>
                                <input type="number" id="nik_wali" name="nik_wali" value="{{ $tem_orangtua->nik_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="tahun_wali_cek" class="">Tahun Lahir wali</label>
                                <input type="number" id="tahun_wali" name="tahun_wali" value="{{ $tem_orangtua->tahun_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group">
                                <label id="pendidikan_wali_cek" class="">Pendidikan Terakhir wali</label>
                                <select id="pendidikan_wali" name="pendidikan_wali" class="select2bs4 form-control @error('agama') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Pendidikan --</option>
                                    <option value="D1" @if ($tem_orangtua->pendidikan_wali == 'D1')
                                        selected
                                        @endif
                                        >D1</option>
                                    <option value="D2" @if ($tem_orangtua->pendidikan_wali == 'D2')
                                        selected
                                        @endif
                                        >D2</option>
                                    <option value="D3" @if ($tem_orangtua->pendidikan_wali == 'D3')
                                        selected
                                        @endif
                                        >D3</option>
                                    <option value="Paket A" @if ($tem_orangtua->pendidikan_wali == 'Paket A')
                                        selected
                                        @endif
                                        >Paket A</option>
                                    <option value="Paket B" @if ($tem_orangtua->pendidikan_wali == 'Paket B')
                                        selected
                                        @endif
                                        >Paket B</option>
                                    <option value="Paket C" @if ($tem_orangtua->pendidikan_wali == 'Paket C')
                                        selected
                                        @endif
                                        >Paket C</option>
                                    <option value="S1" @if ($tem_orangtua->pendidikan_wali == 'S1')
                                        selected
                                        @endif
                                        >S1</option>
                                    <option value="S2" @if ($tem_orangtua->pendidikan_wali == 'S2')
                                        selected
                                        @endif
                                        >S2</option>
                                    <option value="S3" @if ($tem_orangtua->pendidikan_wali == 'S3')
                                        selected
                                        @endif
                                        >S3</option>
                                    <option value="PAUD" @if ($tem_orangtua->pendidikan_wali == 'PAUD')
                                        selected
                                        @endif
                                        >PAUD</option>
                                    <option value="SD / Sederajat" @if ($tem_orangtua->pendidikan_wali == 'SD / Sederajat')
                                        selected
                                        @endif
                                        >SD / Sederajat</option>
                                    <option value="SMP / Sederajat" @if ($tem_orangtua->pendidikan_wali == 'SMP / Sederajat')
                                        selected
                                        @endif
                                        >SMP / Sederajat</option>
                                    <option value="SMA / Sederajat" @if ($tem_orangtua->pendidikan_wali == 'SMA / Sederajat')
                                        selected
                                        @endif
                                        >SMA / Sederajat</option>
                                    <option value="Putus SD" @if ($tem_orangtua->pendidikan_wali == 'Putus SD')
                                        selected
                                        @endif
                                        >Putus SD</option>
                                    <option value="Tidak Sekolah" @if ($tem_orangtua->pendidikan_wali == 'Tidak Sekolah')
                                        selected
                                        @endif
                                        >Tidak Sekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="pekerjaan_wali_cek" class="">Pekerjaan wali</label>
                                <select id="pekerjaan_wali" name="pekerjaan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="Tidak Bekerja" @if ($tem_orangtua->pekerjaan_wali == 'Tidak Bekerja')
                                        selected
                                        @endif
                                        >Tidak Bekerja</option>
                                    <option value="Nelayan" @if ($tem_orangtua->pekerjaan_wali == 'Nelayan')
                                        selected
                                        @endif
                                        >Nelayan</option>
                                    <option value="Petani" @if ($tem_orangtua->pekerjaan_wali == 'Petani')
                                        selected
                                        @endif
                                        >Petani</option>
                                    <option value="Peternak" @if ($tem_orangtua->pekerjaan_wali == 'Peternak')
                                        selected
                                        @endif
                                        >Peternak</option>
                                    <option value="PNS/PORLI/TNI" @if ($tem_orangtua->pekerjaan_wali == 'PNS/PORLI/TNI')
                                        selected
                                        @endif
                                        >PNS/PORLI/TNI</option>
                                    <option value="Kariyawan Swasta" @if ($tem_orangtua->pekerjaan_wali == 'Kariyawan Swasta')
                                        selected
                                        @endif
                                        >Kariyawan Swasta</option>
                                    <option value="Pedagang Kecil" @if ($tem_orangtua->pekerjaan_wali == 'Pedagang Kecil')
                                        selected
                                        @endif
                                        >Pedagang Kecil</option>
                                    <option value="Pedagang Besar" @if ($tem_orangtua->pekerjaan_wali == 'Pedagang Besar')
                                        selected
                                        @endif
                                        >Pedagang Besar</option>
                                    <option value="Wiraswasta" @if ($tem_orangtua->pekerjaan_wali == 'Wiraswasta')
                                        selected
                                        @endif
                                        >Wiraswasta</option>
                                    <option value="Wirausaha" @if ($tem_orangtua->pekerjaan_wali == 'Wirausaha')
                                        selected
                                        @endif
                                        >Wirausaha</option>
                                    <option value="Buruh" @if ($tem_orangtua->pekerjaan_wali == 'Buruh')
                                        selected
                                        @endif
                                        >Buruh</option>
                                    <option value="Tenaga Kerja Indonesia" @if ($tem_orangtua->pekerjaan_wali == 'Tenaga Kerja Indonesia')
                                        selected
                                        @endif
                                        >Tenaga Kerja Indonesia</option>
                                    <option value="Sudah Meninggal" @if ($tem_orangtua->pekerjaan_wali == 'Sudah Meninggal')
                                        selected
                                        @endif
                                        >Sudah Meninggal</option>
                                    <option value="Lainnya" @if ($tem_orangtua->pekerjaan_wali == 'Lainnya')
                                        selected
                                        @endif
                                        >Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="penghasilan_wali_cek" class="">Penghasilan wali</label>
                                <select id="penghasilan_wali" name="penghasilan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Kurang dari Rp. 500,000" @if ($tem_orangtua->penghasilan_wali == 'Kurang dari Rp. 500,000')
                                        selected
                                        @endif
                                        >Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999" @if ($tem_orangtua->penghasilan_wali == 'Rp. 500,000 - Rp. 999,999')
                                        selected
                                        @endif
                                        >Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999" @if ($tem_orangtua->penghasilan_wali == 'Rp. 1,000,000 - Rp. 1,999,999')
                                        selected
                                        @endif
                                        >Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999" @if ($tem_orangtua->penghasilan_wali == 'Rp. 2,000,000 - Rp. 4,999,999')
                                        selected
                                        @endif
                                        >Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000" @if ($tem_orangtua->penghasilan_wali == 'Rp. 5,000,000 - Rp. 20,000,000')
                                        selected
                                        @endif
                                        >Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000" @if ($tem_orangtua->penghasilan_wali == 'Lebih dari Rp. 20,000,000')
                                        selected
                                        @endif
                                        >Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan" @if ($tem_orangtua->penghasilan_wali == 'Tidak Berpenghasilan')
                                        selected
                                        @endif
                                        >Tidak Berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label id="berkebutuhan_wali_cek" class="">Berkebutuhan Khusus wali</label>
                                <select id="berkebutuhan_wali" name="berkebutuhan_wali" class="select2bs4 form-control @error('tmp_tinggal') is-invalid @enderror">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Tidak" @if ($tem_orangtua->berkebutuhan_wali == 'Tidak')
                                        selected
                                        @endif
                                        >Tidak</option>
                                    <option value="Netra" @if ($tem_orangtua->berkebutuhan_wali == 'Netra')
                                        selected
                                        @endif
                                        >Netra</option>
                                    <option value="Rungu" @if ($tem_orangtua->berkebutuhan_wali == 'Rungu')
                                        selected
                                        @endif
                                        >Rungu</option>
                                    <option value="Wicara" @if ($tem_orangtua->berkebutuhan_wali == 'Wicara')
                                        selected
                                        @endif
                                        >Wicara</option>
                                    <option value="Cerdas Istimewa" @if ($tem_orangtua->berkebutuhan_wali == 'Cerdas Istimewa')
                                        selected
                                        @endif
                                        >Cerdas Istimewa</option>
                                    <option value="Autis" @if ($tem_orangtua->berkebutuhan_wali == 'Autis')
                                        selected
                                        @endif
                                        >Autis</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- End Data Wali -->
                    <!-- End Data Baru -->

                    <!-- Start Data Lama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Lama</h4>
                        </div>
                        <input type="text" id="id" name="id" value="{{ $tem_orangtua->orangtua->id }}" class="form-control d-none" readonly>

                        <div class="">
                            <hr>
                            <h4 class="text-center text-uppercase font-weight-bold">AYAH</h4>
                            <hr>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="kelas">Nama Ayah</label>
                                <input readonly type="text" id="nama_ayah_lama" name="nama_ayah" value="{{ $tem_orangtua->orangtua->nama_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="kelas">NIK Ayah</label>
                                <input readonly type="text" id="nik_ayah_lama" name="nik_ayah" value="{{ $tem_orangtua->orangtua->nik_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="kelas">Tahun Lahir Ayah</label>
                                <input readonly type="text" id="tahun_ayah_lama" name="tahun_ayah" value="{{ $tem_orangtua->orangtua->tahun_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir Ayah</label>
                            <input readonly id="pendidikan_ayah_lama" value="{{$tem_orangtua->orangtua->pendidikan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Ayah</label>
                            <input readonly id="pekerjaan_ayah_lama" value="{{$tem_orangtua->orangtua->pekerjaan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan Ayah</label>
                            <input readonly id="penghasilan_ayah_lama" value="{{$tem_orangtua->orangtua->penghasilan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="bekebutuhan">Berkebutuhan Khusus Ayah</label>
                            <input readonly id="berkebutuhan_ayah_lama" value="{{$tem_orangtua->orangtua->berkebutuhan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <!-- End Data Ayah -->

                        <!-- Start Data Ibu -->

                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">IBU</h4>
                        <hr>

                        <div class="form-group">
                            <label for="kelas">Nama ibu</label>
                            <input readonly type="text" id="nama_ibu_lama" name="nama_ibu" value="{{ $tem_orangtua->orangtua->nama_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">NIK ibu</label>
                            <input readonly type="text" id="nik_ibu_lama" name="nik_ibu" value="{{ $tem_orangtua->orangtua->nik_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">Tahun Lahir ibu</label>
                            <input readonly type="text" id="tahun_ibu_lama" name="tahun_ibu" value="{{ $tem_orangtua->orangtua->tahun_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir ibu</label>
                            <input readonly id="pendidikan_ibu_lama" value="{{$tem_orangtua->orangtua->pendidikan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan ibu</label>
                            <input readonly id="pekerjaan_ibu_lama" value="{{$tem_orangtua->orangtua->pekerjaan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan ibu</label>
                            <input readonly id="penghasilan_ibu_lama" value="{{$tem_orangtua->orangtua->penghasilan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus ibu</label>
                            <input readonly id="berkebutuhan_ibu_lama" value="{{$tem_orangtua->orangtua->berkebutuhan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <!-- End Data Ibu -->

                        <!-- Start Data Wali -->

                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">WALI</h4>
                        <hr>

                        <div class="form-group">
                            <label for="kelas">Nama wali</label>
                            <input readonly type="text" id="nama_wali_lama" name="nama_wali" value="{{ $tem_orangtua->orangtua->nama_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">NIK wali</label>
                            <input readonly type="text" id="nik_wali_lama" name="nik_wali" value="{{ $tem_orangtua->orangtua->nik_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">Tahun Lahir wali</label>
                            <input readonly type="text" id="tahun_wali_lama" name="tahun_wali" value="{{ $tem_orangtua->orangtua->tahun_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir wali</label>
                            <input readonly id="pendidkan_wali_lama" value="{{$tem_orangtua->orangtua->pendidikan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan wali</label>
                            <input readonly id="pekerjaan_wali_lama" value="{{$tem_orangtua->orangtua->pekerjaan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan wali</label>
                            <input readonly id="penghaslian_wali_lama" value="{{$tem_orangtua->orangtua->penghasilan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus wali</label>
                            <input readonly id="berkebutuhan_wali_lama" value="{{$tem_orangtua->orangtua->berkebutuhan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <!-- End Data Wali -->
                    <!-- End Data Lama -->

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group required">
                            <label for="status">Status Data</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="Setujui" @if ($tem_orangtua->status == 'Setujui')
                                    selected
                                    @endif
                                    >Disetujui</option>   
                            <option value="Tolak" @if ($tem_orangtua->status == 'Tolak')
                                    selected
                                    @endif
                                    >Ditolak</option>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="ket" name="ket" value="{{ $tem_orangtua->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
    @if(Auth::user()->role == 'Admin' && $tem_orangtua->status == 'Pending')
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-flex justify-content-between">
            <a href="{{ route('TemOrangtua.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
            <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
    </div>
    @endif
    </form>
</div>
<!-- /.card -->
</div>
@endsection
@section('script')
<script>
    function nama_ayah() {
        if (document.getElementById("nama_ayah").value != document.getElementById("nama_ayah_lama").value) {
            document.getElementById("nama_ayah_cek").classList.add("text-red");
        }
    }

    function nik_ayah() {
        if (document.getElementById("nik_ayah").value != document.getElementById("nik_ayah_lama").value) {
            document.getElementById("nik_ayah_cek").classList.add("text-red");
        }
    }

    function tahun_ayah() {
        if (document.getElementById("tahun_ayah").value != document.getElementById("tahun_ayah_lama").value) {
            document.getElementById("tahun_ayah_cek").classList.add("text-red");
        }
    }

    function pendidikan_ayah() {
        if (document.getElementById("pendidikan_ayah").value != document.getElementById("pendidikan_ayah_lama").value) {
            document.getElementById("pendidikan_ayah_cek").classList.add("text-red");
        }
    }

    function pekerjaan_ayah() {
        if (document.getElementById("pekerjaan_ayah").value != document.getElementById("pekerjaan_ayah_lama").value) {
            document.getElementById("pekerjaan_ayah_cek").classList.add("text-red");
        }
    }

    function penghasilan_ayah() {
        if (document.getElementById("penghasilan_ayah").value != document.getElementById("penghasilan_ayah_lama").value) {
            document.getElementById("penghasilan_ayah_cek").classList.add("text-red");
        }
    }

    function berkebutuhan_ayah() {
        if (document.getElementById("berkebutuhan_ayah").value != document.getElementById("berkebutuhan_ayah_lama").value) {
            document.getElementById("berkebutuhan_ayah_cek").classList.add("text-red");
        }
    }

    function nama_ibu() {
        if (document.getElementById("nama_ibu").value != document.getElementById("nama_ibu_lama").value) {
            document.getElementById("nama_ibu_cek").classList.add("text-red");
        }
    }

    function nik_ibu() {
        if (document.getElementById("nik_ibu").value != document.getElementById("nik_ibu_lama").value) {
            document.getElementById("nik_ibu_cek").classList.add("text-red");
        }
    }

    function tahun_ibu() {
        if (document.getElementById("tahun_ibu").value != document.getElementById("tahun_ibu_lama").value) {
            document.getElementById("tahun_ibu_cek").classList.add("text-red");
        }
    }

    function pendidikan_ibu() {
        if (document.getElementById("pendidikan_ibu").value != document.getElementById("pendidikan_ibu_lama").value) {
            document.getElementById("pendidikan_ibu_cek").classList.add("text-red");
        }
    }

    function pekerjaan_ibu() {
        if (document.getElementById("pekerjaan_ibu").value != document.getElementById("pekerjaan_ibu_lama").value) {
            document.getElementById("pekerjaan_ibu_cek").classList.add("text-red");
        }
    }

    function penghasilan_ibu() {
        if (document.getElementById("penghasilan_ibu").value != document.getElementById("penghasilan_ibu_lama").value) {
            document.getElementById("penghasilan_ibu_cek").classList.add("text-red");
        }
    }

    function berkebutuhan_ibu() {
        if (document.getElementById("berkebutuhan_ibu").value != document.getElementById("berkebutuhan_ibu_lama").value) {
            document.getElementById("berkebutuhan_ibu_cek").classList.add("text-red");
        }
    }

    function nama_wali() {
        if (document.getElementById("nama_wali").value != document.getElementById("nama_wali_lama").value) {
            document.getElementById("nama_wali_cek").classList.add("text-red");
        }
    }

    function nik_wali() {
        if (document.getElementById("nik_wali").value != document.getElementById("nik_wali_lama").value) {
            document.getElementById("nik_wali_cek").classList.add("text-red");
        }
    }

    function tahun_wali() {
        if (document.getElementById("tahun_wali").value != document.getElementById("tahun_wali_lama").value) {
            document.getElementById("tahun_wali_cek").classList.add("text-red");
        }
    }

    function pendidikan_wali() {
        if (document.getElementById("pendidikan_wali").value != document.getElementById("pendidikan_wali_lama").value) {
            document.getElementById("pendidikan_wali_cek").classList.add("text-red");
        }
    }

    function pekerjaan_wali() {
        if (document.getElementById("pekerjaan_wali").value != document.getElementById("pekerjaan_wali_lama").value) {
            document.getElementById("pekerjaan_wali_cek").classList.add("text-red");
        }
    }

    function penghasilan_wali() {
        if (document.getElementById("penghasilan_wali").value != document.getElementById("penghasilan_wali_lama").value) {
            document.getElementById("penghasilan_wali_cek").classList.add("text-red");
        }
    }

    function berkebutuhan_wali() {
        if (document.getElementById("berkebutuhan_wali").value != document.getElementById("berkebutuhan_wali_lama").value) {
            document.getElementById("berkebutuhan_wali_cek").classList.add("text-red");
        }
    }

    const windowOnload = window.onload = () => {
        nama_ayah();
        nik_ayah();
        tahun_ayah();
        pendidikan_ayah();
        pekerjaan_ayah();
        penghasilan_ayah();
        berkebutuhan_ayah();
        nama_ibu();
        nik_ibu();
        tahun_ibu();
        pendidikan_ibu();
        pekerjaan_ibu();
        penghasilan_ibu();
        berkebutuhan_ibu();
        nama_wali();
        nik_wali();
        tahun_wali();
        pendidikan_wali();
        pekerjaan_wali();
        penghasilan_wali();
        berkebutuhan_wali();
    };
</script>
<script type="text/javascript">
    $("#AjuanData").addClass("active");
    $("#liAjuanData").addClass("menu-open");
    $("#TemOrangtua").addClass("active");
</script>
@endsection
