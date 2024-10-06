@extends('template_backend.home')
@section('heading', 'Perbaiki Data Priodik')
@section('page')
<li class="breadcrumb-item active"><a href="{{ route('priodik.index') }}">Data Priodik</a></li>
<li class="breadcrumb-item active">Perbaiki Data Priodik</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Perbaiki ata Priodik</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('priodik.updateSiswa') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row required">
                    <input type="text" id="id" name="id" value="{{ Auth::user()->id }}" class="form-control d-none" readonly>

                    <div class="col-md-12">
                      <label for="kelas">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="text" id="tinggi_badan" name="tinggi_badan" value="{{ Auth::user()->tem_priodik(Auth::user()->id)->tinggi_badan }}" class="form-control @error('tinggi_badan') is-invalid @enderror">
			<div class="input-group-prepend">
          		    <div class="input-group-text">cm</div>
        		</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="kelas">Berat Badan</label>
                        <div class="input-group">
                            <input type="text" id="berat_badan" name="berat_badan" value="{{ Auth::user()->tem_priodik(Auth::user()->id)->berat_badan }}" class="form-control @error('berat_badan') is-invalid @enderror">
          		 <div class="input-group-prepend">
          		    <div class="input-group-text">kg</div>
        		</div>
             		</div>
                    </div>
                    <div class="col-md-12">
                      <label for="kelas">Jarak Sekolah</label>
                        <div class="input-group">
                            <input type="text" id="jarak_sekolah" name="jarak_sekolah" value="{{ Auth::user()->tem_priodik(Auth::user()->id)->jarak_sekolah }}" class="form-control @error('jarak_sekolah') is-invalid @enderror">
                   	<div class="input-group-prepend">
          		    <div class="input-group-text">Meter</div>
        		</div>
     			</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kelas">Jumlah Saudara</label>
                            <input type="text" id="jumlah_saudara" name="jumlah_saudara" value="{{ Auth::user()->tem_priodik(Auth::user()->id)->jumlah_saudara }}" class="form-control @error('jumlah_saudara') is-invalid @enderror">
                        </div>
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
                    <a href="{{ route('priodik.siswa') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;

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
    $("#PriodikSiswa").addClass("active");
</script>
@endsection
