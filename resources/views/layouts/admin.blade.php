<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sist. de Citas Médicas</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url('dist/img/logo-sis-medical.png') }}" type="image/x-icon">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Sweet Alert 2 - CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- jQuery -->
        <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- FullCalendar 6.1.15 -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
        <script src="{{ url('fullcalendar/es.global.js') }}"></script>

    </head>
    
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                    
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('/admin') }}" class="nav-link">Sistema de Reserva de Citas Médicas</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    
                </ul>
            </nav><!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-info elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/admin') }}" class="brand-link">
                    <img src="{{ url('dist/img/logo-sis-medical.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Sist. Médico</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
                        <div class="image pl-0">
                            <img src="{{ url('dist/img/user-default.png') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info" style="padding-left: 5px;">
                            <h7>
                                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                            </h7>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            
                            <!-- Usuarios-->
                            @can('admin.usuarios.index')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas bi bi-people"></i>
                                        <p>
                                            Usuarios
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('admin/usuarios') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Listar Usuarios</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('admin/usuarios/create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear Usuario</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <!-- Secretarias-->
                            @can('admin.secretarias.index')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas bi bi-person-circle"></i>
                                        <p>
                                            Secretarias
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('admin/secretarias') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Listar Secretarias</p>
                                            </a>
                                        <li class="nav-item">
                                            <a href="{{ url('admin/secretarias/create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear Secretaria</p>
                                            </a>
                                        </li>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <!-- Pacientes -->
                            @can('admin.pacientes.index')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas bi bi-person-wheelchair"></i>
                                        <p>
                                            Pacientes
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('admin/pacientes') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Listar Pacientes</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('admin/pacientes/create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear Paciente</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <!-- Consultorios -->
                            @can('admin.consultorios.index')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas bi bi-hospital"></i>
                                        <p>
                                            Consultorios
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('admin/consultorios') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Listar Consultorios</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('admin/consultorios/create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear Consultorio</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <!-- Doctores -->
                            @can('admin.doctores.index')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas bi bi-person-lines-fill"></i>
                                        <p>
                                            Doctores
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('admin/doctores') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Listar Doctores</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('admin/doctores/create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear Doctor</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <!-- Horarios -->
                            @can('admin.horarios.index')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas bi bi-calendar2-week"></i>
                                        <p>
                                            Horarios
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('admin/horarios') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Listar Horarios</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('admin/horarios/create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear Horario</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            <!-- Cerrar Sesión -->
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" style="background: #751332;">
                                    <i class="nav-icon fas bi bi-door-closed"></i>
                                    <p>
                                        Cerrar Sesión
                                    </p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Mensajes de Sweet Alert 2 -->
            @if ( ($message = Session::get('mensaje')) && ($icono = Session::get('icono')))
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "{{ $icono }}",
                        title: "{{ $message }}",
                        showConfirmButton: false,
                        timer: 2500
                    });
                </script>
            @endif

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                    @yield('content-header')
                    {{-- <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Starter Page</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Starter Page</li>
                                </ol>
                            </div>
                        </div>
                    </div> --}}
                </div><!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Todo lo que quieras
                </div>
                <!-- Default to the left -->
                <strong>Derechos de autor &copy; 2024 <a href="https://www.lokyweb.com">LokyWeb</a>.</strong> Todos los derechos reservados.
            </footer>

        </div><!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- Bootstrap 4 -->
        <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('dist/js/adminlte.min.js') }}"></script>

    </body>

</html>
