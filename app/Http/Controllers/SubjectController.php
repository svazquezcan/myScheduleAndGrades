<?php

namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para las asignaturas.
 */

class SubjectController
{
    function __construct()
    {
        Security::adminRequired();
        $this->view = new View();
    }

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

        $this->view->show("subjects/index.php", $vars);
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

        $this->view->show("subjects/create.php", $vars);
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
        $this->view->show("subjects/edit.php", $vars);
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
