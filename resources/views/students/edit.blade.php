<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>

<?php if ($_SESSION['role'] == 'admin'): ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="index.php?controller=student">Estudiantes</a>
        <small> > Editar</small>
    </h1>
</div>

<?php endif; ?>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <p>Nota: Si quieres conservar la contraseña, deja el campo en blanco.</p>
            <form class="user" method="post" action="index.php?controller=student&action=edit">
                <input type="hidden" name="id" value="<?php echo $student['id'] ?>" />
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $student['username'] ?>" required type="text" maxlength="20" class="form-control form-control-user" name="username" placeholder="Nombre de usuario">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" minlength="4" maxlength="8" class="form-control form-control-user" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $student['name'] ?>"  required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-sm-6">
                        <input value="<?php echo $student['surname'] ?>"  required type="text" maxlength="50" class="form-control form-control-user" name="surname" placeholder="Apellidos">
                    </div>
                </div>

                <div class="form-group">
                    <input value="<?php echo $student['email'] ?>"  required type="email" maxlength="150" class="form-control form-control-user" name="email" placeholder="Correo electrónico">
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $student['telephone'] ?>"  required type="text" maxlength="9" class="form-control form-control-user" name="telephone" placeholder="Teléfono">
                    </div>
                    <div class="col-sm-6">
                        <input value="<?php echo $student['nif'] ?>"  required type="text" maxlength="9" class="form-control form-control-user" name="nif" placeholder="NIF">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Actualizar estudiante
                </button>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>