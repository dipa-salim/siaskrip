@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Data User</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-user">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data User
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Level User</th>
                    <th>Jumlah User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $role => $data)
                <tr>
                    <td>{{ $role }}</td>
                    <td>{{ $data->count() }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md tambah-user" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('User.store') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input name="nama" value="{{ old('nama') }}" type="text" class="form-control" rows='2' id="nama" placeholder="Nama Lengkap">
                      </div>
                  <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" placeholder="{{ __('Alamat Email') }}" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                  </div>
                  <div class="form-group" id="noId">
                    <label for="role">Level User</label>
                    <select id="role" type="text" class="form-control" name="role" value="{{ old('role') }}" autocomplete="role">
                      <option value="">-- Select {{ __('Level User') }} --</option>
                      {{-- @foreach ($user1 as $data)
                      <option value="{{ $data->role }}">{{ $data->role }}</option>
                      @endforeach --}}
                      <option value="Admin">Admin</option>
                      <option value="Kaprodi">Kaprodi</option>
                    </select>
                  </div>
                  <div class="form-group" id="noId">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
              <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
  @push('custom-script')
    {{-- <script>
      $(document).ready(function(){
          $('#role').change(function(){
              var kel = $('#role option:selected').val();
              if(kel == "Mahasiswa") {
                $("#noId").html(`<label for="nomer">Nomer Induk Mahasiswa</label><input id="nomor" type="text" placeholder="No Induk Mahasiswa" class="form-control" name="nim" autocomplete="off">`);
              } else if(kel == "Admin") {
                $("#noId").html(`<label for="name">Username</label><input id="nomor" type="text" placeholder="Username" class="form-control" name="name" autocomplete="off">`);
              } else {
                $("#noId").html("")
              }
          });
      });

      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataUser").addClass("active");
    </script> --}}
  @endpush
