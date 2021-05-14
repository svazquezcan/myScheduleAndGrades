@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cursos</h1>
    <a class="btn btn-primary" href="{{ route('course.create') }}"><i class="fas fa-plus"></i> Crear</a>
</div>

<!-- Datatable -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td><?php echo $course['id_course'] ?></td>
                            <td><?php echo $course['name'] ?></td>
                            <td><?php echo $course['description'] ?></td>
                            <td><?php echo $course['date_start'] ?></td>
                            <td><?php echo $course['date_end'] ?></td>
                            <td>
                                <?php if ($course['active']): ?>
                                    Sí
                                <?php else: ?>
                                    No
                                <?php endif ?>
                            </td>
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="{{ route('course.edit') }}?id=<?php echo $course['id_course'] ?>"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Se va a eliminar el registro. ¿Estás seguro?')"
                                    href="{{ route('course.delete') }}?id=<?php echo $course['id_course'] ?>"
                                    title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include ('admin_common/footer')
