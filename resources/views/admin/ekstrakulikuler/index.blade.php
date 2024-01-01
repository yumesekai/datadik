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
            <a href="{{ route('DataEkstrakulikuler.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data</a>
            <a href="{{ route('DataEkstrakulikuler.export_dataEkstra') }}" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Unduh Data Ekstra</a>
      </h3>
        </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ekstrakulikuler</th>
                        <th>Pembina</th>
                        <th>Jenis Ekstrakulikuler</th>
                        @if(Auth::user()->role == 'Admin' )
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstra as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_ekstra }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->jenis_ekstra }}</td>
                        @if(Auth::user()->role == 'Admin' )
                        <td>
                            
                            <form action="{{ route('DataEkstrakulikuler.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('DataEkstrakulikuler.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
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
    $("#Ekstrakulikuler").addClass("active");
</script>
@endsection