@extends('template.utama')
@section('title', 'SIASKRIP PTIK UNJ')
@push('custom-css')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('page')
  <li class="breadcrumb-item active">Home Kaprodi</li>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ url('/kaprodi-srt') }}">
                <div class="info-box bg-info">
                  <span class="info-box-icon"><i class="far fa-address-book"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Surat Tugas</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                      {{ $surat_tugas }} surat pengajuan
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                </a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <a href="{{ url('/kaprodi-srt-perpanjangan') }}">
                <div class="info-box bg-lightblue">
                  <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Surat Tugas Perpanjang</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                      {{ $surat_tugas_perpanjang }} surat pengajuan
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                </a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <a href="{{ url('/kaprodi-sempro') }}">
                <div class="info-box bg-indigo">
                  <span class="info-box-icon"><i class="far fa-calendar-check"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Seminar Proposal</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                      {{ $sempro }} surat pengajuan
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <a href="{{ url('/kaprodi-srttugas-skripsi') }}">
                <div class="info-box bg-purple">
                    <span class="info-box-icon"><i class="fas fa-edit"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Revisi Seminar Proposal</span>
                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">
                        {{ $rvs_sempro }} surat pengajuan
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </a>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </section>

          <div class="row">
            <div class="col-md-9">
              <div class="container">
                <div class="card text-center">
                  <div class="card-header">
                  <h3 class="card-title col">
                      Selamat datang di Sistem Informasi Adminstrasi Skripsi PTIK UNJ
                  </h3>
                  </div>
                  <div class="card-body">
                      <img src="{{ asset('adminlte/img/logounj.png') }}" width="250px">
                  </div>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <a href="{{ url('/kaprodi-skripsi') }}">
                    <div class="info-box bg-olive" style="width: 253px">
                        <span class="info-box-icon"><i class="fas fa-calendar-check"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Sidang Skripsi</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                          </div>
                          <span class="progress-description">
                            {{ $skripsi }} surat pengajuan
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                </a>


                    <a href="{{ url('/kaprodi-hasil-skripsi') }}">
                        <div class="info-box bg-teal" style="width: 253px">
                            <span class="info-box-icon"><i class="fas fa-edit"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Hasil Sidang Skripsi</span>
                              <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                                {{ $rvs_skripsi }} surat pengajuan
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                    </a>

            </div>
            <!-- /.row -->
            </div>
@endsection
