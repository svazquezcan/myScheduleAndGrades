@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="{{ route('course.index') }}">Cursos</a>
        <small> > Editar</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="{{ route('course.edit') }}">
                @csrf
                <input type="hidden" name="id_course" value="<?php echo $course['id_course'] ?>" />
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="exampleFormControlSelect2">Nombre del curso:</label>
                        <input value="<?php echo $course['name'] ?>" required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre del curso">
                    </div>
                    <div class="col-sm-6">
                        <label for="exampleFormControlSelect2">Estado del curso:</label>
                        <input 
                            value="<?php
                                if ($course['active'] == 1) {
                                    echo "Activo";
                                } else {
                                    echo "Inactivo";
                                }                                
                                ?>" 
                            required type="text" 
                            maxlength="20" 
                            class="form-control form-control-user" 
                            name="active" placeholder="Estado del curso">
                    </div>
                </div>               

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Descripción del curso:</label>
                    <input value="<?php echo $course['description'] ?>" required type="text" maxlength="200" class="form-control form-control-user" name="description" placeholder="Descripción">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Fecha de inicio del curso:</label>
                    <input value="<?php echo $course['date_start'] ?>" required type="date" class="form-control form-control-user" name="date_start" placeholder="Fecha de inicio">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Fecha de finalización del curso:</label>
                    <input value="<?php echo $course['date_end'] ?>" required type="date" class="form-control form-control-user" name="date_end" placeholder="Fecha de finalización">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Actualizar curso
                </button>
            </form>
        </div>
    </div>
</div>

@include ('admin_common/footer')