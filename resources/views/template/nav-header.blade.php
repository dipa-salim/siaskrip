<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

        @if (auth()->user()->role == "Mahasiswa")
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li> --}}
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('https://linktr.ee/dosenptik') }}" target="_blank" class="nav-link">Contact Dosen</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('https://absensi.smartptik.my.id/home') }}" target="_blank"><button type="button" class="btn btn-success btn-sm rounded-pill nav-link">Absensi Smart PTIK</button></a>
          </li>
        @endif

        @if (auth()->user()->role == "Dosen")

        @endif

        @if (auth()->user()->role == "Admin")

        @endif
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item" style="right: auto">
            <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: white">
                <i class="fa fa-solid fa-user-tie" style="padding: 5px 20px"></i>Welcome Back, {{ auth()->user()->nama }}
            </a>
          </li>
        @endauth

      <!-- Navbar Search
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>-->

        <!-- Sidebar user (optional) -->
        {{-- <li class="user d-flex dropdown">
          <div class="image">
            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" style="height: 50px" class="img-circle elevation-2" alt="User Image">
          </div>
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">Dipa Noor Salim</a>
              <li class="dropdown dropdown-6">
                <ul class="dropdown_menu dropdown_menu--animated dropdown_menu-6">
                    <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Keluar</a></li>
                </ul>
              </li>

         </li> --}}
      <!-- Messages Dropdown Menu -->
{{-- <div class="dropdown-menu dropdown-menu-right scale-up">
              <ul class="dropdown-user">
                  <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Keluar</a></li>
              </ul>
            </div> --}}
      <!-- Notifications Dropdown Menu -->


    </ul>
  </nav>
