<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'resources'. DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'header.php') ?>
@include ('admin_common/header')
<!-- Page Heading -->
        @if ($_SESSION['role'] == 'admin')    
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Horarios</h1>
        <a class="btn btn-primary" href="schedules/create"><i class="fas fa-plus"></i> Crear</a>
    </div>
        @endif

<!-- Calendar -->
<div class="d-flex justify-content-center">
    <div class="card shadow mb-4" style="max-width: 700px;">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>

@include ('admin_common/footer')
<?php //include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'admin_common ' . DIRECTORY_SEPARATOR  . 'footer.php') ?>
