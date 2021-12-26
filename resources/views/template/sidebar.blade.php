<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ asset('adminlte/img/logounj.png') }}" class="brand-link">
    <img src="{{ asset('adminlte/img/logounj.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIASKRIP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- SidebarSearch Form
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


             @if (auth()->user()->role == "Admin")
                <!-- Sidebar Admin -->
             <li class="nav-item">
              <a href="{{ url('admin') }}" class="nav-link {{  request()->is('admin') ? 'active' : ''}}">
                <i class="nav-icon fas fa-home"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Master Data
                    <span class="badge badge-info right">3</span>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview active">
                  <li class="nav-item">
                    <a href="{{ url('user') }}" class="nav-link {{  request()->is('user') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('mahasiswa') }}" class="nav-link {{  request()->is('mahasiswa') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Mahasiswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/dosen') }}" class="nav-link {{  request()->is('dosen') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Dosen</p>
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="{{ url('data-skripsi') }}" class="nav-link {{  request()->is('data-skripsi') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Skripsi</p>
                    </a>
                  </li> --}}
                </ul>
                </li>

              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-inbox"></i>
                    <p>
                      Daftar Pengajuan
                      <span class="badge badge-info right">5</span>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('admin-srt') }}" class="nav-link {{  request()->is('admin-srt') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Surat Tugas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('admin-srt-perpanjangan') }}" class="nav-link {{  request()->is('admin-srt-perpanjangan') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Perpanjangan Surat Tugas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('admin-sempro') }}" class="nav-link {{  request()->is('admin-sempro') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Seminar Proposal</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('admin-srttugas-skripsi') }}" class="nav-link {{  request()->is('admin-srttugas-skripsi') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Surat Tugas Skripsi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('admin-skripsi') }}" class="nav-link {{  request()->is('admin-skripsi') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sidang Skripsi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('admin-hasil-skripsi') }}" class="nav-link {{  request()->is('admin-hasil-skripsi') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hasil Sidang Skripsi</p>
                      </a>
                    </li>
                  </ul>
                  </li>
                  <li class="nav-item">
                  <a href="{{ url('admin-laporan') }}" class="nav-link {{  request()->is('admin-laporan') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Laporan</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link {{  request()->is('logout') ? 'active' : ''}}">
                      <i class="nav-icon fas fa-solid fa-arrow-right"></i>
                      <p>Logout</p>
                    </a>
                  </li>
             @endif

        {{-- Sidebar Mahasiswa --}}
        @if (auth()->user()->role == "Mahasiswa")
        <li class="nav-item">
            <a href="/" class="nav-link {{  request()->is('/') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ubah-password') }}" class="nav-link {{  request()->is('ubah-password') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Ubah Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logbook') }}" class="nav-link {{  request()->is('logbook') ? 'active' : ''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>Logbook Bimbingan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('dosen-pembimbing', 'dosen-sempro', 'dosen-revisi-sempro','dosen-skripsi','dosen-revisi-skripsi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Approval Dosen
                <span class="badge badge-info right">5</span>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('dosen-pembimbing') }}" class="nav-link {{  request()->is('dosen-pembimbing') ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dosen Pembimbing</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dosen-sempro') }}" class="nav-link {{  request()->is('dosen-sempro') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Seminar Proposal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('dosen-revisi-sempro') }}" class="nav-link {{  request()->is('dosen-revisi-sempro') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Revisi Sempro</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('dosen-skripsi') }}" class="nav-link {{  request()->is('dosen-skripsi') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sidang Skripsi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('dosen-revisi-skripsi') }}" class="nav-link {{  request()->is('dosen-revisi-skripsi') ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Revisi Skripsi</p>
                    </a>
                  </li>
                </ul>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
                Administrasi
                <span class="badge badge-info right">3</span>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('surat-tugas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Tugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('sempro') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seminar Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('skripsi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Skripsi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('pemberitahuan') }}" class="nav-link {{  request()->is('pemberitahuan') ? 'active' : ''}}">
              <i class="far fa-check-square nav-icon"></i>
              <p>Hasil Pengajuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link {{  request()->is('logout') ? 'active' : ''}}">
              <i class="nav-icon fas fa-solid fa-arrow-right"></i>
              <p>Logout</p>
            </a>
          </li>
        @endif

        {{-- Sidebar Dosen --}}
        @if (auth()->user()->role == "Dosen")
        <li class="nav-item">
            <a href="{{ url('dashboard-dosen') }}" class="nav-link {{  request()->is('dashboard-dosen') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ubah-password') }}" class="nav-link {{  request()->is('ubah-password') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Ubah Password</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{ url('mhs-bimbingan') }}" class="nav-link {{  request()->is('mhs-bimbingan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>Mahasiswa Bimbingan</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('approval-logbook') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Approval Logbook</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Daftar Pengajuan
                <span class="badge badge-info right">5</span>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('pengajuan-mhs') }}" class="nav-link {{  request()->is('pengajuan-mhs') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa Bimbingan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pengajuan-sempro') }}" class="nav-link {{  request()->is('pengajuan-sempro') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seminar Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pengajuan-rvs-sempro') }}" class="nav-link {{  request()->is('pengajuan-rvs-sempro') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Revisi Seminar Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pengajuan-skripsi') }}" class="nav-link {{  request()->is('pengajuan-skripsi') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sidang Skripsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pengajuan-rvs-skripsi') }}" class="nav-link {{  request()->is('pengajuan-rvs-skripsi') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Revisi Sidang Skripsi</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link {{  request()->is('logout') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-solid fa-arrow-right"></i>
                  <p>Logout</p>
                </a>
              </li>
        @endif

        @if (auth()->user()->role == "Kaprodi")
        <!-- Sidebar Kaprodi -->
     <li class="nav-item">
      <a href="{{ url('kaprodi') }}" class="nav-link {{  request()->is('kaprodi') ? 'active' : ''}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
      </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('ubah-password') }}" class="nav-link {{  request()->is('ubah-password') ? 'active' : ''}}">
          <i class="nav-icon fas fa-cogs"></i>
          <p>Ubah Password</p>
        </a>
      </li>
    <li class="nav-item">
        <a href="{{ url('kaprodi-data-mhs') }}" class="nav-link {{  request()->is('kaprodi-data-mhs') ? 'active' : ''}}">
          <i class="nav-icon fas fa-users"></i>
          <p>Data Mahasiswa</p>
        </a>
      </li><li class="nav-item">
        <a href="{{ url('kaprodi-data-dosen') }}" class="nav-link {{  request()->is('kaprodi-data-dosen') ? 'active' : ''}}">
          <i class="nav-icon fas fa-user-friends"></i>
          <p>Data Dosen</p>
        </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-inbox"></i>
            <p>
              Daftar Pengajuan
              <span class="badge badge-info right">5</span>
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('kaprodi-srt') }}" class="nav-link {{  request()->is('kaprodi-srt') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Tugas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kaprodi-srt-perpanjangan') }}" class="nav-link {{  request()->is('kaprodi-srt-perpanjangan') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Perpanjangan Surat Tugas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kaprodi-sempro') }}" class="nav-link {{  request()->is('kaprodi-sempro') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Seminar Proposal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kaprodi-srttugas-skripsi') }}" class="nav-link {{  request()->is('kaprodi-srttugas-skripsi') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Tugas Skripsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kaprodi-skripsi') }}" class="nav-link {{  request()->is('kaprodi-skripsi') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sidang Skripsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kaprodi-hasil-skripsi') }}" class="nav-link {{  request()->is('kaprodi-hasil-skripsi') ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Hasil Sidang Skripsi</p>
              </a>
            </li>
          </ul>
          </li>
          <li class="nav-item">
          <a href="/progres" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Laporan</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link {{  request()->is('logout') ? 'active' : ''}}">
              <i class="nav-icon fas fa-solid fa-arrow-right"></i>
              <p>Logout</p>
            </a>
          </li>
     @endif

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
