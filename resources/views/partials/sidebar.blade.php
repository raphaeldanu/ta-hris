 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">HRIS Apps</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">{{ Str::headline(auth()->user()->role->name) }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @can('viewAny', App\Models\Role::class)
        <li class="nav-item">
          <a href="{{ url('roles') }}" class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
              Roles
            </p>
          </a>
        </li>
        @endcan
        @can('viewAny', App\Models\User::class)
        <li class="nav-item">
          <a href="{{ url('users') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a href="{{ url('departments') }}" class="nav-link {{ request()->is('departments*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Department 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('positions') }}" class="nav-link {{ request()->is('positions*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-id-badge"></i>
            <p>
              Position
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('levels') }}" class="nav-link {{ request()->is('level*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-people-arrows"></i>
            <p>
              Employee Level
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('salary-ranges') }}" class="nav-link {{ request()->is('salary-ranges*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>
              Salary Range 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('employees') }}" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Employees 
            </p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="" class="nav-link {{ request()->is('restaurant*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-concierge-bell"></i>
            <p>
              Room Service 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link {{ request()->is('laundries*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-hands-wash"></i>
            <p>
              Laundry 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link {{ request()->is('reservations*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-business-time"></i>
            <p>
              Reservation 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Report 
            </p>
          </a>
        </li> --}}
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- /Main Sidebar Container -->