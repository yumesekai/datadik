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
                <p>Data Pribadi Terverifikasi</p>
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
                <p>Data Orang tua terverifikasi</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-pen nav-icon"></i>
            </div>
            
        </div>
    </div>

   <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Data Ekstra Siswa Berdasarkan pilihan</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i>
                        </span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="barChartEkstra" height="200"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="fa fa-circle" style="color: #0AA1DD;"></i> Pending</li>
                                <li><i class="fa fa-circle" style="color: #6CC4A1;"></i> Disetujui</li>
                                <li><i class="fa fa-circle" style="color: #990000;"></i> Ditolak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

@endsection
@section('script')
    <script type="text/javascript">    
$(document).ready(function () {
            'use strict'

            var barChartCanvasEkstra = $('#barChartEkstra').get(0).getContext('2d')
            var barDataEkstra        = {
                labels: [
                    'Pilihan 1', 
                    'Pilihan 2',
                    'Pilihan 3',
                ],
                datasets: [
                    {
                    data: [{{ $totalUser }}, {{ $pil2 }},  {{ $pil3 }}],
                    backgroundColor : ['#0AA1DD', '#6CC4A1','#990000'],
                    }
                ]
            }
            var barOptions     = {
                legend: {
                    display: false
                }
            }
            var barChart = new Chart(barChartCanvasEkstra, {
                type: 'bar',
                data: barDataEkstra,
                options: barOptions      
            })
	})

        $("#HomeGuru").addClass("active");
    </script>
@endsection
