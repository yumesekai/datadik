@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
<li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
<div class="col-md-6">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="color: white;">
        Pengajuan Perbaikan Data Pribadi
      </h3>
    </div>
    <div class="card-body table-responsive">
      <table id="example4" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pribadi as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">
              <i class="nav-icon fas fa-clock fa-xs"></i> &nbsp;{{$data->created_at->format('d/m/Y')}}
              </button>
            </td>
            <td>
              @if($data->status == 'Pending')
              <button type="button" class="btn btn-info btn-sm" style="font-size: 10px;">
                <i class="nav-icon fas fa-info fa-xs"></i> &nbsp;Pending
              </button>
              @elseif($data->status == 'Setujui')
              <button type="button" class="btn btn-success btn-sm" style="font-size: 9px;">
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
              @if($data->status == 'Pending')
              <a href="{{ route('pribadi.editTemSiswa') }}" class="text-dark btn btn-warning btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-pencil"></i> &nbsp; Edit Pengajuan</a>
              @elseif($data->status == null || $data->status == 'Setujui' || $data->status == 'Tolak')
              <a href="{{ route('home.editPribadiDis', Crypt::encrypt($data->id)) }}" class="btn btn-secondary btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-eye"></i> &nbsp;Lihat Data</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">
        Pengajuan Perbaikan Data Orang Tua
      </h3>
    </div>
    <div class="card-body table-responsive">
      <table id="example3" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orangtua as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">
              <i class="nav-icon fas fa-clock fa-xs"></i> &nbsp;{{$data->created_at->format('d/m/Y')}}
              </button>
            </td>
            <td>
            @if($data->status == 'Pending')
              <button type="button" class="btn btn-info btn-sm" style="font-size: 10px;">
                <i class="nav-icon fas fa-info fa-xs"></i> &nbsp;Pending
              </button>
              @elseif($data->status == 'Setujui')
              <button type="button" class="btn btn-success btn-sm" style="font-size: 9px;">
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
              @if($data->status == 'Pending')
              <a href="{{ route('orangtua.editTemSiswa') }}" class="text-dark btn btn-warning btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-pencil"></i> &nbsp; Edit Pengajuan</a>
              @elseif($data->status == null || $data->status == 'Setujui' || $data->status == 'Tolak')
              <a href="{{ route('home.editOrangtuaDis', Crypt::encrypt($data->id)) }}" class="btn btn-secondary btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-eye"></i> &nbsp;Lihat Data</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


<div class="col-md-6">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">
        Pengajuan Perbaikan Data SMP
      </h3>
    </div>
    <div class="card-body table-responsive">
      <table id="example5" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($smp as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">
              <i class="nav-icon fas fa-clock fa-xs"></i> &nbsp;{{$data->created_at->format('d/m/Y')}}
              </button>
            </td>
            <td>
            @if($data->status == 'Pending')
              <button type="button" class="btn btn-info btn-sm" style="font-size: 10px;">
                <i class="nav-icon fas fa-info fa-xs"></i> &nbsp;Pending
              </button>
              @elseif($data->status == 'Setujui')
              <button type="button" class="btn btn-success btn-sm" style="font-size: 9px;">
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
              @if($data->status == 'Pending')
              <a href="{{ route('smp.editTemSiswa') }}" class="text-dark btn btn-warning btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-pencil"></i> &nbsp; Edit Pengajuan</a>
              @elseif($data->status == null || $data->status == 'Setujui' || $data->status == 'Tolak')
              <a href="{{ route('home.editSmpDis', Crypt::encrypt($data->id)) }}" class="btn btn-secondary btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-eye"></i> &nbsp;Lihat Data</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">
        Pengajuan Perbaikan Data Priodik
      </h3>
    </div>
    <div class="card-body table-responsive">
      <table id="example6" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($priodik as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">
              <i class="nav-icon fas fa-clock fa-xs"></i> &nbsp;{{$data->created_at->format('d/m/Y')}}
              </button>
            </td>
            <td>
            @if($data->status == 'Pending')
              <button type="button" class="btn btn-info btn-sm" style="font-size: 10px;">
                <i class="nav-icon fas fa-info fa-xs"></i> &nbsp;Pending
              </button>
              @elseif($data->status == 'Setujui')
              <button type="button" class="btn btn-success btn-sm" style="font-size: 9px;">
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
              @if($data->status == 'Pending')
              <a href="{{ route('priodik.editTemSiswa') }}" class="text-dark btn btn-warning btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-pencil"></i> &nbsp; Edit Pengajuan</a>
              @elseif($data->status == null || $data->status == 'Setujui' || $data->status == 'Tolak')
              <a href="{{ route('home.editPriodikDis', Crypt::encrypt($data->id)) }}" class="btn btn-secondary btn-sm" style="font-size: 12px;"><i class="nav-icon fas fa-eye"></i>&nbsp; Lihat Data</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script>
  $("#Dashboard").addClass("active");
  $("#liDashboard").addClass("menu-open");
  $("#Home").addClass("active");
</script>
@endsection