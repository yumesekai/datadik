@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="col-lg-4 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $totalUser }}</h3>
                <p>Total Siswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-id-card nav-icon"></i>
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
            <div class="inner" style="color: #FFFFFF;">
                <h3>{{ $totalPribadi }}</h3>
                <p>Total Verifikasi Data Pribadi</p>
            </div>
            <div class="icon">
                <i class="fas fa-user nav-icon"></i>
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalOrangtua }}</h3>
                <p>Total Verifikasi Data Orang tua</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-pen nav-icon"></i>
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalSMP }}</h3>
                <p>Total Verifikasi Data SMP</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-pen nav-icon"></i>
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalPriodik }}</h3>
                <p>Total Verifikasi Data Priodik</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-pen nav-icon"></i>
            </div>
            
        </div>
    </div>
    

@endsection
@section('script')
    <script type="text/javascript">    
        $("#HomeGuru").addClass("active");
    </script>
@endsection