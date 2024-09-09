<div class="wrapper">
  <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img src="{{asset('back-end/img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand"
            height="20" />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a  href="{{ url('backend') }}" class="collapsed" aria-expanded="false">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
              {{-- <span class="caret"></span> --}}
            </a>
          </li>

          <li class="nav-item">
            <a  href="{{ url('backend') }}">
              <i class="fas fa-layer-group"></i>
              <p>Category</p>
              {{-- <span class="caret"></span> --}}
            </a>

          </li>
          <li class="nav-item">
            <a  href="{{ url('backend/product') }}">
              <i class="fas fa-th-list"></i>
              <p>Products</p>
              {{-- <span class="caret"></span> --}}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>