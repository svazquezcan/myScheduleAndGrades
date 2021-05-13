@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-12">
        <p>
            Bienvenid@ <?php echo $_SESSION['user']['name'] ?>, eres un
            @switch($_SESSION['role'])
                @case('admin')
                    administrador. Podrás gestionar todos las secciones.
                @break
                @case('teacher')
                    profesor. Podrás modificar las asignaturas que impartes.
                @break
                @default
                    estudiante.
            @endswitch
            
        </p>
    </div>

    <!-- Administradores -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <a href="{{ route('admin.index') }}">Administradores</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalAdmins ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estudiantes -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="{{ route('student.index') }}">Estudiantes</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalStudents ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cursos -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <a href="{{ route('course.index') }}">Cursos</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalCourses ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Asignaturas -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <a href="{{ route('subject.index') }}">Asignaturas</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalSubjects ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profesores -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <a href="{{ route('teacher.index') }}">Profesores</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalTeachers ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ramas -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="{{ route('branch.index') }}">Ramas</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalBranches ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-code-branch fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Horarios -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <a href="{{ route('schedule.index') }}">Horarios</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalSchedules ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include ('admin_common/footer')
