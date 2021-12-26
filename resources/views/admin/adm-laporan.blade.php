@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Laporan Data Skripsi</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" >
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Download Data Skripsi
                </button> --}}
                Laporan Progres Skripsi Mahasiswa PTIK
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="laporan" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Judul Skripsi</th>
                    <th>Surat Tugas</th>
                    <th>Seminar Proposal</th>
                    <th>Hasil Seminar Proposal</th>
                    <th>Skripsi</th>
                    <th>Hasil Seminar Skripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_laporan as $key => $data)
                <tr>
                    <th>{{ $key +1 }}</th>
                    <th>{{ $data->nim }}</th>
                    <th>{{ $data->nama }}</th>
                    <th>{{ $data->status_surat_tugas }}</th>
                    <th>{{ $data->status_sempro }}</th>
                    <th>{{ $data->status_surat_skripsi }}</th>
                    <th>{{ $data->status_skripsi }}</th>
                    <th>{{ $data->status_hasil_skripsi }}</th>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
    </div>
</div>
  @endsection
  @push('custom-script')
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
          $("#laporan").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel"]
          }).buttons().container().appendTo('#laporan_wrapper .col-md-6:eq(0)');
        });
      </script>
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
