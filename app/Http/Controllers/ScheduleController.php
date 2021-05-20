<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Schedule;
use App\Models\Subject;

/**
 * Controlador para los horarios.
 */
class ScheduleController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        Security::mustBe(['admin', 'teacher', 'student']);
    }

    /**
     * Muestra el listado de horarios.
     */
    public function index()
    {
        return view('schedules/index');
    }

    /**
     * Carga de horarios.
     */
    public function load()
    {
        $data =  (new Schedule())->getSchedule($_SESSION['user']['id']); 
        echo json_encode($data);
    }
    
    /**
     * Crear registro de horario.
     */
    public function create() 
    {
        if ($_POST) {
            (new Schedule())->create($_POST);
            return redirect()->route('schedule.index');
        }
        $vars['subjects'] = (new Subject())->getAll();
        return view('schedules/create', $vars);
    }
}
