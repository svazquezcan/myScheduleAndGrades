<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Fonts -->
    <link href="{{ asset('admin/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
            <?php echo $_SESSION['role']; ?>
                @if ($_SESSION['role'] == 'admin')
                    href="{{ route('dashboard.index') }}"
                @elseif($_SESSION['role'] == 'teacher')
                    href="{{ route('subject.index') }}"
                @else
                    href="{{ route('schedule.index') }}"
                @endif
            >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            @if ($_SESSION['role'] == 'admin')
                <li class="
                    nav-item
                    {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <li class="
                    nav-item
                    {{ Request::is('administrator') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Administradores</span></a>
                </li>

                <li class="
                    nav-item
                    {{ Request::is('student') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('student.index') }}">
                        <i class="fas fa-fw fa-user-graduate"></i>
                        <span>Estudiantes</span></a>
                </li>

                <li class="
                    nav-item
                    {{ Request::is('course') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('course.index') }}">
                        <i class="fas fa-fw fa-chalkboard"></i>
                        <span>Cursos</span></a>
                </li>
            @endif

            @if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'teacher')
                <li class="
                    nav-item
                    {{ Request::is('subject') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('subject.index') }}">
                        <i class="fas fa-fw fa-book-open"></i>
                        <span>Asignaturas</span></a>
                </li>
            @endif

            @if ($_SESSION['role'] == 'admin')
                <li class="
                    nav-item
                    {{ Request::is('teacher') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('teacher.index') }}">
                        <i class="fas fa-fw fa-user-tie"></i>
                        <span>Profesores</span></a>
                </li>

                <li class="
                    nav-item
                    {{ Request::is('branch') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('branch.index') }}">
                        <i class="fas fa-fw fa-code-branch"></i>
                        <span>Ramas</span></a>
                </li>
            @endif
            
            @if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'student')
                <li class="
                    nav-item
                    {{ Request::is('schedule') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('schedule.index') }}">
                        <i class="fas fa-fw fa-calendar-alt"></i>
                        <span>Horarios</span></a>
                </li>
            @endif

            @if ($_SESSION['role'] == 'admin')
                <li class="nav-item {{ Request::is('administrator/edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.edit') }}?id=<?php echo $_SESSION['user']['id_user_admin'] ?>">
                        <i class="fas fa-fw fa-user-edit"></i>
                        <span>Perfil</span></a>
                </li>
            @endif

            @if ($_SESSION['role'] == 'teacher')
                <li class="nav-item {{ Request::is('teacher/edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('teacher.edit') }}?id=<?php echo $_SESSION['user']['id_teacher'] ?>">
                        <i class="fas fa-fw fa-user-edit"></i>
                        <span>Perfil</span></a>
                </li>
            @endif

            @if ($_SESSION['role'] == 'student')
                <li class="nav-item {{ Request::is('student/edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('student.edit') }}?id=<?php echo $_SESSION['user']['id'] ?>">
                        <i class="fas fa-fw fa-user-edit"></i>
                        <span>Perfil</span></a>
                </li>
            @endif



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['user']['username'] ?>
                                    @if ($_SESSION['role'] == 'admin')
                                        <small>(administrador)</small>
                                    @elseif ($_SESSION['role'] == 'teacher')
                                        <small>(profesor)</small>
                                    @else
                                        <small>(estudiante)</small>
                                    @endif
                                </span>
                                <img class="img-profile rounded-circle" src="{{ asset('admin/img/user.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item"
                                    @if ($_SESSION['role'] == 'admin')
                                        href="{{ route('admin.edit') }}?id=<?php echo $_SESSION['user']['id_user_admin'] ?>"
                                    @elseif ($_SESSION['role'] == 'teacher')
                                        href="{{ route('teacher.edit') }}?id=<?php echo $_SESSION['user']['id_teacher'] ?>"
                                    @else
                                        href="{{ route('student.edit') }}?id=<?php echo $_SESSION['user']['id'] ?>"
                                    @endif
                                >
                                    <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
