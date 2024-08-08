<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    {{-- <li class="nav-item {{ Request::is('admin/users/registrations') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/users/registrations') }}">
            <i class="fas fa-users"></i>
            <span>New Registrations</span>
            <span class="badge bg-danger">New</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item {{ Request::is('admin/categories/create') || Request::is('admin/categories') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin/categories/create') || Request::is('admin/categories') ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="{{ Request::is('admin/categories/create') || Request::is('admin/categories') ? true : false }}"
            aria-controls="collapseCategory">
            <i class="fas fa-layer-group"></i>
            <span>Category</span>
        </a>
        <div id="collapseCategory"
            class="collapse {{ Request::is('admin/categories/create') || Request::is('admin/categories') ? 'show' : '' }}"
            aria-labelledby="headingFeatured" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/categories/create') ? 'active' : '' }}"
                    href="{{ url('/admin/categories/create') }}">Add Category</a>
                <a class="collapse-item {{ Request::is('admin/categories') ? 'active' : '' }}"
                    href="{{ url('/admin/categories') }}">View Categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/tyres/create') || Request::is('admin/tyres') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin/tyres/create') || Request::is('admin/tyres') ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseTyres"
            aria-expanded="{{ Request::is('admin/tyres/create') || Request::is('admin/tyres') ? true : false }}"
            aria-controls="collapseTyres">
            <i class="fas fa-truck-monster"></i>
            <span>Tyre</span>
        </a>
        <div id="collapseTyres"
            class="collapse {{ Request::is('admin/tyres/create') || Request::is('admin/tyres') ? 'show' : '' }}"
            aria-labelledby="headingFeatured" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/tyres/create') ? 'active' : '' }}"
                    href="{{ url('/admin/tyres/create') }}">Add Tyre</a>
                <a class="collapse-item {{ Request::is('admin/tyres') ? 'active' : '' }}"
                    href="{{ url('/admin/tyres') }}">View Tyres</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/users/create') || Request::is('admin/users') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin/users/create') || Request::is('admin/users') ? '' : 'collapsed' }}"
            href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="{{ Request::is('admin/users/create') || Request::is('admin/users') ? true : false }}"
            aria-controls="collapseUser">
            <i class="fas fa-users-cog"></i>
            <span>User</span>
        </a>
        <div id="collapseUser"
            class="collapse {{ Request::is('admin/users/create') || Request::is('admin/users') ? 'show' : '' }}"
            aria-labelledby="headingFeatured" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/users/create') ? 'active' : '' }}"
                    href="{{ url('/admin/users/create') }}">Add User</a>
                <a class="collapse-item {{ Request::is('admin/users') ? 'active' : '' }}"
                    href="{{ url('/admin/users') }}">View Users</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
