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
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Jarak Sekolah</th>
                        <th>Jumlah Saudara</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($priodik as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->kelas->nama_kelas }}</td>
                        <td>{{ $data->tinggi_badan }}</td>
                        <td>{{ $data->berat_badan }}</td>
                        <td>{{ $data->jarak_sekolah }}</td>
                        <td>{{ $data->jumlah_saudara }}</td>
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
    $("#PriodikGuru").addClass("active");
</script>
@endsection