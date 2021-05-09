<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Student;
use App\Models\Course;

/**
 * Controlador para los estudiantes.
 */
class StudentController extends Controller
{
    /**
     * Muestra el listado de estudiantes.
     */
    public function index()
    {
        Security::adminRequired();
        $vars['students'] = (new Student())->getAll();
        return view('students/index', $vars);
    }

    /**
     * Registro del estudiante.
     */
    public function signup()
    {
        if ($_POST) {
            (new Student())->create($_POST);
            return redirect()->route('login', ['signup' => 'ok']);
        }
        $vars['courses'] = (new Course())->getAll();
        return view('students/signup', $vars);
    }

    /**
     * Crear estudiante.
     */
    public function create()
    {
        Security::adminRequired();
        if ($_POST) {
            (new Student())->create($_POST);
            return redirect()->route('student');
        }
        $vars['courses'] = (new Course())->getAll();
        return view('students/create', $vars);
    }

    /**
     * Editar estudiante.
     */
    public function edit()
    {
        if (!($_SESSION['role'] == 'student' && $_SESSION['user']['id'] == $_GET['id'])) {
            Security::adminRequired();
        }
        if ($_POST) {
            (new Student())->edit($_POST);
            return redirect()->route('student');
        }
        $vars['student'] = (new Student())->getById($_GET['id']);
        $vars['courses'] = (new Course())->getAll();
        return view('students/edit', $vars);
    }

    /**
     * Elimina un estudiante.
     */
    public function delete()
    {
        Security::adminRequired();
        (new Student())->delete($_GET['id']);
        return redirect()->route('student');
    }
}
