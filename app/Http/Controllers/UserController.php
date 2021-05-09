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
     * Login de usuario.
     */
    public function login()
    {
        if ($_POST) {
            $admin = (new Admin())->getByUsername($_POST['username']);
            if ($admin) {
                if (password_verify($_POST['password'], $admin['password'])) {
                    session_regenerate_id();
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['user'] = $admin;
                    $_SESSION['role'] = 'admin';
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('login', ['credentials' => 'wrong']);
                }
            } else {
                $student = (new Student())->getByUsername($_POST['username']);
                if ($student) {
                    if (password_verify($_POST['password'], $student['password'])) {
                        session_regenerate_id();
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['user'] = $student;
                        $_SESSION['role'] = 'student';
                        return redirect()->route('schedule');
                    } else {
                        return redirect()->route('login', ['credentials' => 'wrong']);
                    }
                } else {
                    return redirect()->route('login', ['credentials' => 'wrong']);
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
