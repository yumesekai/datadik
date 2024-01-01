@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="col-lg-4 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $user }}</h3>
                <p>Total User</p>
            </div>
            <div class="icon">
                <i class="fas fa-id-card nav-icon"></i>
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
            <div class="inner" style="color: #FFFFFF;">
                <h3>{{ $totalData }}</h3>
                <p>Total Data Pengajuan</p>
            </div>
            <div class="icon">
                <i class="fas fa-user nav-icon"></i>
            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalDataPending }}</h3>
                <p>Total Data Pending</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-pen nav-icon"></i>
            </div>
            
        </div>
    </div>
   
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Pengajuan Data Pribadi</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> {{ $penPribadi }}
                        </span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChartPribadi" height="200"></canvas>
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

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Pengajuan Data Orang Tua</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i>{{ $penOrangtua }}
                        </span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChartOrangtua" height="200"></canvas>
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

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Pengajuan Data SMP</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i>{{ $penSmp }}
                        </span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChartSmp" height="200"></canvas>
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

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Pengajuan Data Priodik</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i>{{ $penPriodik }}
                        </span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChartPriodik" height="200"></canvas>
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

            var pieChartCanvasPribadi = $('#pieChartPribadi').get(0).getContext('2d')
            var pieDataPribadi        = {
                labels: [
                    'Pending', 
                    'Disetujui',
                    'Ditolak',
                ],
                datasets: [
                    {
                    data: [{{ $penPribadi }}, {{ $setPribadi }},  {{ $tolPribadi }}],
                    backgroundColor : ['#0AA1DD', '#6CC4A1','#990000'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasPribadi, {
                type: 'doughnut',
                data: pieDataPribadi,
                options: pieOptions      
            })

            var pieChartCanvasOrangtua = $('#pieChartOrangtua').get(0).getContext('2d')
            var pieDataOrangtua        = {
                labels: [
                    'Pending', 
                    'Disetujui',
                    'Ditolak',
                ],
                datasets: [
                    {
                    data: [{{ $penOrangtua }}, {{ $setOrangtua }},  {{ $tolOrangtua }}],
                    backgroundColor : ['#0AA1DD', '#6CC4A1','#990000'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasOrangtua, {
                type: 'doughnut',
                data: pieDataOrangtua,
                options: pieOptions      
            })

            var pieChartCanvasSmp = $('#pieChartSmp').get(0).getContext('2d')
            var pieDataSmp        = {
                labels: [
                    'Pending', 
                    'Disetujui',
                    'Ditolak',
                ],
                datasets: [
                    {
                    data: [{{ $penSmp }}, {{ $setSmp }},  {{ $tolSmp }}],
                    backgroundColor : ['#0AA1DD', '#6CC4A1','#990000'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasSmp, {
                type: 'doughnut',
                data: pieDataSmp,
                options: pieOptions      
            })

            var pieChartCanvasPriodik = $('#pieChartPriodik').get(0).getContext('2d')
            var pieDataPriodik        = {
                labels: [
                    'Pending', 
                    'Disetujui',
                    'Ditolak',
                ],
                datasets: [
                    {
                    data: [{{ $penPriodik }}, {{ $setPriodik }},  {{ $tolPriodik }}],
                    backgroundColor : ['#0AA1DD', '#6CC4A1','#990000'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasPriodik, {
                type: 'doughnut',
                data: pieDataPriodik,
                options: pieOptions      
            })
        })

            
        $("#Dashboard").addClass("active");
    </script>
@endsection