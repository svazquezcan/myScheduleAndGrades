<?php
namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para los administradores.
 */


class AdminController
{
    function __construct()
    {
        Security::adminRequired();
        $this->view = new View();
    }

    /**
     * Muestra el listado de administradores.
     */
    public function index()
    {
        require 'models/Admin.php';
        $vars['admins'] = (new Admin())->getAll();
        $this->view->show("admins/index.php", $vars);
    }

    /**
     * Crear administrador.
     */
    public function create()
    {
        if ($_POST) {
            require 'models/Admin.php';
            (new Admin())->create($_POST);
            header('Location: index.php?controller=admin');
        }
        $this->view->show("admins/create.php");
    }

    /**
     * Editar administrador.
     */
    public function edit()
    {
        require 'models/Admin.php';
        if ($_POST) {
            (new Admin())->edit($_POST);
            header('Location: index.php?controller=admin');
        }
        $vars['admin'] = (new Admin())->getById($_GET['id']);
        $this->view->show("admins/edit.php", $vars);
    }

    /**
     * Elimina un administrador.
     */
    public function delete()
    {
        require 'models/Admin.php';
        (new Admin())->delete($_GET['id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
