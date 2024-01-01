@extends('template_backend.home')
@section('heading','Data Pribadi')
@section('page')
<li class="breadcrumb-item active">Data Pribadi</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        @if(Auth::user()->role == 'Admin' )
        <div class="card-header">
            <a href="{{ route('pribadi.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data</a>
        </div>
        @endif
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
                        <th>Berkas</th>
                        <th>Aksi</th>
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
                        <td>
                            @if ($data->user->berkas_beasiswa == '' || $data->user->berkas_beasiswa == 'null.png')
                            <a><b>Beasiswa</a>
                            @else
                            <a href="{{ asset($data->user->berkas_beasiswa) }}" target="_blank" rel="noopener noreferrer">
                                Beasiswa</a>
                            @endif
                            <br>

                            @if ($data->user->berkas_kk == '')
                            <a><b>Kartu Keluarga</a>
                            @else
                            <a href="{{ asset($data->user->berkas_kk) }}" target="_blank" rel="noopener noreferrer">
                                Kartu Keluarga</a>
                            @endif
                            <br>

                            @if ($data->user->berkas_ijasah == '')
                            <a><b>Ijasah</a>
                            @else
                            <a href="{{ asset($data->user->berkas_ijasah) }}" target="_blank" rel="noopener noreferrer">
                                Ijasah</a>
                            @endif

                        </td>
                        <td>
                            @if(Auth::user()->role == 'Admin' )
                            <form action="{{ route('pribadi.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('pribadi.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                <button onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                            </form>
                            @else
                            <a href="{{ route('pribadi.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm mt-2"><i class="nav-icon fas fa-eye"></i> &nbsp; Detail Data</a>
                            @endif
                        </td>
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
    $("#DataSiswa").addClass("active");
    $("#liDataSiswa").addClass("menu-open");
    $("#pribadi").addClass("active");
</script>
@endsection