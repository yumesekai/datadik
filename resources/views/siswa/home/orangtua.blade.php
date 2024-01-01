@extends('template_backend.home')
@section('heading', 'Edit Data Orang Tua')
@section('page')
<li class="breadcrumb-item active">Data Orang Tua</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Orang Tua</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="text" id="id" name="id" value="{{  $orangtua->id }}" class="form-control d-none" readonly>
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">AYAH</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Nama Ayah</label>
                            <input readonly type="text" id="nama_ayah" name="nama_ayah" value="{{ $orangtua->nama_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK Ayah</label>
                            <input readonly type="text" id="nik_ayah" name="nik_ayah" value="{{ $orangtua->nik_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir Ayah</label>
                            <input readonly type="text" id="tahun_ayah" name="tahun_ayah" value="{{ $orangtua->tahun_ayah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir Ayah</label>
                            <input readonly value="{{$orangtua->pendidikan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Ayah</label>
                            <input readonly value="{{$orangtua->pekerjaan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan Ayah</label>
                            <input readonly value="{{$orangtua->penghasilan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bekebutuhan">Berkebutuhan Khusus Ayah</label>
                            <input readonly value="{{$orangtua->berkebutuhan_ayah}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- End Data Ayah -->

                    <!-- Start Data Ibu -->
                    <div class="col-md-12">
                        <hr>
                        <h4 class="text-center text-uppercase font-weight-bold">IBU</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Nama ibu</label>
                            <input readonly type="text" id="nama_ibu" name="nama_ibu" value="{{ $orangtua->nama_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK ibu</label>
                            <input readonly type="text" id="nik_ibu" name="nik_ibu" value="{{ $orangtua->nik_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir ibu</label>
                            <input readonly type="text" id="tahun_ibu" name="tahun_ibu" value="{{ $orangtua->tahun_ibu }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir ibu</label>
                            <input readonly value="{{$orangtua->pendidikan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan ibu</label>
                            <input readonly value="{{$orangtua->pekerjaan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan ibu</label>
                            <input readonly value="{{$orangtua->penghaslian_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus ibu</label>
                            <input readonly value="{{$orangtua->berkebutuhan_ibu}}" class="form-control @error('kelas') is-invalid @enderror">
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
                            <input readonly type="text" id="nama_wali" name="nama_wali" value="{{ $orangtua->nama_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">NIK wali</label>
                            <input readonly type="text" id="nik_wali" name="nik_wali" value="{{ $orangtua->nik_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Tahun Lahir wali</label>
                            <input readonly type="text" id="tahun_wali" name="tahun_wali" value="{{ $orangtua->tahun_wali }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir wali</label>
                            <input readonly value="{{$orangtua->pendidikan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan wali</label>
                            <input readonly value="{{$orangtua->pekerjaan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Penghasilan wali</label>
                            <input readonly value="{{$orangtua->penghasilan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan">Berkebutuhan Khusus wali</label>
                            <input readonly value="{{$orangtua->berkebutuhan_wali}}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- End Data Wali -->

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
    $("#OrangtuaSiswa").addClass("active");
</script>
@endsection