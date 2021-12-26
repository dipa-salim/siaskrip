@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Pengajuan Hasil Sidang Skripsi</li>
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
                    <th>Dosen Pembimbing 1</th>
                    <th>Dosen Pembimbing 2</th>
                    <th>Dokumen Keperluan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_selesai_skripsi as $key => $data )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->mahasiswa()->first()->nim }}</td>
                    <td>{{ $data->mahasiswa()->first()->nama }}</td>
                    <td>{{ $data->judul_skripsi }}</td>
                    <td>{{ is_numeric($data->dosen_pembimbing1) ? $data->dospem1()->first()->nama : $data->dosen_pembimbing1 }}</td>
                    <td>{{ is_numeric($data->dosen_pembimbing2) ? $data->dospem2()->first()->nama : $data->dosen_pembimbing2 }}</td>
                    <td align="center">
                        <button class="btn btn-info btn-block btn-sm" data-toggle="modal" style="width: 50%" data-target="#details-{{ $key }}">
                            <i class="nav-icon fas fa-search-plus">&nbsp; Detail</i>
                        </button>
                    </td>
                    <td align="center">
                        @if ($data->status == 'direvisi_kaprodi')
                        <a href="{{ route('Skripsi.updateRevisi', ['id' => $data->id_skripsi]) }}" class="btn btn-success btn-block btn-sm" >Setujui</a>
                        @else
                        <a href="{{ route('Skripsi.cancelSurat', ['id' => $data->id_skripsi]) }}" class="btn btn-danger btn-block btn-sm" >Batal</a>
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
@foreach ($data_selesai_skripsi as $key => $data )
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
                            <td>Catatan Revisi</td>
                            <td>Update Skripsi</td>
                        </tr>
                        <tr>
                            <th style="width: 400px; padding-bottom: 300px; padding-left: 20px">{{ $data->catatan }}</th>
                        <th><iframe src="{{ asset($data->url_revisi) }}" title="description" style="height: 350px;width:350px;"></iframe></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
  @endsection
  @push('custom-script')
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
