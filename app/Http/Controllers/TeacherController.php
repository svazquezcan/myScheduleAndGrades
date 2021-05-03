<?php

namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para los profesores.
 */


class TeacherController
{

    /**
     * Muestra el listado de profesores.
     */
    public function index()
    {
        Security::adminRequired();
        require 'models/Teacher.php';
        $vars['teachers'] = (new Teacher())->getAll();
        return view('teachers/index', $vars);
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
        return view('teachers/create');
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
        return view('teachers/edit.php', $vars);
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
