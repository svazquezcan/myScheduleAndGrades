<?php

namespace App\Http\Controllers;

//require 'libs/Security.php';
use App\Models\Student;
use App\Models\Course;  
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



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
        //Security::adminRequired();
        $vars['students'] = (new Student())->getAll();
        return view('students/index', $vars);
    }

    /**
     * Registro del estudiante.
     */
    public function signup()
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        /*if ($_POST) {
            (new Student())->create($_POST);
            header('Location: index.php?controller=user&action=login&signup=ok');
        }*/
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
            require 'models/Student.php';
            (new Student())->create($_POST);
            header('Location: index.php?controller=student');
        }
        $vars['courses'] = (new Course())->getAll();
        return view('students/create', $vars);
    }

    /**
     * Editar estudiante.
     */
    public function edit()
    {
        /*if (!($_SESSION['role'] == 'student' && $_SESSION['user']['id'] == $_GET['id'])) {
            Security::adminRequired();
        }*/
        if ($_POST) {
            (new Student())->edit($_POST);
            header('Location: index.php?controller=student');
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
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
