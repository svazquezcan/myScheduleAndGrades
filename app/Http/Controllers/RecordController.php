<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Record;
use App\Models\Subject;
use App\Models\Percentage;

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
        $vars['subject'] = (new Subject())->getSubjectById($id);
        $vars['works'] = (new Record())->getWorks($_SESSION['user']['id'], $id);
        $vars['exams'] = (new Record())->getExams($_SESSION['user']['id'], $id);
        $vars['percentages'] = (new Percentage())->getPercentagesBySubjectId($id);
        $vars['final'] = [
            'works' => ['counter' => 0, 'total' => 0],
            'exams' => ['counter' => 0, 'total' => 0]
        ];
        foreach ($vars['works'] as $work) {
            $vars['final']['works']['total'] += $work['mark'];
            $vars['final']['works']['counter']++;
        }
        foreach ($vars['exams'] as $exam) {
            $vars['final']['exams']['total'] += $exam['mark'];
            $vars['final']['exams']['counter']++;
        }

        $vars['final']['works']['media'] = number_format($vars['final']['works']['total'] / $vars['final']['works']['counter'], 1);
        $vars['final']['exams']['media'] = number_format($vars['final']['exams']['total'] / $vars['final']['exams']['counter'], 1);
        $vars['final']['works']['valor'] = number_format($vars['final']['works']['media'] * $vars['percentages']['continuous_assessment'] / 100, 1);
        $vars['final']['exams']['valor'] = number_format($vars['final']['exams']['media'] * $vars['percentages']['exams'] / 100, 1);
        $vars['final']['mark'] = number_format($vars['final']['works']['valor'] + $vars['final']['exams']['valor'], 1);
        return view('records/subject', $vars);
    }
}
