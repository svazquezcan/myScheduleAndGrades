<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Branch;

/**
 * Controlador para las ramas.
 */

class BranchController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        Security::mustBe(['admin']);
    }

    /**
     * Muestra el listado de ramas.
     */
    public function index()
    {
        $vars['branches'] = (new Branch())->getAll();
        return view('branches/index', $vars);
    }

    /**
     * Crear rama.
     */
    public function create()
    {
        if ($_POST) {
            (new Branch())->create($_POST);
            return redirect()->route('branch.index');
        }
        $vars['branches'] = (new Branch())->getAll();
        return view('branches/create', $vars);
    }

    /**
     * Editar rama.
     */
    public function edit()
    {
        if ($_POST) {
            (new Branch())->edit($_POST);
            return redirect()->route('branch.index');
        }
        $vars['branch'] = (new Branch())->getById($_GET['id']);
        return view('branches/edit', $vars);
    }

    /**
     * Elimina una rama.
     */
    public function delete()
    {
        if ($_GET) {
            (new Branch())->delete($_GET['id']);
            return redirect()->route('branch.index');
        }
    }
}
