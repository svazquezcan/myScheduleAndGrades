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
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar sesión</h1>
                                    </div>

                                    <p>
                                        <small>
                                            Nota para el consultor. Facilitamos dos cuentas de acceso:<br>
                                            - Acceso como <strong>administrador</strong>: bmulleras / 1234<br>
                                            - Acceso como <strong>estudiante</strong>: maria / 1234
                                        </small>
                                    </p>

                                    <?php if (isset($_GET['credentials']) && $_GET['credentials'] == 'wrong'): ?>
                                        <p class="text-danger"><i class="fas fa-exclamation-triangle"></i> Los datos proporcionados no son correctos.</p>
                                    <?php endif; ?>

                                    <?php if (isset($_GET['signup']) && $_GET['signup'] == 'ok'): ?>
                                        <p class="text-success"><i class="fas fa-check-circle"></i> ¡Gracias por registrarte! Ya puedes iniciar sesión.</p>
                                    <?php endif; ?>

                                    <form class="user" method="post" action="index.php?controller=user&action=login">
                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="username" placeholder="Nombre de usuario">
                                        </div>
                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-user" id="password" name="password" placeholder="Contraseña">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Acceder
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php?controller=student&action=signup">Crear cuenta de estudiante</a>
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
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Scripts -->
    <script src="assets/admin/js/scripts.js"></script>

</body>

</html>