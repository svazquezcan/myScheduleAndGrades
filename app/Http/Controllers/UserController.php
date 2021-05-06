<?php
/**
 * Controlador para los usuarios (administradores y estudiantes).
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Login de usuario.
     */
    public function login(Request $request)
    {
        if ($_POST) {
            
            $admin = (new Admin())->getByUsername($_POST['username']);
            if ($admin) {
                if (password_verify($_POST['password'], $admin['password'])) {
                    session_start();
                    $request->session()->regenerate();

                    $_SESSION['loggedIn'] = true;
                    $_SESSION['user'] = $admin;
                    $_SESSION['role'] = 'admin';
                    return redirect('dashboard');
                } else {
                    header('Location: index.php?controller=user&action=login&credentials=wrong');
                }
            } else {
                $student = (new Student())->getByUsername($_POST['username']);
                if ($student) {
                    if (password_verify($_POST['password'], $student['password'])) {
                        session_regenerate_id();
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['user'] = $student;
                        $_SESSION['role'] = 'student';
                        header('Location: index.php?controller=schedule');
                    } else {
                        header('Location: index.php?controller=user&action=login&credentials=wrong');
                    }
                } else {
                    header('Location: index.php?controller=user&action=login&credentials=wrong');
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
        header('Location: index.php');
    }
}
