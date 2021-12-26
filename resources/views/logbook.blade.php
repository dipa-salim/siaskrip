@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Logbook Bimbingan</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Logbook Bimbingan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{ url('/logbook/add-logbook') }}"><button class="btn btn-info btn-block"><i class="mdi mdi-plus"></i> Tambah</button></a><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <td>Pertemuan/Tanggal</td>
          <td>Materi Bahasan</td>
          <td>Opsi</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($data_logbook as $data)
        <tr>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->materi }}</td>
            <td><a href="{{ route('Logbook.destroy', ['id' => $data->id_logbook]) }}" class="btn btn-danger btn-block btn-sm" >Hapus</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
        <a class="cta" href="{{ url('cetak-logbook') }}" target="_blank"><button type="button" class="btn btn-primary btn-md" style="float: right">Download Berkas</button></a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
@push('custom-script')
<!-- DataTables  & Plugins -->
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
<!-- Page specific script -->
{{-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> --}}
@endpush
