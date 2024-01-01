@extends('template_backend.home')
@section('heading', 'Import Data')
@section('page')
<li class="breadcrumb-item active">Import Data</li>
@endsection
@section('content')
<div class="col-md-4">
    <div class="card text-white bg-danger mb-3" >
        <div class="card-header">
            <h5>Hapus Semua Data</h5>
        </div>
        <div class="card-body">
            
            <form onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" method="post" action="{{ route('import.deleteAll') }}" enctype="multipart/form-data">
                @csrf
                @method('delete')
                
                <button type="submit" class="btn btn-outline-light">Hapus Semua</button>

            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3" >
        <div class="card-header">
            <h5>#1 Import Data Kelas
            <a href="{{ route('kelas.excelKelas') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_kelas') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card text-white bg-primary mb-3" >
        <div class="card-header">
            <h5>#2 Import User Guru
            <a href="{{ route('user.excelUser') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_user_guru') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3" >
        <div class="card-header">
            <h5>#3 Import User Siswa
            <a href="{{ route('user.excelUserSiswa') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_user_siswa') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3" >
        <div class="card-header">
            <h5>#4 Import Data Paribadi
            <a href="{{ route('pribadi.excelPribadi') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_pribadi') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-primary mb-3" >
        <div class="card-header">
            <h5>#5 Import Data Orang Tua
                <a href="{{ route('orangtua.excelOrangtua') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_orangtua') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-dark mb-3" >
        <div class="card-header">
            <h5>#6 Import Data SMP
            <a href="{{ route('smp.excelSmp') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_smp') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-primary mb-3" >
        <div class="card-header">
            <h5>#7 Import Data Priodik
            <a href="{{ route('priodik.excelPriodik') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_priodik') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card text-white bg-primary mb-3" >
        <div class="card-header">
            <h5>#8 Import Data Ekstrakulikuler
            <a href="{{ route('DataEkstrakulikuler.excelEkstra') }}" class="mx-md-2 btn-sm btn-success ">Format</a>
            </h5>
        </div>
        <div class="card-body">
            
            <form method="post" action="{{ route('import.import_ekstra') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Pilih File Excel</label>
                    <input type="file" name="file" required="required">
                </div>
                <button type="submit" class="btn btn-outline-light">Import</button>

            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("#import").addClass("active");

    function formDelete() {
        return confirm('Apakah Anda Yakin Menghapus Permanen Data?');
    }
</script>
@endsection