@include ('admin_common/header')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <a href="{{ route('subject.index') }}">Asignatura</a>
        <small> > Editar</small>
    </h1>
</div>

<!-- Content -->
<div class="d-flex justify-content-center">
    <div class="card shadow pt-3 pb-2">
        <div class="card-body">
            <form class="user" method="post" action="{{ route('subject.edit') }}">
                @csrf
                <input type="hidden" name="id_class" value="<?php echo $subject['id_class'] ?>"/>

                <div class="form-group">
                    <input value="<?php echo $subject['name'] ?>" required type="text" maxlength="40" class="form-control form-control-user" name="name" placeholder="Nombre de la asignatura">
                </div>  

                <div class="form-group">
                    <input value="<?php echo $subject['color'] ?>" required type="text" maxlength="40" class="form-control form-control-user" name="color" placeholder="Color de la asignatura">
                </div>               

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Actualizar asignatura
                </button>
            </form>
        </div>
    </div>
</div>
@include ('admin_common/footer')
