<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Asignaturas</h1>
    <a class="btn btn-primary" href="index.php?controller=subject&action=create"><i class="fas fa-plus"></i> Crear</a>
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
                        <th>Profesor</th>       
                        <th>Curso</th>   
                        <th>Acciones</th>              
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject) 
                    @foreach ($teachers as $teacher) 
                    @foreach($courses as $course)
                        <tr>
                            <td><?php echo $subject['id_class'] ?></td>
                            <td><?php echo $subject['name'] ?></td>  
                            <td>
                                <?php echo $teacher['name'] ?>
                                <?php echo $teacher['surname'] ?>                                                                                    
                            </td>
                            <td>
                                <?php echo $course['name'] ?>  
                            </td>                                                                                  
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="index.php?controller=subject&action=edit&id=<?php echo $subject['id_class'] ?>"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Se va a eliminar el registro. ¿Estás seguro?')"
                                    href="index.php?controller=subject&action=delete&id=<?php echo $subject['id_class'] ?>"
                                    title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach           
                        @endforeach                  
                        @endforeach                  
                </tbody>
            </table>
        </div>
    </div>
</div>

@include ('admin_common/footer')
<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>
