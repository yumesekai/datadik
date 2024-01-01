@extends('template_backend.home')
@section('heading','Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active">Data Ekstrakulikuler</li>
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
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Piliham 1</th>
                        <th>pilihan 2</th>
                        <th>pilihan 3</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstra as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->kelas->nama_kelas }}</td>
                        <td>{{ $data->pilihan_1 }}</td>
                        <td>{{ $data->pilihan_2 }}</td>
                        <td>{{ $data->pilihan_3 }}</td>
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
    $("#DataGuru").addClass("active");
    $("#liDataGuru").addClass("menu-open");
    $("#EkstraGuru").addClass("active");
</script>
@endsection