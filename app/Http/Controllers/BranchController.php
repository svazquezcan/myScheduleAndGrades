<?php

namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para las ramas.
 */

class BranchController
{
    function __construct()
    {
        Security::adminRequired();
        $this->view = new View();
    }
    
    /**
     * Muestra el listado de ramas.
     */
    public function index()
    {
        require 'models/Branch.php';
        $vars['branches'] = (new Branch())->getAll();
        $this->view->show("branches/index.php", $vars);
    }

    /**
     * Crear rama.
     */
    public function create()
    {
        Security::adminRequired();
        if ($_POST) {
            require 'models/Branch.php';
            (new Branch())->create($_POST);
            header('Location: index.php?controller=branch');
        }
        require 'models/Branch.php';
        $vars['branches'] = (new Branch())->getAll();
        $this->view->show("branches/create.php", $vars);
    }

    /**
     * Editar rama.
     */
    public function edit()
    {
        require 'models/Branch.php';
        if ($_POST) {
            (new Branch())->edit($_POST);
            header('Location: index.php?controller=branch');
        }
        $vars['branch'] = (new Branch())->getById($_GET['id']);
        $this->view->show("branches/edit.php", $vars);
    }

    /**
     * Elimina una rama.
     */
    public function delete()
    {
        Security::adminRequired();
        if($_GET) {
            require 'models/Branch.php';
            (new Branch())->delete($_GET['id']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

}
