@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Expediente</h1>
</div>

<p>Hola, <?php echo $_SESSION['user']['name'] ?>. Estos son los <strong>cursos</strong> en los que estás inscrito y sus <strong>asignaturas</strong>:</p>

<!-- Table -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id curso</th>
                        <th>Curso</th>
                        <th>Id asignatura</th>
                        <th>Asignatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td><?php echo $record['id_course'] ?></td>
                            <td><?php echo $record['course'] ?></td>
                            <td><?php echo $record['id_class'] ?></td>
                            <td><?php echo $record['subject'] ?></td>
                            <td><a href="{{ route('record.subject', ['id' => $record['id_class']]) }}" class="btn btn-primary btn-sm">Calificaciones</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include ('admin_common/footer')
