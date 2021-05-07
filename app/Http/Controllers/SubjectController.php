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
        $vars['subjects'] = (new Subject())->getAll();
        $vars['teachers'] = (new Teacher())->getAll();        
        $vars['courses'] = (new Course())->getAll();

        return view('subjects/index', $vars);
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
