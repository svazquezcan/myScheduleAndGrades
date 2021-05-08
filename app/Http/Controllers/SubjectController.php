<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Controlador para las asignaturas.
 */

class SubjectController extends Controller
{

    /**
     * Muestra el listado de asignaturas.
     */
    public function index()
    {
        //Security::adminRequired();
        $subjects = (new Subject())->getAll();
        $teachers = (new Teacher())->getAll();        
        $courses = (new Course())->getAll();
        $var['subjects'] = array();

        $lengthSubjects = count($subjects);

        for ($i = 0; $i < $lengthSubjects; $i++) {
            $subject = $subjects[$i];
            $course = (new Course())->getById($subjects[$i]['id_course']);
            $teacher = (new Teacher())->getById($subjects[$i]['id_teacher']);
            $subject['teacher_name'] = $teacher['name'];
            $subject['teacher_surname'] = $teacher['surname'];
            $subject['course_name'] = $course['name'];
            array_push($var['subjects'],$subject);

        }   
        
        return view('subjects/index', $var);
    }

    /**
     * Crear asignatura.
     */
    public function create()
    {
        //Security::adminRequired();
        if ($_POST) {
            (new Subject())->create($_POST);            
            return redirect()->route('classes');
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
            return redirect()->route('classes');
        }
        $vars['subject'] = (new Subject())->getById($_GET['id']);
        return view('subjects/edit', $vars);
    }

    /**
     * Elimina una asignatura.
     */
    public function delete()
    {
        //Security::adminRequired();
        if($_GET) {
            (new Subject())->delete($_GET['id']);
            return redirect()->route('classes');
        }
    }
}
