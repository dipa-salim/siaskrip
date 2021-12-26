@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Hasil Pengajuan Berkas</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Pemberitahuan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="card-title col">
            <h5>Mahasiswa dapat melakukan download berkas yang diajukan dibawah ini</h5><br>
        </div>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Berkas yang diajukan</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @if ($data_surat)
            <tr>
                <td>Surat Tugas</td>
                <td align="center"><a href="{{ asset($data_surat->url_surat_tugas) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($data_perpanjangan)
            <tr>
                <td>Surat Tugas Perpanjangan</td>
                <td align="center"><a href="{{ asset($data_perpanjangan->url_surat_tugas) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($jadwal_sempro)
            <tr>
                <td>Jadwal Sidang Sempro</td>
                <td align="center"><a href="{{ asset($jadwal_sempro->url_jadwal) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($surat_skripsi)
            <tr>
                <td>Surat Tugas Skripsi</td>
                <td align="center"><a href="{{ asset($surat_skripsi->url_surat_skripsi) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($jadwal_skripsi)
            <tr>
                <td>Jadwal Sidang Skripsi</td>
                <td align="center"><a href="{{ asset($jadwal_skripsi->url_jadwal) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($lembar_dosen)
            <tr>
                <td>Lembar Persetujuan Dosen Pembimbing</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_surat_dosen_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($setuju_sempro)
            <tr>
                <td>Lembar Persetujuan Dosen Pembimbing (ditanda-tangani)</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_lembar_sempro_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            <tr>
                <td>Lembar Kegiatan Mahasiswa (ditanda-tangani)</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_logbook_sempro_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($rvs_sempro)
            <tr>
                <td>Lembar Persetujuan Dosen Pembimbing (ditanda-tangani)</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_lembar_sempro_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($setuju_skripsi)
            <tr>
                <td>Lembar Persetujuan Dosen Pembimbing (ditanda-tangani)</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_lembar_skripsi_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            <tr>
                <td>Lembar Kegiatan Mahasiswa (ditanda-tangani)</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_logbook_skripsi_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
            @if ($rvs_skripsi)
            <tr>
                <td>Lembar Persetujuan Dosen Pembimbing (ditanda-tangani)</td>
                <td align="center"><a href="{{ asset($lembar_dosen->url_lembar_skripsi_ttd) }}" target="_blank" class="btn btn-info btn-block btn-sm" style="width: 50%">Download</a></td>
            </tr>
            @endif
        </tbody>
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
//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     // $('#example2').DataTable({
//     //   "paging": true,
//     //   "lengthChange": false,
//     //   "searching": false,
//     //   "ordering": true,
//     //   "info": true,
//     //   "autoWidth": false,
//     //   "responsive": true,
//     // });
//   });
</script>
@endpush
