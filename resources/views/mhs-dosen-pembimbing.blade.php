@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Pengajuan Dosen Pembimbing</li>
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
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Aktifitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_dosen as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama }}</td>
                    <td align="center">
                        <button class="btn btn-success btn-block btn-sm" id="pilihDosen" data-toggle="modal" data-id="{{ $data->id_dosen }}" data-target="#setujui-{{ $key }}" >Pilih Dosen</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Modal Setujui -->

@foreach ($data_dosen as $key => $data)
<form action="{{ route('MhsBimbingan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md" id="setujui-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kirim Pengajuan Dosen Pembimbing</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_dosen" value="{{ $data->id_dosen }}">
                        <label for="exampleInputJudul">Judul Skripsi</label>
                        <input name="judul_skripsi" value="{{ old('judul_skripsi') }}" type="text" class="form-control" rows='2' id="exampleInputEmail1" placeholder="Masukkan Judul" old>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile1">Bab 1</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="url_bab1" value="{{ old('url_bab1') }}" type="file" class="custom-file-input" id="exampleInputFile1">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputFile1">Surat Pernyataan Dosen Pembimbing</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input name="url_surat_dosen" value="{{ old('url_surat_dosen') }}" type="file" class="custom-file-input" id="exampleInputFile1">
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

    // $('#pilihDosen').on('click', function(){
    //     let target=$(this).attr('data-target')
    //     $(target).modal('show')
    // });
</script>
{{-- <script>
    .custom-file-input ~ .custom-file-label::after {
    content: "Button Text";
}
</script> --}}
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
