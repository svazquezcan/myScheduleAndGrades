@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ramas</h1>
    <a class="btn btn-primary" href="{{ route('branch.create') }}"><i class="fas fa-plus"></i> Crear</a>
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
                        <th>Acciones</th>                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                        <tr>
                            <td><?php echo $branch['id_branch'] ?></td>
                            <td><?php echo $branch['name'] ?></td>                            
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="{{ route('branch.edit') }}?id=<?php echo $branch['id_branch'] ?>"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Se va a eliminar el registro. ¿Estás seguro?')"
                                    href="{{ route('branch.delete') }}?id=<?php echo $branch['id_branch'] ?>"
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
