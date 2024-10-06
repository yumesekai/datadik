@extends('template_backend.home')
@section('heading','Data SMP')
@section('page')
<li class="breadcrumb-item active">Data SMP</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        @if(Auth::user()->role == 'Admin' )
        <div class="card-header">
            <a href="{{ route('smp.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data</a>
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
                        <th>Sekolah Asal</th>
                        <th>No Skhun</th>
                        <th>Status</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($smp as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->kelas->nama_kelas }}</td>
                        <td>{{ $data->sekolah_asal }}</td>
                        <td>{{ $data->no_skhun }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            @if ($data->user->berkas_ijasah == '')
                            <a class="btn btn-dark btn-sm btn-block disabled text-white" role="button" aria-disabled="false">Ijasah</a>
                            @else
                            <a class="btn btn-dark btn-sm btn-block text-white" role="button" href="{{ asset($data->user->berkas_ijasah) }}" target="_blank" rel="noopener noreferrer">
                                Ijasah</a>
                            @endif

                        </td>
                        <td>
                            @if(Auth::user()->role == 'Admin' )
                            <form action="{{ route('smp.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('smp.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm btn-block"><i class="nav-icon fas fa-edit"></i>&nbsp;Edit</a>
                                <button onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" class="btn btn-danger btn-sm btn-block"><i class="nav-icon fas fa-trash-alt"></i>&nbsp; Hapus</button>
                            </form>
                            @else
                            <a href="{{ route('smp.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm mt-2"><i class="nav-icon fas fa-eye"></i> &nbsp; Detail Data</a>
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
    $("#smp").addClass("active");
</script>
@endsection
