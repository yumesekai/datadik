@extends('template_backend.home')
@section('heading','Laporan Ekstrakurikuler')
@section('page')
<li class="breadcrumb-item active">Laporan Ekstrakurikuler</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('LaporanEkskul.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; Buat Laporan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ekskul</th>
                        <th>Nama Pembina</th>
                        <th>Bulan</th>
                        <th>Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::user()->role == 'Admin')
                    @foreach ($ekskul_full as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_ekskul }}</td>
                        <td>{{ $data->pembina_ekskul }}</td>
                        <td>{{ $data->tgl_pelaksanaan_m1->format('F Y')}}</td>
                        <td>
                        <form action="{{ route('LaporanEkskul.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('LaporanEkskul.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit fa-sm"></i>&nbsp;Ubah</a>
                            <a class="btn btn-info btn-sm text-white" role="button" href="{{ route('LaporanEkskul.cetakLaporan', Crypt::encrypt($data->id)) }}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-print fa-sm"></i>&nbsp;Cetak</a>
                            <button onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" class="btn btn-danger btn-sm mt-1"><i class="nav-icon fas fa-trash-alt fa-sm"></i> &nbsp; Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    @foreach ($ekskul as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_ekskul }}</td>
                        <td>{{ $data->pembina_ekskul }}</td>
                        <td>{{ $data->tgl_pelaksanaan_m1->format('F Y')}}</td>
                        <td>
                        <form action="{{ route('LaporanEkskul.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('LaporanEkskul.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit fa-sm"></i>&nbsp;Ubah</a>
                            <a class="btn btn-info btn-sm text-white" role="button" href="{{ route('LaporanEkskul.cetakLaporan', Crypt::encrypt($data->id)) }}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-print fa-sm"></i>&nbsp;Cetak</a>
                            <button onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" class="btn btn-danger btn-sm mt-1"><i class="nav-icon fas fa-trash-alt fa-sm"></i> &nbsp; Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
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
    $("#PembinaEkskul").addClass("active");
    $("#liPembinaEkskul").addClass("menu-open");
    $("#LaporanEkskul").addClass("active");
</script>
@endsection