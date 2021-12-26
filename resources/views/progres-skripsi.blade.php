@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Progres Skripsi</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr align="center">
          <th>Logbook</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Surat Tugas</td>
            <td align="center">
              <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Bab 1</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Bab 2</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Bab 3</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Seminar Proposal</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Bab 4</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Bab 5</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        <tr>
            <td>Sidang Skripsi</td>
            <td align="center">
                <button type="submit" class="btn btn-block btn-primary btn-sm" style="width: 50%">Success</button>
            </td>
        </tr>
        </tbody>
        <tfoot>
          <tr align="center">
            <th>Logbook</th>
            <th>Status</th>
          </tr>>
        </tfoot>
      </table>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
</script>
@endpush
