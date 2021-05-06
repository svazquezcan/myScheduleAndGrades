<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



//require 'libs/Security.php';

/**
 * Controlador para los horarios.
 */


class ScheduleController
{

    /**
     * Muestra el listado de horarios.
     */
    public function index()
    {
        //require 'models/Schedule.php';
        return view('schedules/index');
    }

    public function load()
    {
        //require 'Models/Schedule.php';
        $data =  (new Schedule())->getSchedule(); 
        echo json_encode($data);
            
    }
    
    public function create() 
    {
        Security::adminRequired();
        if ($_POST) {
            require 'models/Schedule.php';
            (new Schedule())->create($_POST);
            header('Location: index.php?controller=schedule');
        }
        require 'models/Subject.php';
        $vars['subjects'] = (new Subject())->getAll();

        return view('schedules/create', $vars);
    }
}
