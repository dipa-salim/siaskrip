@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@section('page')
  <li class="breadcrumb-item active">Surat Tugas</li>
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link {{ request()->is('surat-tugas') ? 'active' : null  }}" href="{{ url('surat-tugas') }}" role="tab">Daftar Baru</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ request()->is('surat-tugas/perpanjangan') ? 'active' : null  }}" href="{{ url('surat-tugas/perpanjangan') }}" role="tab">Perpanjangan</a>
    </li>
  </ul>
@endsection
@section('content')


    <div class="tab-pane {{ request()->is('surat-tugas/perpanjangan') ? 'active' : null  }}" id="{{ url('surat-tugas/perpanjangan') }}" role="tabpanel">

        <!-- Main content -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Surat Perpanjangan
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr align="center">
                            <th>Judul Skripsi</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ( $data_surat_perpanjang as $key => $data )
                        <tr>
                            <td>{{ $data->judul_skripsi }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td align="center">
                                <button class="btn btn-info btn-block btn-sm" data-toggle="modal" style="width: 50%" data-target="#perpanjang-{{ $key }}">
                                    <i class="nav-icon fas fa-search-plus">&nbsp; Perpanjang</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>

    </div>

    @foreach ($data_surat_perpanjang as $key => $data )
    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md" id="perpanjang-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Surat Tugas Perpanjangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('SuratTugas.storePerpanjang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputJudul">Judul Skripsi</label>
                            <input name="judul_skripsi" type="text" class="form-control" rows='2' id="exampleInputEmail1" placeholder="Masukkan Judul">
                          </div>
                          {{-- <div class="form-group">
                            <label for="exampleInputFile1">Surat Tugas Sebelumnya</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile1">
                                <label name="id_surat_sebelumnya" class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                            </div>
                          </div> --}}
                          <div class="form-group">
                              <label for="exampleInputFile1">Proposal Skripsi</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input name="url_bab1" type="file" class="custom-file-input" id="exampleInputFile1">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Kirim</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
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
@endpush
