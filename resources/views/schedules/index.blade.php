@include ('admin_common/header')

<!-- Page Heading -->
@if ($_SESSION['role'] == 'admin')    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Horarios</h1>
        <a class="btn btn-primary" href="{{ route('schedule.create') }}"><i class="fas fa-plus"></i> Crear</a>
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
