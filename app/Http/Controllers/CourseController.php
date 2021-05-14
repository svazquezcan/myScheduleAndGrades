<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Course;

/**
 * Controlador para los cursos.
 */
class CourseController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        Security::mustBe(['admin']);
    }

    /**
     * Muestra el listado de cursos.
     */
    public function index()
    {
        $vars['courses'] = (new Course())->getAll();
        return view('courses/index', $vars);
    }

    /**
     * Crear curso.
     */
    public function create()
    {
        if ($_POST) {
            (new Course())->create($_POST);
            return redirect()->route('course.index');
        }
        return view('courses/create');
    }

    /**
     * Editar curso.
     */
    public function edit()
    {
        if ($_POST) {

            /*
            // Comprobamos que el usuario a entrado un estado del curso valido
            if ($_POST[$course['active']] == "Activo" || $_POST[$course['active']] == "activo") {
                $_POST[$course['active']] = 1;
            } else if ($_POST[$course['active']] == "Inactivo" || $_POST[$course['active']] == "inactivo") {
                $_POST[$course['active']] = 0;
            } else {
                // El estado introducido no es válido
                $vars['course'] = (new Course())->getById($_GET['id']);
                $this->view->show("courses/edit.php", $vars);
            }
            */

            (new Course())->edit($_POST);
            return redirect()->route('course.index');
        }
        $vars['course'] = (new Course())->getById($_GET['id']);
        return view('courses/edit', $vars);
    }

    /**
     * Elimina un curso.
     */
    public function delete()
    {
        (new Course())->delete($_GET['id']);
        return redirect()->route('course.index');
    }
}
