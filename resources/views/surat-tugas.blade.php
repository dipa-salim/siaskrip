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


    <div class="tab-pane {{ request()->is('surat-tugas') ? 'active' : null  }}" id="{{ url('surat-tugas') }}" role="tabpanel">

        <!-- Main content -->

    <div class=" container-fluid">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Surat Tugas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('SuratTugas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
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
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        </div>
        </section>
    </div>
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
