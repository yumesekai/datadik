@extends('template_backend.home')
@section('heading','Data List Ekstra')
@section('page')
<li class="breadcrumb-item active">Data List Ekstra</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ekstrakulikuler</th>
                        <th>Jenis Ekstrakulikuler</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstra as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_ekstra }}</td>
                        <td>{{ $data->jenis_ekstra }}</td>
                        <td><a href="{{ route('DataEkstrakulikuler.showDataEkstra', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm mt-2"><i class="far fa-eye"></i> &nbsp; Lihat Data</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@endsection
@section('script')
<script>
    $("#PembinaEkstra").addClass("active");
</script>
@endsection