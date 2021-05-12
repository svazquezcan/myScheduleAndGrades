<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Teacher;

/**
 * Controlador para los profesores.
 */
class TeacherController extends Controller
{
    /**
     * Muestra el listado de profesores.
     */
    public function index()
    {
        Security::adminRequired();
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
            (new Teacher())->create($_POST);
            return redirect()->route('teacher.index');
        }
        return view('teachers/create');
    }

    /**
     * Editar profesor.
     */
    public function edit()
    {
        Security::adminRequired();
        if ($_POST) {
            (new Teacher())->edit($_POST);
            return redirect()->route('teacher.index');
        }
        $vars['teacher'] = (new Teacher())->getById($_GET['id']);
        return view('teachers/edit', $vars);
    }

    /**
     * Elimina un profesor.
     */
    public function delete()
    {
        Security::adminRequired();
        if ($_GET) {
            (new Teacher())->delete($_GET['id']);
            return redirect()->route('teacher.index');
        }
    }
}
