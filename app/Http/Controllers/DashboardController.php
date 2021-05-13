<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Libs\Security;
use App\Models\Student;
use App\Models\Admin;  
use App\Models\Subject;  
use App\Models\Teacher;  
use App\Models\Branch;  
use App\Models\Schedule;  
use App\Models\Course;  

/**
 * Controlador para el dashboard.
 */
class DashboardController extends Controller
{
    /**
     * Muestra la página de inicio del Dashboard.
     */
    public function index()
    {
        Security::mustBe(['admin']);
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
