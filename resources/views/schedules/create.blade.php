<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="index.php?controller=schedule">Horarios</a>
        <small> > Crear</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="create">
            @csrf
            <div class="form-group">
                    <label for="exampleFormControlSelect2">Asignatura:</label>
                    <select required class="form-control" name="id_class">
                    @foreach ($subjects as $subject)
                            <option value="<?php echo $subject['id_class'] ?>"><?php echo $subject['name'] ?></option>
                    @endforeach
                    </select>
                </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Hora inicio:</label>                   
                <input required type="time" pattern="(0[89]|1[0-7]):[03]?0" class="form-control form-control-user" name="time_start" placeholder="Hora inicio">                                                
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Hora fin:</label>                   
                <input required type="time" pattern="(0[89]|1[0-7]):[03]?0" class="form-control form-control-user" name="time_end" placeholder="Hora fin">
            </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect2">Día:</label>                        
                    <input required type="date" maxlength="50" class="form-control form-control-user" name="day" placeholder="Día">
                </div>                        

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear horario
                </button>
            </form>
        </div>
    </div>
</div>

@include ('admin_common/footer')
<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>