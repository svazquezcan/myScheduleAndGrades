@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="{{ route('student.index') }}">Estudiantes</a>
        <small> > Crear</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="{{ route('student.create') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="text" maxlength="20" class="form-control form-control-user" name="username" placeholder="Nombre de usuario">
                    </div>
                    <div class="col-sm-6">
                        <input required type="password" minlength="4" maxlength="8" class="form-control form-control-user" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="text" maxlength="20" class="form-control form-control-user" name="name" placeholder="Nombre">
                    </div>
                    <div class="col-sm-6">
                        <input required type="text" maxlength="50" class="form-control form-control-user" name="surname" placeholder="Apellidos">
                    </div>
                </div>

                <div class="form-group">
                    <input required type="email" maxlength="150" class="form-control form-control-user" name="email" placeholder="Correo electrónico">
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
                    <label for="exampleFormControlSelect2">Cursos en los que estás matriculado:</label>
                    <select required multiple class="form-control" name="id_courses[]">
                        @foreach ($courses as $course)
                            <option value="<?php echo $course['id_course'] ?>"><?php echo $course['name'] ?></option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear estudiante
                </button>
            </form>
        </div>
    </div>
</div>

@include ('admin_common/footer')
