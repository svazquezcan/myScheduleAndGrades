<?php
/**
 * Controlador para la página de inicio.
 */
namespace App\Http\Controllers;

class IndexController
{

    /**
     * Muestra la página de inicio.
     */
    public function index()
    {
        return view('index/index');
    }
}
