<?php

namespace App\Http\Controllers;

//require 'libs/Security.php';
//require 'models/Admin.php';
//require 'models/Student.php';
//require 'models/Course.php';
//require 'models/Subject.php';
//require 'models/Teacher.php';
//require 'models/Branch.php';
//require 'models/Schedule.php';

use App\Models\Student;
use App\Models\Admin;  
use App\Models\Subject;  
use App\Models\Teacher;  
use App\Models\Branch;  
use App\Models\Schedule;  
use App\Models\Course;  
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/**
 * Controlador para el dashboard.
 */

class DashboardController
{
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
        return view('dashboard/index', $vars);
    }
}
