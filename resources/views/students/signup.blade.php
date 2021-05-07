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
    <link href="../../assets/admin/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="../../assets/admin/css/styles.css" rel="stylesheet">
    <link href="../../assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6 col-xl-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Crear cuenta de estudiante</h1>
                                    </div>
                                    <form class="user" method="post" action="index.php?controller=student&action=signup">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input required type="text" maxlength="20" class="form-control form-control-user" name="username" placeholder="Nombre de usuario">
                                            </div>
                                            <div class="col-sm-6">
                                                <input required type="password" minlength="4" maxlength="8" class="form-control form-control-user" name="password" placeholder="Contraseña">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre">
                                            </div>
                                            <div class="col-sm-6">
                                                <input required type="text" maxlength="50" class="form-control form-control-user" name="surname" placeholder="Apellidos">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input required type="email" maxlength="150" class="form-control form-control-user" name="email" placeholder="Correo electrónico">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input required type="text" maxlength="9" class="form-control form-control-user" name="telephone" placeholder="Teléfono">
                                            </div>
                                            <div class="col-sm-6">
                                                <input required type="text" maxlength="9" class="form-control form-control-user" name="nif" placeholder="NIF">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Cursos en los que estás matriculado:</label>
                                            <select required multiple class="form-control" name="id_courses[]">
                                                <?php $courses = DB::table('courses')->get() ?>
                                                    <?php foreach($courses as $course): ?>
                                                        <option value="<?php echo $course->id_course ?>"><?php echo $course-> name ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Darse de alta
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php?controller=user&action=login">Iniciar sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Scripts -->
    <script src="../../assets/js/scripts.js"></script>

</body>

</html>