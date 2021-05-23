@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Asignaturas</h1>
    <a class="btn btn-primary" href="{{ route('subject.create') }}"><i class="fas fa-plus"></i> Crear</a>
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
                        <tr>
                            <td><?php echo $subject['id_class'] ?></td>
                            <td><?php echo $subject['name'] ?></td>  

                            <td>
                                <?php echo $subject['teacher_name'] ?>
                                <?php echo $subject['teacher_surname'] ?>                                                                                    
                            </td>

                            <td>
                                <?php echo $subject['course_name'] ?>  
                            </td>   
                            <td>
                                <a 
                                    href="{{ route('subject.showWorksAndExams', ['id' => $subject['id_class']]) }}"  
                                    class="btn btn-primary btn-sm" 
                                    title="Información">                                  
                                    <i class="fa fa-info-circle"></i>                                    
                                </a>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="{{ route('subject.edit') }}?id=<?php echo $subject['id_class'] ?>"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Se va a eliminar el registro. ¿Estás seguro?')"
                                    href="{{ route('subject.delete') }}?id=<?php echo $subject['id_class'] ?>"
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
