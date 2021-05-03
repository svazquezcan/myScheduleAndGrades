<?php
namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para los administradores.
 */


class AdminController
{
   
    /**
     * Muestra el listado de administradores.
     */
    public function index()
    {
        require 'models/Admin.php';
        $vars['admins'] = (new Admin())->getAll();
        return view('admins/index', $vars);
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
        return view('admins/create');
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
        return view('admins/edit', $vars);
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
