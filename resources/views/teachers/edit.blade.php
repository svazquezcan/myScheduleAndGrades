@include ('admin_common/header')

<?php if ($_SESSION['role'] == 'admin'): ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="{{ route('teacher.index') }}">Profesores</a>
        <small> > Editar</small>
    </h1>
</div>

<?php endif; ?>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <p>Nota: Si quieres conservar la contraseña, deja el campo en blanco.</p>
            <form class="user" method="post" action="{{ route('teacher.edit') }}">
                @csrf
                <input type="hidden" name="id_teacher" value="<?php echo $teacher['id_teacher'] ?>" />
                
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $teacher['username'] ?>" required type="text" maxlength="20" class="form-control form-control-user" name="username" placeholder="Nombre de usuario">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" minlength="4" maxlength="8" class="form-control form-control-user" name="password" placeholder="Contraseña">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $teacher['name'] ?>"  required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-sm-6">
                        <input value="<?php echo $teacher['surname'] ?>"  required type="text" maxlength="50" class="form-control form-control-user" name="surname" placeholder="Apellidos">
                    </div>
                </div>                

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input value="<?php echo $teacher['telephone'] ?>"  required type="text" maxlength="9" class="form-control form-control-user" name="telephone" placeholder="Teléfono">
                    </div>
                    <div class="col-sm-6">
                        <input value="<?php echo $teacher['nif'] ?>"  required type="text" maxlength="9" class="form-control form-control-user" name="nif" placeholder="NIF">
                    </div>
                </div>

                <div class="form-group">
                    <input value="<?php echo $teacher['email'] ?>"  required type="email" maxlength="150" class="form-control form-control-user" name="email" placeholder="Correo electrónico">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Actualizar profesor
                </button>
            </form>
        </div>
    </div>
</div>
@include ('admin_common/footer')
