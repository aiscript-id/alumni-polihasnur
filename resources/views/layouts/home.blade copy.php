<!DOCTYPE html>
<html lang="en">

@include('layouts.includes.head')

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('') }}/assets/images/polihasnur.png" alt="">
        <span class="d-none d-lg-block">Alumni Polihasnur</span>
      </a>
      {{-- <i class="bi bi-list toggle-sidebar-btn"></i> --}}
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        @auth    
        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ Auth::user()->getAvatar }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
            </a><!-- End Profile Iamge Icon -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>{{ Auth::user()->name }}</h6>
                <span>
                    {{-- role user --}}
                    
                </span>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            </ul><!-- End Profile Dropdown Items -->
        
        </li><!-- End Profile Nav -->
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        {{-- register --}}
        <li class="nav-item">
            <a class="nav-link btn btn-primary btn-sm" href="{{ route('register') }}">Register</a>
        </li>
        @endauth

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  {{-- <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user') ? 'active' : '' }} " href="{{ route('user') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.tracer*') ? 'active' : '' }} " href="{{ route('user.tracer') }}">
          <i class="bi bi-pie-chart"></i>
          <span>Penelusuran Alumni</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.alumni*') ? 'active' : '' }} " href="{{ route('user.alumni') }}">
          <i class="bi bi-person"></i>
          <span>Data Alumni</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.job*') ? 'active' : '' }} " href="{{ route('user.job') }}">
          <i class="bi bi-person-badge"></i>
          <span>Pekerjaan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }} " href="{{ route('user.profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>

  </aside> --}}
  <!-- End Sidebar-->

  <main id="main" style="margin-left:0px!important">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.includes.foot')
  @stack('scripts')


</body>

</html>