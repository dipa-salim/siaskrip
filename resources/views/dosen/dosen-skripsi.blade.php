@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Pengajuan Sidang Skripsi</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">

            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr align="center">
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Judul Skripsi</th>
                    <th>Dokumen Keperluan</th>
                    <th>Action</th>
                    {{-- <th>Input Laporan</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ( $data_dosen_skripsi as $key => $data )
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $data->mahasiswa()->first()->nim }}</td>
                    <td>{{ $data->mahasiswa()->first()->nama }}</td>
                    <td>{{ $data->judul_skripsi }}</td>
                    <td align="center">
                        <button class="btn btn-info btn-block btn-sm" data-toggle="modal" style="width: 50%" data-target="#details-{{ $key }}">
                            <i class="nav-icon fas fa-search-plus">&nbsp; Detail</i>
                        </button>
                    </td>
                    <td align="center">
                        @if ($data->status_skripsi == 'belum_approve')
                        <button class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#setujui-{{ $key }}" >Setujui</button>
                        @else
                        <a href="{{ route('MhsBimbingan.cancelSkripsi', ['id' => $data->id_mhs_bimbingan]) }}" class="btn btn-danger btn-block btn-sm" >Batal</a>
                        @endif
                    </td>
                    {{-- <td align="center">
                        <button class="btn btn-primary btn-block btn-sm" style="width: 50%">Lapor</button>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Modal Detail -->
@foreach ($data_dosen_skripsi as $key => $data )
    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md" id="details-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="col-lg">
                        <tr align="center">
                            <td>Lembar Pengesahan Dosen Pembimbing</td>
                            <td>Lembar Kegiatan Mahasiswa</td>
                        </tr>
                        <tr>
                        <th><iframe src="{{ asset($data->url_lembar_skripsi) }}" title="description" style="height: 350px;width:350px;"></iframe></th>
                        <th><iframe src="{{ asset($data->url_logbook_skripsi) }}" title="description" style="height: 350px;width:350px;"></iframe></th>
                        </tr>
                        <tr align="center">
                            <td>Materi Skripsi</td>
                        </tr>
                        <tr>
                            <th><iframe src="{{ asset($data->url_skripsi) }}" title="description" style="height: 350px;width:350px;"></iframe></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal Setujui -->

@foreach ($data_dosen_skripsi as $key => $data )

<form action="{{ route('MhsBimbingan.updateDosenSkripsi', ['id' => $data->id_mhs_bimbingan]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md" id="setujui-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kirim Persetujuan Skripsi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputFile1">Lembar Pengesahan Dosen Pembimbing (beri tanda-tangan)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="url_lembar_skripsi_ttd" value="{{ old('url_lembar_skripsi_ttd') }}" type="file" class="custom-file-input" id="exampleInputFile1">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile1">Lembar Kegiatan Bimbingan (beri tanda-tangan)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="url_logbook_skripsi_ttd" value="{{ old('url_logbook_skripsi_ttd') }}" type="file" class="custom-file-input" id="exampleInputFile1">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Kirim</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection
@push('custom-script')
<!-- Page specific script -->
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte') }}/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
    .custom-file-input ~ .custom-file-label::after {
    content: "Button Text";
}
</script>
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
