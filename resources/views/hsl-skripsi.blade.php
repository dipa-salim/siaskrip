@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@section('page')
  <li class="breadcrumb-item active">Hasil Sidang Skripsi</li>
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link {{ request()->is('skripsi') ? 'active' : null  }}" href="{{ url('skripsi') }}" role="tab">Daftar Skripsi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ request()->is('skripsi/hasil-skripsi') ? 'active' : null  }}" href="{{ url('skripsi/hasil-skripsi') }}" role="tab">Hasil Skripsi</a>
    </li>
  </ul>
@endsection
@section('content')


    <div class="tab-pane {{ request()->is('skripsi/hasil-skripsi') ? 'active' : null  }}" id="{{ url('skripsi/hasil-skripsi') }}" role="tabpanel">

        <!-- Main content -->

    <div class=" container-fluid">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Hasil Sidang Skripsi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('Skripsi.storeRevisi') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputJudul">Judul Skripsi</label>
                    <input name="judul_skripsi" type="text" class="form-control" rows='2' id="exampleInputEmail1" placeholder="Masukkan Judul">
                  </div>
                <div class="form-group">
                    <label for="exampleInputJudul">Catatan Revisi</label>
                    <input name="catatan" class="form-control" rows='4' id="exampleInputEmail1" placeholder="....">
                  </div>
                <div class="form-group">
                  <label for="exampleInputFile1">Upload Hasil Revisi Terbaru</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="url_revisi" type="file" class="custom-file-input" id="exampleInputFile1">
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
