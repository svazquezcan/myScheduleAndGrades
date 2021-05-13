<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Admin;

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
        Security::mustBe(['admin']);
        $vars['admins'] = (new Admin())->getAll();
        return view('admins/index', $vars);
    }

    /**
     * Crear administrador.
     */
    public function create()
    {
        Security::mustBe(['admin']);
        if ($_POST) {
            (new Admin())->create($_POST);
            return redirect()->route('admin.index');
        }
        return view('admins/create');
    }

    /**
     * Editar administrador.
     */
    public function edit()
    {
        Security::mustBe(['admin']);
        if ($_POST) {
            (new Admin())->edit($_POST);
            return redirect()->route('admin.index');
        }
        $vars['admin'] = (new Admin())->getById($_GET['id']);
        return view('admins/edit', $vars);
    }

    /**
     * Elimina un administrador.
     */
    public function delete()
    {
        Security::mustBe(['admin']);
        (new Admin())->delete($_GET['id']);
        return redirect()->route('admin.index');
    }
}
