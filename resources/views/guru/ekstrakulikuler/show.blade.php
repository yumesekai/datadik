@extends('template_backend.home')
@section('heading', 'Data Siswa Ekstra'.' '.$ekstra)
@section('page')
<li class="breadcrumb-item active">Ekstra {{$ekstra}}</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('DataEkstrakulikuler.export_AbsenEkstra', $ekstra) }}" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Unduh Absen</a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
			            <th>Nomer Handphone</th>
                        <th>Update Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listSiswa as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
			            <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-between">
                    <a href="{{ route('DataEkstrakulikuler.pembinaEkstra') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                </div>
            </div>
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@endsection
@section('script')
<script>
    $("#PembinaEkskul").addClass("active");
    $("#liPembinaEkskul").addClass("menu-open");
    $("#PembinaEkstra").addClass("active");
</script>
@endsection
