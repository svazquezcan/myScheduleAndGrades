<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Controlador para los administradores.
 */


class AdminController extends Controller
{
   
    /**
     * Muestra el listado de administradores.
     */
    public function index()
    {
        $vars['admins'] = (new Admin())->getAll();
        return view('admins/index', $vars);
    }

    /**
     * Crear administrador.
     */
    public function create()
    {
        if ($_POST) {
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
        (new Admin())->delete($_GET['id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
