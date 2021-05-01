<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="index.php?controller=course">Cursos</a>
        <small> > Crear</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="index.php?controller=course&action=create">                
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required 
                            type="date" 
                            maxlength="50" 
                            class="form-control form-control-user"
                            name="date_start" 
                            required pattern="\d{4}-\d{2}-\d{2}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Estado del curso: </label>
                    <select required class="form-control" name="active">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <input required type="text" maxlength="200" class="form-control form-control-user" name="description" placeholder="Descripción">
                </div>
                                          
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear curso
                </button>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>
    