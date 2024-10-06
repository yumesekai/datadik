@extends('template_backend.home')
@section('heading', 'Detail Pengajuan Data Priodik')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('TemPriodik.index') }}">Data Priodik</a></li>
<li class="breadcrumb-item active">Detail Pengajuan Data Priodik</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Priodik <b> {{ $tem_priodik->user->name }} </b></h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('TemPriodik.update',$tem_priodik->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <!-- /.Start Data Baru -->
                    <div class="col-md-6 required">
                        <input type="text" id="id" name="id" value="{{ $tem_priodik->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Baru</h4>
                        </div>
                        <div class="form-group">
                            <label id="tinggi_badan_cek" class="">Tinggi Badan</label>
                            <input type="text" id="tinggi_badan" name="tinggi_badan" value="{{ $tem_priodik->tinggi_badan }}" class="form-control @error('tinggi_badan') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label id="berat_badan_cek" class="">Berat Badan</label>
                            <input type="text" id="berat_badan" name="berat_badan" value="{{ $tem_priodik->berat_badan }}" class="form-control @error('berat_badan') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label id="jarak_sekolah_cek" class="">Jarak Sekolah</label>
                            <input type="text" id="jarak_sekolah" name="jarak_sekolah" value="{{ $tem_priodik->jarak_sekolah }}" class="form-control @error('jarak_sekolah') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label id="jumlah_saudara_cek" class="">Jumlah Saudara</label>
                            <input type="text" id="jumlah_saudara" name="jumlah_saudara" value="{{ $tem_priodik->jumlah_saudara }}" class="form-control @error('jumlah_saudara') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- /.End Data Baru -->

                    <!-- /.Start Data Lama -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Lama</h4>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Tinggi Badan</label>
                            <input readonly type="text" id="tinggi_badan_lama" value="{{ $tem_priodik->priodik->tinggi_badan }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Berat Badan</label>
                            <input readonly type="text" id="berat_badan_lama" value="{{ $tem_priodik->priodik->berat_badan }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Jarak Sekolah</label>
                            <input readonly type="text" id="jarak_sekolah_lama" value="{{ $tem_priodik->priodik->jarak_sekolah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Jumlah Saudara</label>
                            <input readonly type="text" id="jumlah_saudara_lama" value="{{ $tem_priodik->priodik->jumlah_saudara }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- /.End Data Lama -->

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group required">
                            <label for="status">Status Data</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="Setujui" @if ($tem_priodik->status == 'Setujui')
                                    selected
                                    @endif
                                    >Disetujui</option>   
                            <option value="Tolak" @if ($tem_priodik->status == 'Tolak')
                                    selected
                                    @endif
                                    >Ditolak</option>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="ket" name="ket" value="{{ $tem_priodik->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                @if(Auth::user()->role == 'Admin' && $tem_priodik->status == 'Pending')
                <div class="card-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="{{ route('TemPriodik.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    function tinggi_badan() {
        if (document.getElementById("tinggi_badan").value != document.getElementById("tinggi_badan_lama").value) {
            document.getElementById("tinggi_badan_cek").classList.add("text-red");
        }
    }

    function berat_badan() {
        if (document.getElementById("berat_badan").value != document.getElementById("berat_badan_lama").value) {
            document.getElementById("berat_badan_cek").classList.add("text-red");
        }
    }

    function jarak_sekolah() {
        if (document.getElementById("jarak_sekolah").value != document.getElementById("jarak_sekolah_lama").value) {
            document.getElementById("jarak_sekolah_cek").classList.add("text-red");
        }
    }

    function jumlah_saudara() {
        if (document.getElementById("jumlah_saudara").value != document.getElementById("jumlah_saudara_lama").value) {
            document.getElementById("jumlah_saudara_cek").classList.add("text-red");
        }
    }

    const windowOnload = window.onload = () => {
        tinggi_badan();
        berat_badan();
        jarak_sekolah();
        jumlah_saudara();
    };
</script>
<script type="text/javascript">
    $("#AjuanData").addClass("active");
    $("#liAjuanData").addClass("menu-open");
    $("#TemPriodik").addClass("active");
</script>
@endsection
