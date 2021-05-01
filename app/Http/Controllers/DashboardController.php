<?php

namespace App\Http\Controllers;

require 'libs/Security.php';
require 'models/Admin.php';
require 'models/Student.php';
require 'models/Course.php';
require 'models/Subject.php';
require 'models/Teacher.php';
require 'models/Branch.php';
require 'models/Schedule.php';

/**
 * Controlador para el dashboard.
 */

class DashboardController
{
    function __construct()
    {
        Security::adminRequired();
        $this->view = new View();
    }

    /**
     * Muestra la página de inicio del Dashboard.
     */
    public function index()
    {
        $vars['totalAdmins'] = (new Admin())->getTotal();
        $vars['totalStudents'] = (new Student())->getTotal();
        $vars['totalCourses'] = (new Course())->getTotal();
        $vars['totalSubjects'] = (new Subject())->getTotal();
        $vars['totalTeachers'] = (new Teacher())->getTotal();
        $vars['totalBranches'] = (new Branch())->getTotal();
        $vars['totalSchedules'] = (new Schedule())->getTotal();
        $this->view->show("dashboard/index.php", $vars);
    }
}
