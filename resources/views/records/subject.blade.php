@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="{{ route('record.index') }}">Expediente</a>
        <small> > Asignatura (<?php echo $subject['name'] ?>)</small>
    </h1>
</div>

<!-- Table -->
<div class="card shadow mb-4">
    <div class="card-body">
        <h4>Trabajos</h4>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id trabajo</th>
                        <th>Nombre</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td><?php echo $work['id_work'] ?></td>
                            <td><?php echo $work['name'] ?></td>
                            <td><?php echo $work['mark'] ?></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <h4>Exámenes</h4>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id examen</th>
                        <th>Nombre</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <td><?php echo $exam['id_exam'] ?></td>
                            <td><?php echo $exam['name'] ?></td>
                            <td><?php echo $exam['mark'] ?></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <h4>Nota final de la asignatura</h4>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nota media productos</th>
                        <th>Nota media exámenes</th>
                        <th>Valor evaluación continua (<?php echo $percentages['continuous_assessment'] ?>%)</th>
                        <th>Valor examenes (<?php echo $percentages['exams'] ?>%)</th>
                        <th>Nota final</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $final['works']['media'] ?></td>
                        <td><?php echo $final['exams']['media'] ?></td>
                        <td><?php echo $final['works']['valor'] ?></td>
                        <td><?php echo $final['exams']['valor'] ?></td>
                        <td><?php echo $final['mark'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@include ('admin_common/footer')
