@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Data Dosen PTIK</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-mahasiswa">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Dosen
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Jumlah Bimbingan</th>
                    {{-- <th>Aksi</th> --}}
                    {{-- <th>Surat Tugas</th>
                    <th>Bab 1</th>
                    <th>Bab 2</th>
                    <th>Bab 3</th>
                    <th>Seminar Proposal</th>
                    <th>Bab 4</th>
                    <th>Bab 5</th>
                    <th>Sidang Skripsi</th> --}}
                </tr>
            </thead>
            <tbody>
            @foreach ($data_dosen as $key=>$data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jumlah_mahasiswa }}</td>
                {{-- <td><a href="{{ route('Dosen.destroy', ['id' => $data->dosen()->id_dosen]) }}" class="btn btn-danger btn-block btn-sm" >Hapus</a></td> --}}
                {{-- <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> --}}
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md tambah-mahasiswa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Dosen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('Dosen.store') }}" method="POST" enctype="multipart/form-data">
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
                      <option value="Dosen">Dosen</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                  </div>
                    <div class="form-group">
                        <label for="nip">Nomor Induk</label>
                        <input type="text" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="namaDosen">Nama Dosen</label>
                        <input type="text" id="namaDosen" name="namaDosen" class="form-control @error('nama') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="select2bs4 form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="no_hp">Nomor Telpon/HP</label>
                      <input type="text" id="no_hp" name="no_hp" onkeypress="return inputAngka(event)" class="form-control @error('no_hp') is-invalid @enderror">
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
  </div>
</div>
  @endsection
  @push('custom-script')
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
