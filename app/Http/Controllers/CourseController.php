<?php
namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para los cursos.
 */

class CourseController
{
    function __construct()
    {
        Security::adminRequired();
        $this->view = new View();
    }

    /**
     * Muestra el listado de cursos.
     */
    public function index()
    {
        require 'models/Course.php';
        $vars['courses'] = (new Course())->getAll();
        $this->view->show("courses/index.php", $vars);
    }

    /**
     * Crear curso.
     */
    public function create()
    {
        if ($_POST) {
            require 'models/Course.php';
            (new Course())->create($_POST);
            header('Location: index.php?controller=course');
        }
        $this->view->show("courses/create.php");
    }

    /**
     * Editar curso.
     */
    public function edit()
    {
        require_once 'models/Course.php';
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
            header('Location: index.php?controller=course');
        }
        $vars['admin'] = (new Course())->getById($_GET['id']);
        $this->view->show("courses/edit.php", $vars);
    }

    /**
     * Elimina un curso.
     */
    public function delete()
    {
        require 'models/Course.php';
        (new Course())->delete($_GET['id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
