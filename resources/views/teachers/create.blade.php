<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="teachers">Profesores</a>
        <small> > Crear</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="{{ route('teacher.create') }}">  
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-sm-6">
                        <input required type="text" maxlength="50" class="form-control form-control-user" name="surname" placeholder="Apellidos">
                    </div>
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
                    <input required type="email" maxlength="150" class="form-control form-control-user" name="email" placeholder="Correo electrónico">
                </div>  

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear profesor
                </button>
            </form>
        </div>
    </div>
</div>
@include ('admin_common/footer')

<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>