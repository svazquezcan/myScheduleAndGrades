<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MYSCHEDULE</title>

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- Fonts -->
    <link href="assets/admin/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="assets/admin/css/styles.css" rel="stylesheet">
    <link href="assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                <?php if ($_SESSION['role'] == 'admin'): ?>
                    href="index.php?controller=dashboard"
                <?php else: ?>
                    href="index.php?controller=schedule"
                <?php endif; ?>
            >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MYSCHEDULE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if ($_SESSION['role'] == 'admin'): ?>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'dashboard'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'admin'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=admin">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Administradores</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'student'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=student">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Estudiantes</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'course'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=course">
                    <i class="fas fa-fw fa-chalkboard"></i>
                    <span>Cursos</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'class'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=subject">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Asignaturas</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'teacher'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=teacher">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Profesores</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'branch'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=branch">
                    <i class="fas fa-fw fa-code-branch"></i>
                    <span>Ramas</span></a>
            </li>

            <?php endif; ?>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'schedule'): ?>active<?php endif ?>
            ">
                <a class="nav-link" href="index.php?controller=schedule">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Horarios</span></a>
            </li>

            <li class="
                nav-item
                <?php if($_GET['controller'] == 'user' && $_GET['action'] == 'edit'): ?>active<?php endif ?>
            ">
                <a class="nav-link"
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        href="index.php?controller=admin&action=edit&id=<?php echo $_SESSION['user']['id_user_admin'] ?>"
                    <?php else: ?>
                        href="index.php?controller=student&action=edit&id=<?php echo $_SESSION['user']['id'] ?>"
                    <?php endif; ?>
                >
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span>Perfil</span></a>
            </li>

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
                                    <?php if ($_SESSION['role'] == 'admin'): ?>
                                        <small>(administrador)</small>
                                    <?php else: ?>
                                        <small>(estudiante)</small>
                                    <?php endif; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="assets/admin/img/user.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item"
                                    <?php if ($_SESSION['role'] == 'admin'): ?>
                                        href="index.php?controller=admin&action=edit&id=<?php echo $_SESSION['user']['id_user_admin'] ?>"
                                    <?php else: ?>
                                        href="index.php?controller=student&action=edit&id=<?php echo $_SESSION['user']['id'] ?>"
                                    <?php endif; ?>
                                >
                                    <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?controller=user&action=logout">
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