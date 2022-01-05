@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@section('page')
  <li class="breadcrumb-item active">Dashboard Mahasiswa</li>
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Semangat Tuntaskan Skripsimu !</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    Bagi Mahasiswa yang ingin melakukan skripsi, kalian dapat melihat referensi dibawah ini
    <p>sebagai referensi tentang topik skripsi yang akan dikerjakan<p>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <td>Topik Skripsi</td>
              <td>Bidang</td>
              <td>Contoh Jurnal</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>UI/UX Design</td>
                <td>Multimedia/RPL</td>
                <td><a href="{{ url('https://publikasiilmiah.ums.ac.id/xmlui/bitstream/handle/11617/11706/16_Pengembangan%20Ui%20Ux%20Pada%20Aplikasi%20M-Voting%20Menggunakan%20Metode%20Design%20Thinking.pdf?sequence=1&isAllowed=y') }}" target="_blank"><button class="btn btn-info btn-block"><i class="nav-icon fas fa-search-plus">&nbsp; Lihat</i></button></a></td>
            </tr>
            <tr>
                <td>Media Pembelajaran</td>
                <td>Multimedia</td>
                <td><a href="{{ url('http://journal.unj.ac.id/unj/index.php/jpi/article/view/16891/9973') }}" target="_blank"><button class="btn btn-info btn-block"><i class="nav-icon fas fa-search-plus" >&nbsp; Lihat</i></button></a></td>
            </tr>
            <tr>
                <td>Pengembangan Aplikasi : Metode Scrum</td>
                <td>RPL</td>
                <td><a href="{{ url('http://jurnal.stmik.banisaleh.ac.id/index.php/JIST/article/view/61/28') }}" target="_blank"><button class="btn btn-info btn-block"><i class="nav-icon fas fa-search-plus" >&nbsp; Lihat</i></button></a></td>
            </tr>
            <tr>
                <td>Mikrotik</td>
                <td>TKJ</td>
                <td><a href="{{ url('http://journal.unj.ac.id/unj/index.php/pinter/article/view/18965/9854') }}" target="_blank"><button class="btn btn-info btn-block"><i class="nav-icon fas fa-search-plus" >&nbsp; Lihat</i></button></a></td>
            </tr>
            <tr>
                <td>Quality of Service (QOS)</td>
                <td>TKJ</td>
                <td><a href="{{ url('http://journal.unj.ac.id/unj/index.php/pinter/article/view/18964/9853') }}" target="_blank"><button class="btn btn-info btn-block"><i class="nav-icon fas fa-search-plus" >&nbsp; Lihat</i></button></a></td>
            </tr>
            </tbody>
          </table>
    </li>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    - Sistem Informasi Skripsi PTIK -
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

