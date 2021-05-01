<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MYSCHEDULE</title>

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <div class="logo-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                MYSCHEDULE
            </a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="index.php?controller=user&action=logout">Cerrar sesión</a></li>
                    <?php else: ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="index.php?controller=user&action=login">Iniciar sesión</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="index.php?controller=student&action=signup">Crear una cuenta</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <img class="masthead-avatar mb-5" src="assets/img/welcome.png" alt="" />
            <h1 class="masthead-heading text-uppercase mb-0">Bienvenid@</h1>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="masthead-subheading font-weight-light mb-0">Inicia sesión o crea una cuenta para disfrutar de la
                aplicación</p>
        </div>
    </header>

    <!-- Features Section-->
    <section class="page-section features">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Características</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="features-item mx-auto" data-toggle="modal" data-target="#featuresModal1">
                        <div class="features-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="features-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/features/feature1.png" alt="..." />
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="features-item mx-auto" data-toggle="modal" data-target="#featuresModal2">
                        <div class="features-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="features-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/features/feature2.png" alt="..." />
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="features-item mx-auto" data-toggle="modal" data-target="#featuresModal3">
                        <div class="features-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="features-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/features/feature3.png" alt="..." />
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="features-item mx-auto" data-toggle="modal" data-target="#featuresModal4">
                        <div class="features-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="features-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/features/feature4.png" alt="..." />
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                    <div class="features-item mx-auto" data-toggle="modal" data-target="#featuresModal5">
                        <div class="features-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="features-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/features/feature5.png" alt="..." />
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="features-item mx-auto" data-toggle="modal" data-target="#featuresModal6">
                        <div class="features-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="features-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/features/feature6.png" alt="..." />
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a class="btn btn-xl btn-outline-secondary" href="https://github.com/jnavarroorti/myschedule" target="_blank">
                    <i class="fab fa-github mr-2"></i>
                    Repositorio del proyecto
                </a>
            </div>
        </div>
    </section>

    <!-- Team Section-->
    <section class="page-section team text-white mb-0">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-white">El equipo</h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">El equipo que ha creado la aplicación está compuesto por los alumnos Sandra, Oriol Y
                        Jose. Somos un grupo multidisciplinar y hemos trabajado de forma sinérgica, con muchas ganas e
                        ilusión. El trabajo ha sido duro pero valió la pena.</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead">Nuestro nombre de equipo es ElePHPanters. Esto es debido a la mascota de PHP, un
                        simpático y divertido elefante que acompaña al lenguaje desde sus inicios. PHP ha sido el
                        lenguaje con el que se ha desarrollado la aplicación.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Copyright © ElePHPanters <?php echo date('Y') ?></small>
        </div>
    </div>

    <!-- Scroll to Top Button (Mobile)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a>
    </div>

    <!-- Modals-->

    <!-- Modal 1-->
    <div class="features-modal modal fade" id="featuresModal1" tabindex="-1" role="dialog"
        aria-labelledby="featuresModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="features-modal-title text-secondary text-uppercase mb-0"
                                    id="featuresModal1Label">Horarios</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="mb-5">
                                    Como estudiante, podrás visualizar un calendario con todos tus horarios.
                                    Si accedes como administrador, podrás gestionar los diferentes horarios.
                                </p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Cerrar ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2-->
    <div class="features-modal modal fade" id="featuresModal2" tabindex="-1" role="dialog"
        aria-labelledby="featuresModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="features-modal-title text-secondary text-uppercase mb-0"
                                    id="featuresModal2Label">Roles de usuarios</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="mb-5">
                                    La aplicación dispone de dos roles principales.
                                    El rol de estudiante permite consultar sus respectivos horarios.
                                    El rol de administrador permite gestionar todas las secciones de la aplicación.
                                </p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Cerrar ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3-->
    <div class="features-modal modal fade" id="featuresModal3" tabindex="-1" role="dialog"
        aria-labelledby="featuresModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="features-modal-title text-secondary text-uppercase mb-0"
                                    id="featuresModal3Label">Cursos</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="mb-5">
                                    Existe un apartado para gestionar los cursos, es necesario iniciar sesión como administrador para ello.
                                </p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Cerrar ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 4-->
    <div class="features-modal modal fade" id="featuresModal4" tabindex="-1" role="dialog"
        aria-labelledby="featuresModal4Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="features-modal-title text-secondary text-uppercase mb-0"
                                    id="featuresModal4Label">Asignaturas</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="mb-5">
                                    Desde el apartado asignatura, y habiendo accedido como administrador, podrás gestionar
                                    todas las asignaturas del sistema.
                                </p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Cerrar ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 5-->
    <div class="features-modal modal fade" id="featuresModal5" tabindex="-1" role="dialog"
        aria-labelledby="featuresModal5Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="features-modal-title text-secondary text-uppercase mb-0"
                                    id="featuresModal5Label">Profesores</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="mb-5">
                                    Desde la sección de profesores, podemos administrar a los mismos.
                                    Es necesario haber iniciado sesión con el rol de administrador.
                                </p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Cerrar ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 6-->
    <div class="features-modal modal fade" id="featuresModal6" tabindex="-1" role="dialog"
        aria-labelledby="featuresModal6Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="features-modal-title text-secondary text-uppercase mb-0"
                                    id="featuresModal6Label">Ramas</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="mb-5">
                                    Sección extra que hemos añadido para los administradores. Desde aquí podrán gestionar
                                    las ramas de estudios.
                                </p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Cerrar ventana
                                </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <!-- Icons -->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>

    <!-- Scripts -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>