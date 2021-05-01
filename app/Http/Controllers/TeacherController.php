<?php

namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para los profesores.
 */


class TeacherController
{
    function __construct()
    {
        Security::adminRequired();
        $this->view = new View();
    }

    /**
     * Muestra el listado de profesores.
     */
    public function index()
    {
        Security::adminRequired();
        require 'models/Teacher.php';
        $vars['teachers'] = (new Teacher())->getAll();
        $this->view->show("teachers/index.php", $vars);
    }

    /**
     * Crear profesor.
     */
    public function create()
    {
        Security::adminRequired();
        if ($_POST) {
            require 'models/Teacher.php';
            (new Teacher())->create($_POST);
            header('Location: index.php?controller=teacher');
        }
        $this->view->show("teachers/create.php");
    }

    /**
     * Editar profesor.
     */
    public function edit()
    {
        Security::adminRequired();

        require 'models/Teacher.php';
        if ($_POST) {
            (new Teacher())->edit($_POST);
            header('Location: index.php?controller=teacher');
        }
        $vars['teacher'] = (new Teacher())->getById($_GET['id']);        
        $this->view->show("teachers/edit.php", $vars);
    }

    /**
     * Elimina un profesor.
     */
    public function delete()
    {
        Security::adminRequired();
        if ($_GET) {
            require 'models/Teacher.php';
            (new Teacher())->delete($_GET['id']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        
    }
   
}
