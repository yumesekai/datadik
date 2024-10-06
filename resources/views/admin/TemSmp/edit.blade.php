@extends('template_backend.home')
@section('heading', 'Detail Pengajuan Data SMP')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('TemSmp.index') }}">Data SMP</a></li>
<li class="breadcrumb-item active">Detail Pengajuan Data SMP</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <div class="d-grid gap-2 d-md-flex justify-content-between">
                <h3 class="card-title">Data SMP <b> {{ $tem_smp->user->name }} </b></h3>
                <a href="{{ asset($tem_smp->user->berkas_ijasah) }}" class="btn btn-warning" target="_blank" rel="noopener noreferrer"><i class="nav-icon fas fa-image"></i>&nbsp; Berkas Ijasah</a>
            </div>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('TemSmp.update',$tem_smp->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <!-- /.Start Data Baru -->
                    <div class="col-md-6">
                        <input type="text" id="id" name="id" value="{{ $tem_smp->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Baru</h4>
                        </div>
                        <div class="form-group required">
                            <label id="sekolah_asal_cek" class="">Nama Sekolah SMP</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" value="{{ $tem_smp->sekolah_asal }}" class="form-control @error('sekolah_asal') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label id="no_un_cek" class="">Nomer Ujian Nasional</label>
                            <input type="text" id="no_un" name="no_un" value="{{ $tem_smp->no_un }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label id="no_skhun_cek" class="">Nomer SKHUN</label>
                            <input type="text" id="no_skhun" name="no_skhun" value="{{ $tem_smp->no_skhun }}" class="form-control @error('no_skhun') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label id="no_ijasah_cek" class="">Nomer Ijasah</label>
                            <input type="text" id="no_ijasah" name="no_ijasah" value="{{ $tem_smp->no_ijasah }}" class="form-control @error('no_ijasah') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- /.End Data Baru -->

                    <!-- /.Start Data Lama -->
                    <div class="col-md-6">
                        <input readonly type="text" id="id_lama" value="{{ $tem_smp->smp->id }}" class="form-control d-none" readonly>
                        <div class="form-group">
                            <h4 class="text-center text-uppercase font-weight-bold">Data Lama</h4>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Nama Sekolah SMP</label>
                            <input readonly type="text" id="sekolah_asal_lama" value="{{ $tem_smp->smp->sekolah_asal }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">Nomer Ujian Nasional</label>
                            <input readonly type="text" id="no_un_lama" value="{{ $tem_smp->smp->no_un }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">Nomer SKHUN</label>
                            <input readonly type="text" id="no_skhun_lama" value="{{ $tem_smp->smp->no_skhun }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="kelas">Nomer Ijasah</label>
                            <input readonly type="text" id="no_ijasah_lama" value="{{ $tem_smp->smp->no_ijasah }}" class="form-control @error('kelas') is-invalid @enderror">
                        </div>
                    </div>
                    <!-- /.End Data Lama -->
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group required">
                            <label for="status">Status Data</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="Setujui" @if ($tem_smp->status == 'Setujui')
                                    selected
                                    @endif
                                    >Disetujui</option>   
                            <option value="Tolak" @if ($tem_smp->status == 'Tolak')
                                    selected
                                    @endif
                                    >Ditolak</option>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="ket" name="ket" value="{{ $tem_smp->keterangan }}" class="form-control @error('keterangan') is-invalid @enderror">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            @if(Auth::user()->role == 'Admin' && $tem_smp->status == 'Pending')
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('TemSmp.index') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
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
    function sekolah_asal() {
        if (document.getElementById("sekolah_asal").value != document.getElementById("sekolah_asal_lama").value) {
            document.getElementById("sekolah_asal_cek").classList.add("text-red");
        }
    }

    function no_un() {
        if (document.getElementById("no_un").value != document.getElementById("no_un_lama").value) {
            document.getElementById("no_un_cek").classList.add("text-red");
        }
    }

    function no_skhun() {
        if (document.getElementById("no_skhun").value != document.getElementById("no_skhun_lama").value) {
            document.getElementById("no_skhun_cek").classList.add("text-red");
        }
    }

    function no_ijasah() {
        if (document.getElementById("no_ijasah").value != document.getElementById("no_ijasah_lama").value) {
            document.getElementById("no_ijasah_cek").classList.add("text-red");
        }
    }
    const windowOnload = window.onload = () => {
        sekolah_asal();
        no_un();
        no_skhun();
        no_ijasah();
    };
</script>
<script type="text/javascript">
    $("#AjuanData").addClass("active");
    $("#liAjuanData").addClass("menu-open");
    $("#TemSmp").addClass("active");
</script>
@endsection
