@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@section('page')
  <li class="breadcrumb-item active">Logbook Skripsi</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Logbook</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('Logbook.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="myDate">Tanggal</label>
          <input name="tanggal" type="date" class="form-control" id="myDate" placeholder="Input tanggal bimbingan">
        </div>
        <div class="form-group">
            <label class="control-label">Materi Bahasan<span class="text-danger"></span></label>
            <textarea name="materi" rows="2" class="form-control" required></textarea>
            <small class="form-control-feedback text-danger"></small>
        </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  <!-- /.card -->
@endsection
@push('custom-script')
<!-- Page specific script -->
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endpush
