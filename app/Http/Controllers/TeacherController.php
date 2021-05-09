<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        //Security::adminRequired();
        //require 'models/Teacher.php';
        $vars['teachers'] = (new Teacher())->getAll();
        return view('teachers/index', $vars);
    }

    /**
     * Crear profesor.
     */
    public function create()
    {
        //Security::adminRequired();
        if ($_POST) {
            //require 'models/Teacher.php';
            (new Teacher())->create($_POST);
            return redirect()->route('teachers');
        }
        return view('teachers/create');
    }

    /**
     * Editar profesor.
     */
    public function edit()
    {
        //Security::adminRequired();

        //require 'models/Teacher.php';
        if ($_POST) {
            (new Teacher())->edit($_POST);
            return redirect()->route('teachers');
        }
        $vars['teacher'] = (new Teacher())->getById($_GET['id']);        
        return view('teachers/edit', $vars);
    }

    /**
     * Elimina un profesor.
     */
    public function delete()
    {
        //Security::adminRequired();
        if ($_GET) {
            //require 'models/Teacher.php';
            (new Teacher())->delete($_GET['id']);
            return redirect()->route('teachers');
        }
        
    }
   
}
