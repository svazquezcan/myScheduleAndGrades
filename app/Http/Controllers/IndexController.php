<?php
/**
 * Controlador para la página de inicio.
 */
namespace App\Http\Controllers;

class IndexController
{
    function __construct()
    {
        $this->view = new View();
    }

    /**
     * Muestra la página de inicio.
     */
    public function index()
    {
        $this->view->show("index/index.php");
    }
}
