@extends('template_backend.home')
@section('heading','Data Pribadi')
@section('page')
<li class="breadcrumb-item active">Data Pribadi</li>
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
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Beasiwa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pribadi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->kelas->nama_kelas }}</td>
                        <td>{{ $data->beasiswa }}</td>
                        <td>{{ $data->status }}</td>
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
    $("#PribadiGuru").addClass("active");
</script>
@endsection