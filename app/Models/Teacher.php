<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los profesores.
 */
class Teacher
{
    /**
     * Obtener el número total de profesores.
     */
    public function getTotal()
    {
        return DB::table('teachers')->count();
    }

    /**
     * Obtener un profesor por su nombre de usuario.
     */
    public function getByUsername($username)
    {
        $user = DB::table('teachers')->where('username', $username)->first();
        return json_decode(json_encode($user), true);
    }

    /**
     * Obtener profesor.
     */
    public function get($id)
    {
        $teacher = DB::table('teachers')->where('id_teacher', $id);
        return json_decode(json_encode($teacher), true);
    }

    /**
     * Obtener nombre profesor.
     */
    public function getNameById($id)
    {
        $teacher = DB::table('teachers')->pluck('name', 'surname')->where('id_teacher', $id);
        return json_decode(json_encode($teacher), true);
    }

    /**
     * Obtener un profesor por su id.
     */
    public function getById($id)
    {
        $teacher = DB::table('teachers')->where('id_teacher', $id)->first();
        return json_decode(json_encode($teacher), true);
    }

    /**
     * Listado de profesores.
     */
    public function getAll()
    {
        $teachers = DB::table('teachers')->get();
        return json_decode(json_encode($teachers), true);
    }

    /**
     * Crear profesor.
     */
    public function create($teacher)
    {
        $id_teacher = DB::table('teachers')->insertGetId([
            'username' => $teacher['username'],
            'name' => $teacher['name'],
            'surname' => $teacher['surname'],
            'telephone' => $teacher['telephone'],
            'nif' => $teacher['nif'],
            'email' => $teacher['email'],
            'password' => password_hash($teacher['password'], PASSWORD_DEFAULT)
        ]);
        return $id_teacher;
    }

    /**
     * Actualizar profesor.
     */
    public function edit($teacher)
    {
        $values = [
            'username' => $teacher['username'],
            'name' => $teacher['name'],
            'surname' => $teacher['surname'],
            'telephone' => $teacher['telephone'],
            'nif' => $teacher['nif'],
            'email' => $teacher['email'],
        ];
        if ($teacher['password']) {
            $values['password'] = password_hash($teacher['password'], PASSWORD_DEFAULT);
        }
        $teacher = DB::table('teachers')
            ->where('id_teacher', $teacher['id_teacher'])
            ->update($values);
    }

    /**
     * Eliminar un profesor.
     */
    public function delete($id)
    {
        DB::table('teachers')->where('id_teacher', '=', $id)->delete();
    }
}
