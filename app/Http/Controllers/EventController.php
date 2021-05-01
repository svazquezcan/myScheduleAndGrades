<?php

namespace App\Http\Controllers;


require 'libs/Security.php';

/**
 * Controlador para los eventos
 */

class EventController
{
    function __construct()
    {
        Security::loggedInRequired();
        $this->view = new View();
    }

    /**
     * Muestra el listado de horarios.
     */
    public function index()
    {
        require 'models/Event.php';
        $this->view->show("schedules/index.php");
    }

    /**
     * Pinta los eventos en el calendario.
     */
    public function load()
    {
        require 'models/Event.php';
        $data =  (new Event())->getEvents();
        echo json_encode($data);
            
    }

    public function delete()
    {
        require 'models/Event.php';
        (new Event())->deleteEvents();    
    }

    
    public function insert( )
    {
        require 'models/Event.php';
        (new Event())->insertEvents();    
    }

    
    public function update()
    {
        require 'models/Event.php';
        (new Event())->updateEvents();    
    }
}

?>