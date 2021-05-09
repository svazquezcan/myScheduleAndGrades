<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * Controlador para la página de inicio.
 */
class HomeController extends Controller
{

    /**
     * Muestra la página de inicio.
     */
    public function index()
    {
        return view('home/index');
    }
}
