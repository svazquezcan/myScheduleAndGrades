<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Estudiantes</h1>
    <a class="btn btn-primary" href="students/create"><i class="fas fa-plus"></i> Crear</a>
</div>

<!-- Datatable -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre de usuario</th>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>NIF</th>
                        <th>Fecha alta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td><?php echo $student['id'] ?></td>
                            <td><?php echo $student['username'] ?></td>
                            <td><?php echo $student['email'] ?></td>
                            <td><?php echo $student['name'] ?></td>
                            <td><?php echo $student['surname'] ?></td>
                            <td><?php echo $student['telephone'] ?></td>
                            <td><?php echo $student['nif'] ?></td>
                            <td><?php echo date( 'd/m/Y', strtotime('+2 hours', strtotime($student['date_registered']))) ?></td>
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="students/edit?id=<?php echo $student['id'] ?>"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Se va a eliminar el registro. ¿Estás seguro?')"
                                    href="students/delete?id=<?php echo $student['id'] ?>"
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
<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>
