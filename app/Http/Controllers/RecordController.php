<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Record;

/**
 * Controlador para el expediente del estudiante.
 */
class RecordController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        Security::mustBe(['student']);
    }

    /**
     * Muestra el listado de cursos en los que está inscrito el
     * estudiante y sus asignaturas.
     */
    public function index()
    {
        $vars['records'] = (new Record())->getRecord($_SESSION['user']['id']);
        return view('records/index', $vars);
    }
}
