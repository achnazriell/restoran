<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restoran</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/custom.css') }}">
    <style>
        .brand-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #343a40;
            padding: 5px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .brand-container img {
            height: 50px;
        }

        .brand-container .brand-text {
            color: white;
            font-size: 25px;
            font-weight: bold;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .nav-link-active {
            background-color: white;
            color: rgb(24, 6, 187);
        }

        .nav-link-active i {
            color: white;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('lte/dist/img/Logor.png') }}" alt="AdminLTELogo" height="80"
                width="80">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.create.pesan') }}" class="nav-link">Pesan</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Menu</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <div class="brand-container">
                    <img src="{{ asset('lte/dist/img/Logor.png') }}" alt="Restoran Logo">
                    <span class="brand-text font-weight-light">Restoran</span>
                </div>
            </a>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Cari"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>&ensp;Menu Restoran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.create.pesan') }}"
                            class="nav-link {{ request()->routeIs('admin.create.pesan') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>Pesan Menu</p>
                        </a>
                    </li>
                    <li
                        class="nav-item {{ request()->routeIs('admin.create.makanan', 'admin.create.minuman') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('admin.create.makanan', 'admin.create.minuman') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Tambah Menu<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.create.makanan') }}"
                                    class="nav-link {{ request()->routeIs('admin.create.makanan') ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Menu Makanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.create.minuman') }}"
                                    class="nav-link {{ request()->routeIs('admin.create.minuman') ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Menu Minuman</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item {{ request()->routeIs('admin.pesan', 'admin.makanan', 'admin.minuman') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link  {{ request()->routeIs('admin.pesan', 'admin.makanan', 'admin.minuman') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Tabel Data<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan') }}"
                                    class="nav-link {{ request()->routeIs('admin.pesan') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Data Pesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.makanan') }}"
                                    class="nav-link {{ request()->routeIs('admin.makanan') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Data Menu Makanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.minuman') }}"
                                    class="nav-link {{ request()->routeIs('admin.minuman') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Data Menu Minuman</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Log out</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('tpsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('tperror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('tmsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('tmerror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('tnsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('tnerror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('dnsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('dnerror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('dmsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('dmerror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('dpsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('dperror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('upsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('uperror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('umsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('umerror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('unsuccess'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('unerror'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif
</body>

</html>
