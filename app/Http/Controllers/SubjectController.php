<?php

namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para las asignaturas.
 */

class SubjectController
{

    /**
     * Muestra el listado de asignaturas.
     */
    public function index()
    {
        Security::adminRequired();
        require 'models/Subject.php';
        $vars['subjects'] = (new Subject())->getAll();
        require 'models/Teacher.php';
        $vars['teachers'] = (new Teacher())->getAll();        
        require 'models/Course.php';
        $vars['courses'] = (new Course())->getAll();

        return view('subjects/index', $vars);
    }

    /**
     * Crear asignatura.
     */
    public function create()
    {
        Security::adminRequired();
        if ($_POST) {
            require 'models/Subject.php';
            (new Subject())->create($_POST);            
            header('Location: index.php?controller=subject');
        }
        require 'models/Teacher.php';
        $vars['teachers'] = (new Teacher())->getAll();
        require 'models/Course.php';
        $vars['courses'] = (new Course())->getAll();
        require 'models/Branch.php';
        $vars['branches'] = (new Branch())->getAll();

        return view('subjects/create', $vars);
    }

    /**
     * Editar asignatura.
     */
    public function edit()
    {
        require 'models/Subject.php';
        if ($_POST) {
            (new Subject())->edit($_POST);
            header('Location: index.php?controller=subject');
        }
        $vars['subject'] = (new Subject())->getById($_GET['id']);
        return view('subjects/edit', $vars);
    }

    /**
     * Elimina una asignatura.
     */
    public function delete()
    {
        Security::adminRequired();
        if($_GET) {
            require 'models/Subject.php';
            (new Subject())->delete($_GET['id']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
