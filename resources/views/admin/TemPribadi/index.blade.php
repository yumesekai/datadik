@extends('template_backend.home')
@section('heading','Ajuan Perubahan Data Pribadi')
@section('page')
<li class="breadcrumb-item active">Pengajuan Data Pribadi</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title"><b>Data Pending</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example4" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pending as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">
                            <i class="nav-icon fas fa-clock fa-sm"></i> &nbsp;{{$data->created_at}}
                            </button>
                        </td>
                        <td>{{ $data->pribadi->user->email }}</td>
                        <td>{{ $data->pribadi->user->name }}</td>
                        <td>{{ $data->pribadi->user->kelas->nama_kelas }}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" style="font-size: 10px;">
                            <i class="nav-icon fas fa-info fa-xs"></i> &nbsp;Pending
                            </button>
                        </td>
                        <td>
                            <a href="{{ route('TemPribadi.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Detail</a>
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
<br>
<br>

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title"><b>Data Disetujui/Ditolak</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example3" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Update</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approved as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">
                            <i class="nav-icon fas fa-clock fa-sm"></i> &nbsp;{{$data->updated_at}}
                            </button>
                        </td>
                        <td>{{ $data->pribadi->user->email }}</td>
                        <td>{{ $data->pribadi->user->name }}</td>
                        <td>{{ $data->pribadi->user->kelas->nama_kelas }}</td>
                        <td>
                            @if($data->status == 'Setujui')
                            <button type="button" class="btn btn-success btn-sm" style="font-size: 10px;">
                            <i class="nav-icon fas fa-check fa-xs"></i> &nbsp;Disetujui
                            </button>
                            @else
                            <button type="button" class="btn btn-danger btn-sm" style="font-size: 10px;">
                            <i class="nav-icon fas fa-x fa-xs"></i> &nbsp;Ditolak
                            </button>
                            @endif
                        </td>
                         <td>{{ $data->keterangan }}</td>
                        <td>
                            <a href="{{ route('TemPribadi.edit', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Detail</a>
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
    $("#AjuanData").addClass("active");
    $("#liAjuanData").addClass("menu-open");
    $("#TemPribadi").addClass("active");
</script>
@endsection