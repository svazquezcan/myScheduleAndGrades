<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Event;

/**
 * Controlador para los eventos
 */

class EventController extends Controller
{
    /**
     * Muestra el listado de horarios.
     */
    public function index()
    {
        return view('schedules/index');
    }

    /**
     * Pinta los eventos en el calendario.
     */
    public function load()
    {
        $data =  (new Event())->getEvents();
        echo json_encode($data);
            
    }

    public function delete()
    {
        (new Event())->deleteEvents();    
    }
    
    public function insert( )
    {
        (new Event())->insertEvents();    
    }

    
    public function update()
    {
        (new Event())->updateEvents();    
    }
}
