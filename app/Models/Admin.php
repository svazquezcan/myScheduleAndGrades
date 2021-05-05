<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
/**
 * Modelo para los administradores.
 */
class Admin {
    protected $db;
 
    /*public function __construct()
    {
        $this->db = SPDO::singleton();
    }*/

    /**
     * Obtener el número total de administradores.
     */
    public function getTotal()
    {
        $query = DB::table('users_admin')->count();
        //$query->execute();
        return $query;
    }

    /**
     * Obtener un administrador por su nombre de usuario.
     */
    public function getByUsername($username)
    {
        $user = DB::table('users_admin')->where('username',$username)->first();
        //$query->execute([$username]);
        $result = json_decode(json_encode($user), true);
        return $result;
        //return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un administrador por su id.
     */
    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM users_admin WHERE id_user_admin = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
 
    /**
     * Listado de administradores.
     */
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM users_admin');
        $query->execute();
        return $query;
    }

    /**
     * Crear administrador.
     */
    public function create($admin)
    {
        $query = $this->db->prepare('INSERT INTO users_admin (username, name, email, password) VALUES (?, ?, ?, ?)');
        $query->execute([
            $admin['username'],
            $admin['name'],
            $admin['email'],
            password_hash($admin['password'], PASSWORD_DEFAULT)
        ]);
        return $this->db->lastInsertId();
    }

    /**
     * Actualizar administrador.
     */
    public function edit($admin)
    {
        if($admin['password']) {
            $query = $this->db->prepare('UPDATE users_admin SET username=?,name=?,email=?,password=? WHERE id_user_admin = ? LIMIT 1');
            $query->execute([$admin['username'], $admin['name'], $admin['email'], 
                password_hash($admin['password'], PASSWORD_DEFAULT), $admin['id']
            ]);
        } else {
            $query = $this->db->prepare('UPDATE users_admin SET username=?,name=?,email=? WHERE id_user_admin = ? LIMIT 1');
            $query->execute([$admin['username'], $admin['name'], $admin['email'], $admin['id']]);
        }        
    }

    /**
     * Eliminar un administrador.
     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM users_admin WHERE id_user_admin = ?');
        $query->execute([$id]);
    }
}
