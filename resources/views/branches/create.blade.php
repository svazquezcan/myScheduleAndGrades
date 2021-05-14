<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="branches">Ramas</a>
        <small> > Crear</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="{{ route('branch.create') }}">   
            @csrf

                <div class="form-group">
                    <input required type="text" maxlength="100" class="form-control form-control-user" name="name" placeholder="Nombre de la rama">                    
                </div>                              

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear rama
                </button>
            </form>
        </div>
    </div>
</div>
@include ('admin_common/footer')
<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>