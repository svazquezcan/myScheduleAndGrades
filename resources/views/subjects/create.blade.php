<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="index.php?controller=subject">Asignaturas</a>
        <small> > Crear</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="index.php?controller=subject&action=create">

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="text" maxlength="50" class="form-control form-control-user" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-sm-6">
                        <input required type="text" class="form-control form-control-user" name="color" placeholder="Color">
                    </div>
                </div>
                                
                <!--
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Info!</strong> Mantén presionada la tecla Ctrl (windows) o Command (Mac) para seleccionar/quitar múltiples opciones
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                -->

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Profesor:</label>
                    <select required class="form-control" name="id_teacher">
                        <?php while ($teacher = $teachers->fetch(PDO::FETCH_ASSOC)) : ?>
                            <option value="<?php echo $teacher['id_teacher'] ?>">
                                <?php echo $teacher['name'] ?>
                                <?php echo $teacher['surname'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <!--
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Info!</strong> Mantén presionada la tecla Ctrl (windows) o Command (Mac) para seleccionar/quitar múltiples opciones
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                -->

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Curso:</label>
                    <select required class="form-control" name="id_course">
                        <?php while ($course = $courses->fetch(PDO::FETCH_ASSOC)) : ?>
                            <option value="<?php echo $course['id_course'] ?>"><?php echo $course['name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Rama:</label>
                    <select required class="form-control" name="id_branch">
                        <?php while ($branch = $branches->fetch(PDO::FETCH_ASSOC)) : ?>
                            <option value="<?php echo $branch['id_branch'] ?>">
                                <?php echo $branch['name'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Horario:</label>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input required type="time" pattern="(0[89]|1[0-7]):[03]?0" class="form-control form-control-user" name="time_start" placeholder="Hora inicio">
                        </div>
                        <div class="col-sm-6">
                            <input required type="time" pattern="(0[89]|1[0-7]):[03]?0" class="form-control form-control-user" name="time_end" placeholder="Hora fin">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Día:</label>                        
                    <input required type="date" maxlength="50" class="form-control form-control-user" name="day" placeholder="Día">
                </div>                        

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear asignatura
                </button>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>