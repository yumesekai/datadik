@extends('template_backend.home')
@section('heading','Data Ekstrakulikuler')
@section('page')
<li class="breadcrumb-item active">Data Ekstrakulikuler</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        @if(Auth::user()->role == 'Admin' )
        <div class="card-header">
        <form action="{{ route('ekstrakulikuler.generateByUser') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data</a>
            <button name="submit" class="btn-sm btn-warning"><i class="fas fa-recycle"></i> &nbsp; Generate</button>
            </form>
        </div>
        @endif
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
                        @if(Auth::user()->role == 'Admin' )
                        <th>Aksi</th>
                        @endif
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
                        @if(Auth::user()->role == 'Admin' )
                        <td>
                            
                            <form action="{{ route('ekstrakulikuler.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('ekstrakulikuler.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                <button onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                            </form>
                            
                        </td>
                        @endif
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
    $("#DataEkstra").addClass("active");
</script>
@endsection