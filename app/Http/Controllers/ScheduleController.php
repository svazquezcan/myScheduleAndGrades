<?php

namespace App\Http\Controllers;

require 'libs/Security.php';

/**
 * Controlador para los horarios.
 */

class ScheduleController
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
        require 'models/Schedule.php';
        $this->view->show("schedules/index.php");
    }

    public function load()
    {
        require 'models/Schedule.php';
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

        $this->view->show("schedules/create.php", $vars);
    }
}
