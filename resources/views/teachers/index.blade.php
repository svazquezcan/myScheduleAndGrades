<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profesores</h1>
    <a class="btn btn-primary" href="teachers/create"><i class="fas fa-plus"></i> Añadir</a>
</div>

<!-- Datatable-->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>NIF</th>
                        <th>Email</th>                        
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td><?php echo $teacher['id_teacher'] ?></td>
                            <td><?php echo $teacher['name'] ?></td>
                            <td><?php echo $teacher['surname'] ?></td>
                            <td><?php echo $teacher['telephone'] ?></td>
                            <td><?php echo $teacher['nif'] ?></td>
                            <td><?php echo $teacher['email'] ?></td>
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="teachers/edit?id=<?php echo $teacher['id_teacher'] ?>"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Se va a eliminar el registro. ¿Estás seguro?')"
                                    href="teachers/delete?id=<?php echo $teacher['id_teacher'] ?>"
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
