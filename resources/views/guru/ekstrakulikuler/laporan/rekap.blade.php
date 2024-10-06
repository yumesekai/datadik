@extends('template_backend.home')
@section('heading', 'Rekap Laporan Ekstra')
@section('page')
<li class="breadcrumb-item active">Rekap Laporan Ekstra</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        @empty($ekskul->all(0))
        <a type="button" href="{{ route('LaporanEkskul.generateBulan') }}" class="btn btn-primary text-white"><i class="nav-icon fas fa-save"></i> &nbsp; Generate Bulan</a>
        @endempty
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Bulan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekskul as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->bulan->format('F Y')}}</td>
                        <td>
                            <a class="btn btn-info btn-sm text-white" role="button" href="{{ route('LaporanEkskul.cetakRekap', Crypt::encrypt($data->id)) }}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-print fa-sm"></i>&nbsp;Cetak Rekap</a>
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
<script type="text/javascript">
    $("#PembinaEkskul").addClass("active");
    $("#liPembinaEkskul").addClass("menu-open");
    $("#rekapBulanan").addClass("active");
</script>
@endsection