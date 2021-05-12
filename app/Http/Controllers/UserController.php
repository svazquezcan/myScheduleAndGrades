<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;

/**
 * Controlador para los usuarios (administradores, profesores y estudiantes).
 */
class UserController extends Controller
{
    /**
     * Configurar sesión de usuario.
     */
    private function setSession($user, $role) {
        session_regenerate_id();
        $_SESSION['loggedIn'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['role'] = $role;
    }

    /**
     * Login de usuario.
     */
    public function login()
    {
        if ($_POST) {
            $admin = (new Admin())->getByUsername($_POST['username']);
            if ($admin) {
                if (password_verify($_POST['password'], $admin['password'])) {
                    $this->setSession($admin, 'admin');
                    return redirect()->route('dashboard.index');
                } else {
                    return redirect()->route('login', ['credentials' => 'wrong']);
                }
            } else {
                $teacher = (new Teacher())->getByUsername($_POST['username']);
                if ($teacher) {
                    if (password_verify($_POST['password'], $teacher['password'])) {
                        $this->setSession($teacher, 'teacher');
                        return redirect()->route('dashboard.index');
                    } else {
                        return redirect()->route('login', ['credentials' => 'wrong']);
                    }
                } else {
                    $student = (new Student())->getByUsername($_POST['username']);
                    if ($student) {
                        if (password_verify($_POST['password'], $student['password'])) {
                            $this->setSession($student, 'student');
                            return redirect()->route('schedule.index');
                        } else {
                            return redirect()->route('login', ['credentials' => 'wrong']);
                        }
                    } else {
                        return redirect()->route('login', ['credentials' => 'wrong']);
                    }
                }
            }
        }
        return view('users/login');
    }

    /**
     * Cerrar sesión del usuario.
     */
    public function logout()
    {
        session_destroy();
        return redirect()->route('home');
    }
}
