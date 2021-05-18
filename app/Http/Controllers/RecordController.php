<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Record;
use App\Models\Subject;

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

    /**
     * Muestra los trabajos y los exámenes del alumno para una asignatura.
     */
    public function subject($id)
    {
        $vars['subject'] = (new Subject())->getById($id);
        $vars['works'] = (new Record())->getWorks($_SESSION['user']['id'], $id);
        $vars['exams'] = (new Record())->getExams($_SESSION['user']['id'], $id);
        return view('records/subject', $vars);
    }
}
