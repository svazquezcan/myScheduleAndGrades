<?php
namespace Libs;

/**
 * Protege el acceso a controladores por usuarios no autenticados.
 */
class Security
{

    /**
     * Acceso solo para usuarios que han iniciado sesión.
     */
    public static function loggedInRequired()
    {
        if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
            header('Location: /user/login');
            exit();
        }
    }

    /**
     * Acceso solo para ciertos roles.
     */
    public static function mustBe($roles)
    {
        self::loggedInRequired();
        if (!in_array($_SESSION['role'], $roles)) {
            header('Location: /schedule');
            exit();
        }
    }
}
