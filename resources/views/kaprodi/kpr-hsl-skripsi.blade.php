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
                    <th>Dokumen Keperluan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_selesai_skripsi_kaprodi as $key => $data )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->mahasiswa()->first()->nim }}</td>
                    <td>{{ $data->mahasiswa()->first()->nama }}</td>
                    <td>{{ $data->judul_skripsi }}</td>
                    <td align="center">
                        <button class="btn btn-info btn-block btn-sm" data-toggle="modal" style="width: 50%" data-target="#details-{{ $key }}">
                            <i class="nav-icon fas fa-search-plus">&nbsp; Detail</i>
                        </button>
                    </td>
                    <td align="center">
                        @if ($data->status == 'belum_revisi_kaprodi')
                        <button class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#setujui-{{ $key }}" >Setujui</button>
                        @else
                        <a href="{{ route('Skripsi.cancelKaprodiRevisi', ['id' => $data->id_skripsi]) }}" class="btn btn-danger btn-block btn-sm" >Batal</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Modal Detail -->
@foreach ($data_selesai_skripsi_kaprodi as $key => $data )
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

<!-- Modal Setujui -->

@foreach ($data_selesai_skripsi_kaprodi as $key => $data )

<form action="{{ route('Skripsi.updateKaprodiRevisi', ['id' => $data->id_skripsi]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md" id="setujui-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kirim Hasil Skripsi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="dosen_pembimbing1">Dosen Pembimbing 1</label>
                    {{-- <input type="text" class="form-control" id="dosen_pembimbing1" name="dosen_pembimbing1" value="{{ old('dosen_pembimbing1') }}" type="text" class="form-control" rows='2' placeholder="Masukkan Judul" old> --}}
                    <select class="form-control" id="dosen_pembimbing1" name="dosen_pembimbing1">
                        @foreach ($dosen as $data)
                            <option value="{{ $data->id_dosen }}">{{ $data->nama }}</option>
                            @endforeach
                            <option value="0">Lainnya</option>
                          </select>
                          <input id="dosen_pembimbing1_text" type="text" placeholder="Nama Dosen Pembimbing" class="form-control" name="dosen_pembimbing1_text">
                  </div>
                  <div class="form-group">
                    <label for="dosen_pembimbing2">Dosen Pembimbing 2</label>
                    {{-- <input type="text" class="form-control" id="dosen_pembimbing2" name="dosen_pembimbing2" value="{{ old('dosen_pembimbing2') }}" type="text" class="form-control" rows='2' placeholder="Masukkan Judul" old> --}}
                    <select class="form-control" id="dosen_pembimbing2" name="dosen_pembimbing2">
                        @foreach ($dosen as $data)
                            <option value="{{ $data->id_dosen }}">{{ $data->nama }}</option>
                            @endforeach
                            <option value="0">Lainnya</option>
                          </select>
                          <input id="dosen_pembimbing2_text" type="text" placeholder="Nama Dosen Pembimbing" class="form-control" name="dosen_pembimbing2_text">
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
    $(document).ready(function(){
        //Inisiasi element untuk disembunyikan karena belum ada pilihan
        $("#dosen_pembimbing1_text").hide();
        $("#dosen_pembimbing2_text").hide();

        $('#dosen_pembimbing2').on('change', function(){
            let kel = $(this).val(); //get value dari id yang sedang dikelola
            if(kel == 0) { //diganti menjadi 0 karena id dosen tidak mungkin dimulai dari 0. Perkecil waktu comparison dengan angka dibanding string
                $("#dosen_pembimbing2_text").show(); //tampilkan element yang disembunyikan
            } else {
                $("#dosen_pembimbing2_text").hide(); //kembali disembunyikan
            }
        });

        //selebihnya sama kayak di atas
        $('#dosen_pembimbing1').on('change', function(){
            let kel = $(this).val();
            if(kel == 0) {
                $("#dosen_pembimbing1_text").show();
            } else {
                $("#dosen_pembimbing1_text").hide();
            }
        });
    });
</script>
    <script>
      $("#MasterData").addClass("active");
      $("#liMasterData").addClass("menu-open");
      $("#DataMahasiswa").addClass("active");
    </script>
  @endpush
