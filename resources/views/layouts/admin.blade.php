<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Dashboard 2</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/dist/img') }}/16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/dist/img') }}/32x32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('backend/dist/img') }}/64x64.png">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            @php
                $user = Auth::user();
            @endphp
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->image)
                            <img width="30px" height="30px" class="rounded-circle mr-1" src="{{ asset(Auth::user()->image) }}" alt="User profile picture">{{ Auth::user()->name }}
                            @else
                            <img width="30px" height="30px" class="rounded-circle mr-1" src="{{ asset('backend/image/defult.png') }}" alt="User profile picture">{{ Auth::user()->name }}
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @if ($user->can('profile.view'))
                                <a href="{{ route('profile') }}" class="dropdown-item text-primary" type="button"><i class="fas fa-user"></i> Profile</a>
                            @endif
                            @if ($user->can('profile.edit'))
                                <a href="{{ route('setting') }}" class="dropdown-item text-primary" type="button"><i class="fas fa-user-cog"></i> Setting</a>
                            @endif
                            <a class="dropdown-item text-danger" role="button" href="javascript:void(0)"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('backend') }}/image/64x64.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Zakir Soft</span>
            </a>
            {{-- <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('backend') }}/image/64x64.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Zakir Soft</span>
            </a> --}}
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if ($user->can('dashboard.view'))
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        @endif
                        @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                            <li class="nav-item has-treeview {{ Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? ' menu-open' : '' }}">
                                <a href="javascript:void(0)" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>Advance Settings<i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('user.index') }}" class="nav-link {{ Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? ' active' : '' }}">
                                                <i class="fas fa-users nav-icon"></i>
                                                <p>All Users</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                                @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('role.index') }}" class="nav-link {{ Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') ? ' active' : '' }}">
                                                <i class="fas fa-lock nav-icon"></i>
                                                <p>Roles & Permission</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumbs')
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>
    </div>

    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('backend') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- toastr notification -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'Success!')
        @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", 'Warning!')
        @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", 'Error!')
        @endif
        // toast config
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "hideMethod": "fadeOut"
        }
    </script>

    @yield('script')
</body>
</html>
