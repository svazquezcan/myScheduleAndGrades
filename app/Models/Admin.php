<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los administradores.
 */
class Admin
{
    /**
     * Obtener el número total de administradores.
     */
    public function getTotal()
    {
        $query = DB::table('users_admin')->count();
        return $query;
    }

    /**
     * Obtener un administrador por su nombre de usuario.
     */
    public function getByUsername($username)
    {
        $user = DB::table('users_admin')->where('username', $username)->first();
        $result = json_decode(json_encode($user), true);
        return $result;
    }

    /**
     * Obtener un administrador por su id.
     */
    public function getById($id)
    {
        $admin = DB::table('users_admin')->where('id_user_admin', $id)->first();
        $result = json_decode(json_encode($admin), true);
        return $result;
    }

    /**
     * Listado de administradores.
     */
    public function getAll()
    {
        $admins = DB::table('users_admin')->get();
        $result = json_decode(json_encode($admins), true);
        return $result;
    }

    /**
     * Crear administrador.
     */
    public function create($admin)
    {
        $id_admin = DB::table('users_admin')->insertGetId(
            [
                'username' => $admin['username'],
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => password_hash($admin['password'], PASSWORD_DEFAULT),
            ]
        );
        return $id_admin;
    }

    /**
     * Actualizar administrador.
     */
    public function edit($admin)
    {
        if ($admin['password']) {
            DB::table('users_admin')->where('id_user_admin', $admin['id'])->update(
                [
                    'username' => $admin['username'],
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => password_hash($admin['password'], PASSWORD_DEFAULT),
                ]
            );
        } else {
            DB::table('users_admin')->where('id_user_admin', $admin['id'])->update(
                [
                    'username' => $admin['username'],
                    'name' => $admin['name'],
                    'email' => $admin['email']
                ]
            );
        }
    }

    /**
     * Eliminar un administrador.
     */
    public function delete($id)
    {
        DB::table('users_admin')->where('id_user_admin', '=', $id)->delete();
    }
}
