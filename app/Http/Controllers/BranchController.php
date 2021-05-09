<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
/**
 * Controlador para las ramas.
 */

class BranchController extends Controller
{
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
        //Security::adminRequired();
        if ($_POST) {
            (new Branch())->create($_POST);
            return redirect()->route('branches');
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
            return redirect()->route('branches');
        }
        $vars['branch'] = (new Branch())->getById($_GET['id']);
        return view('branches/edit', $vars);
    }

    /**
     * Elimina una rama.
     */
    public function delete()
    {
        //Security::adminRequired();
        if($_GET) {
            (new Branch())->delete($_GET['id']);
            return redirect()->route('branches');
        }
    }

}
