<?php
/**
 * Controlador para los usuarios (administradores y estudiantes).
 */

namespace App\Http\Controllers;


class UserController 
{
    function __construct()
    {
        $this->view = new View();
    }

    /**
     * Login de usuario.
     */
    public function login()
    {
        if ($_POST) {
            require 'models/Admin.php';
            $admin = (new Admin())->getByUsername($_POST['username']);
            if ($admin) {
                if (password_verify($_POST['password'], $admin['password'])) {
                    session_regenerate_id();
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['user'] = $admin;
                    $_SESSION['role'] = 'admin';
                    header('Location: index.php?controller=dashboard');
                } else {
                    header('Location: index.php?controller=user&action=login&credentials=wrong');
                }
            } else {
                require 'models/Student.php';
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
        $this->view->show("users/login.php");
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
