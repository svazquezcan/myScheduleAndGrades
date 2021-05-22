<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Branch;
use App\Models\Percentage;

/**
 * Controlador para las asignaturas.
 */

class SubjectController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        Security::mustBe(['admin', 'teacher']);
    }

    /**
     * Muestra el listado de asignaturas.
     */
    public function index()
    {
        // Si se ha iniciado sesión como un profesor,
        // solo se muestran las asignaturas que imparte el mismo.
        if ($_SESSION['role'] == 'teacher') {
            $subjects = (new Subject())->getAllByTeacher($_SESSION['user']['id_teacher']);

        // Si no, mostramos todas las asignaturas.
        } else {
            $subjects = (new Subject())->getAll();
        }

        $vars['subjects'] = array();
        $lengthSubjects = count($subjects);
        for ($i = 0; $i < $lengthSubjects; $i++) {
            $subject = $subjects[$i];
            $course = (new Course())->getById($subjects[$i]['id_course']);
            $teacher = (new Teacher())->getById($subjects[$i]['id_teacher']);
            $subject['teacher_name'] = $teacher['name'];
            $subject['teacher_surname'] = $teacher['surname'];
            $subject['course_name'] = $course['name'];
            array_push($vars['subjects'],$subject);
        }   
        return view('subjects/index', $vars);
    }

    /**
     * Crear asignatura.
     */
    public function create()
    {
        if ($_POST) {
            (new Subject())->create($_POST);            
            return redirect()->route('subject.index');
        }
        $vars['teachers'] = (new Teacher())->getAll();
        $vars['courses'] = (new Course())->getAll();
        $vars['branches'] = (new Branch())->getAll();
        return view('subjects/create', $vars);
    }

    /**
     * Editar asignatura.
     */
    public function edit()
    {
        if ($_POST) {
            (new Subject())->edit($_POST);
            return redirect()->route('subject.index');
        }
        $vars['subject'] = (new Subject())->getSubjectById($_GET['id']);
        return view('subjects/edit', $vars);
    }

    /**
     * Elimina una asignatura.
     */
    public function delete()
    {
        if($_GET) {
            (new Subject())->delete($_GET['id']);
            return redirect()->route('subject.index');
        }
    }

    /**
     * Muestra los trabajos y los exámenes de una asignatura.
     */
    public function showWorksAndExams($id)
    {
        Security::mustBe(['admin', 'teacher']);

        $vars['subject'] = (new Subject())->getSubjectById($id);
        $vars['works'] = (new Subject())->getWorksBySubject($id);
        $vars['exams'] = (new Subject())->getExamsBySubject($id);
        $vars['percentages'] = (new Percentage())->getPercentagesBySubjectId($id);

        return view('subjects/works_and_exams', $vars);
    }
}
