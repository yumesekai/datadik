@extends('template_backend.home')
@section('heading', 'Data User')
@section('page')
<li class="breadcrumb-item active">Data User</li>
@endsection
@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="getCreateUser()" data-target="#tambah-user">
          <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data User
        </button>
        <a href="{{ route('user.export_excel') }}" class="btn btn-success btn-sm my-3" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp; Unduh Laporan</a>
      </h3>
    </div>
    <div class="card-body table-responsive">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="admin-tab" data-toggle="tab" data-target="#admin" type="button" role="tab" aria-controls="home" aria-selected="true">Admin</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="guru-tab" data-toggle="tab" data-target="#guru" type="button" role="tab" aria-controls="profile" aria-selected="false">Guru</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="siswa-tab" data-toggle="tab" data-target="#siswa" type="button" role="tab" aria-controls="contact" aria-selected="false">Siswa</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- Admin User -->
        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
          <br>
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if ($user->count() > 0)
              @foreach ($adminKepsek as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-capitalize">{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->role }}</td>
                <td>
                  <form action="{{ route('user.destroy', $data->id) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" method="post">
                    @csrf
                    @method('delete')
                    <button id="btnDelete" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                  </form>
                  <button type="button" class="btn btn-success btn-sm show_confirm" onclick="getEditUser({{$data->id}})" data-toggle="modal" data-target="#tambah-user">
                    <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                  </button>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>

        <div class="tab-pane fade" id="guru" role="tabpanel" aria-labelledby="guru-tab">
          <br>
          <!-- Guru User -->
          <table id="example3" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>role</th>
                <th>kelas</th>
                <th>angkatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if ($user->count() > 0)
              @foreach ($guru as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-capitalize">{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->role }}</td>
                <td>{{ $data->kelas->nama_kelas }}</td>
                <td>{{ $data->kelas->angkatan }}</td>
                <td>
                  <form action="{{ route('user.destroy', $data->id) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" method="post">
                    @csrf
                    @method('delete')
                    <button id="btnDelete" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                  </form>
                  <button type="button" class="btn btn-success btn-sm show_confirm" onclick="getEditUser({{$data->id}})" data-toggle="modal" data-target="#tambah-user">
                    <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                  </button>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
          <br>
          <!-- Siswa User -->
          <table id="example4" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>role</th>
                <th>kelas</th>
                <th>angkatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if ($user->count() > 0)
              @foreach ($siswa as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-capitalize">{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->role }}</td>
                <td>{{ $data->kelas->nama_kelas }}</td>
                <td>{{ $data->kelas->angkatan }}</td>
                <td>
                  <form action="{{ route('user.destroy', $data->id) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Permanen Data?');" method="post">
                    @csrf
                    @method('delete')
                    <button id="btnDelete" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                  </form>
                  <button type="button" class="btn btn-success btn-sm show_confirm" onclick="getEditUser({{$data->id}})" data-toggle="modal" data-target="#tambah-user">
                    <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                  </button>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md tambah-user" id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="id" name="id">
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input id="name" type="text" placeholder="Masukan Nama Lengkap" class="form-control" name="name" value="">
              </div>
              <div class="form-group required">
                <label for="email">Username</label>
                <input id="email" type="text" placeholder="{{ __('Username') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="" autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group required">
                <label for="role">Level User</label>
                <select id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="" autocomplete="role">
                  <option value="">-- Select {{ __('Level User') }} --</option>
                  <option value="Admin" {{($data->role === 'Admin') ? 'Selected' : ''}}>Admin</option>
                  <option value="Guru" {{($data->role === 'Guru') ? 'Selected' : ''}}>Guru</option>
                  <option value="Siswa" {{($data->role === 'Siswa') ? 'Selected' : ''}}>Siswa</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group required">
                <label for="kelas_id">Kelas</label>
                <select id="kelas_id" type="text" class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" value="" autocomplete="role">
                  @foreach($kelas as $datakelas)
                  <option value="{{ $datakelas->id }}" {{ old('kelas_id') == $datakelas->id || $data->kelas_id === $datakelas->id ? 'Selected' : '' }}>{{ $datakelas->nama_kelas }}</option>
                  @endforeach
                </select>
                @error('kelas_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group required">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $("#ManageUser").addClass("active");

  function getCreateUser() {
    $("#judul").text('Tambah Data User');
    $('#id').val('');
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#role').val('');
    $('#kelas_id').val('');
  }

  function getEditUser(id) {
    var parent = id;
    $.ajax({
      type: "GET",
      data: "id=" + parent,
      dataType: "JSON",
      url: "{{ url('/user/edit/json') }}",
      success: function(result) {
        // console.log(result);
        if (result) {
          $.each(result, function(index, val) {
            $("#judul").text('Edit Data User ' + val.name);
            $('#id').val(val.id);
            $('#name').val(val.name);
            $('#email').val(val.email);
            $("#role").val(val.role);
            $('#kelas_id').val(val.kelas_id);
          });
        }
      },
      error: function() {
        toastr.error("Errors 404!");
      },
      complete: function() {}
    });
  }

  function formDelete() {
    return confirm('Apakah Anda Yakin Menghapus Permanen Data?');
  }
</script>
@endsection