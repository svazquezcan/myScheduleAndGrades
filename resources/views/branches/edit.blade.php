<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="index.php?controller=branch">Ramas</a>
        <small> > Editar</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="index.php?controller=branch&action=edit">
            @csrf

                <input type="hidden" name="id_branch" value="<?php echo $branch['id_branch'] ?>"/>

                <div class="form-group">
                    <input value="<?php echo $branch['name'] ?>" required type="text" maxlength="40" class="form-control form-control-user" name="name" placeholder="Nombre de la rama">
                </div>               

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Actualizar rama
                </button>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>