<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="index.php?controller=admin">Administradores</a>
        <small> > Editar</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <p>Nota: Si quieres conservar la contraseña, deja el campo en blanco.</p>
            <form class="user" method="post" action="index.php?controller=admin&action=edit">
                <input type="hidden" name="id" value="<?php echo $admin['id_user_admin'] ?>" />
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $admin['username'] ?>" required type="text" maxlength="20" class="form-control form-control-user" name="username" placeholder="Nombre de usuario">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" minlength="4" maxlength="8" class="form-control form-control-user" name="password" placeholder="Contraseña">
                    </div>
                </div>

                <div class="form-group">
                    <input value="<?php echo $admin['name'] ?>" required type="text" maxlength="40" class="form-control form-control-user" name="name" placeholder="Nombre completo">
                </div>

                <div class="form-group">
                    <input value="<?php echo $admin['email'] ?>" required type="email" maxlength="150" class="form-control form-control-user" name="email" placeholder="Correo electrónico">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Actualizar administrador
                </button>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>