@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Data Mahasiswa</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-mahasiswa">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Mahasiswa
                </button> --}}
                Data Mahasiswa PTIK
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Angkatan</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_mahasiswa as $key => $data)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->angkatan }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->no_hp }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

{{-- <!-- Extra large modal -->
<div class="modal fade bd-example-modal-md tambah-mahasiswa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Mahasiswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="mahasiswa" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="nim">Nomor Induk Mahasiswa</label>
                      <input type="text" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                      <label for="nama_mahasiswa">Nama Siswa</label>
                      <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control @error('nama_mahasiswa') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" id="angkatan" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror">
                </div>
                  <div class="form-group">
                      <label for="jk">Jenis Kelamin</label>
                      <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                          <option value="">-- Pilih Jenis Kelamin --</option>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="telp">Nomor Telpon/HP</label>
                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                </div>
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
</div> --}}
  @endsection
  @push('custom-script')
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
