<?php

namespace App\Http\Controllers;

//require 'libs/Security.php';

/**
 * Controlador para los estudiantes.
 */

class StudentController
{
    /**
     * Muestra el listado de estudiantes.
     */
    public function index()
    {
        //Security::adminRequired();
        require 'models/Student.php';
        $vars['students'] = (new Student())->getAll();
        return view('students/index', $vars);
    }

    /**
     * Registro del estudiante.
     */
    public function signup()
    {
        if ($_POST) {
            require 'models/Student.php';
            (new Student())->create($_POST);
            header('Location: index.php?controller=user&action=login&signup=ok');
        }
        require 'Models/Course.php';
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
        require '../../models/Course.php';
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
        require 'models/Student.php';
        if ($_POST) {
            (new Student())->edit($_POST);
            header('Location: index.php?controller=student');
        }
        $vars['student'] = (new Student())->getById($_GET['id']);
        require 'models/Course.php';
        $vars['courses'] = (new Course())->getAll();
        return view('students/edit', $vars);
    }

    /**
     * Elimina un estudiante.
     */
    public function delete()
    {
        Security::adminRequired();
        require 'models/Student.php';
        (new Student())->delete($_GET['id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
