<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        if (isset($_SESSION['user']['id'])) {
            $data = (new Event())->getEvents($_SESSION['user']['id']);
            echo json_encode($data);
        }
    }

    public function delete()
    {
        (new Event())->deleteEvents($_SESSION['user']['id']);    
    }
    
    public function insert( )
    {
        (new Event())->insertEvents($_SESSION['user']['id']);    
    }

    
    public function update()
    {
        (new Event())->updateEvents($_SESSION['user']['id']);    
    }
}
