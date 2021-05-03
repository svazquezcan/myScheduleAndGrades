<?php

namespace App\Http\Controllers;


require 'libs/Security.php';

/**
 * Controlador para los eventos
 */

class EventController
{
    /**
     * Muestra el listado de horarios.
     */
    public function index()
    {
        require 'models/Event.php';
        return view('schedules/index');
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