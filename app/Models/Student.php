<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los estudiantes.
 */
class Student
{
    /**
     * Obtener el número total de estudiantes.
     */
    public function getTotal()
    {
        return DB::table('students')->count();
    }

    /**
     * Obtener un estudiante por su nombre de usuario.
     */
    public function getByUsername($username)
    {
        $user = DB::table('students')->where('username', $username)->first();
        return json_decode(json_encode($user), true);
    }

    /**
     * Obtener un estudiante por su id.
     */
    public function getById($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return json_decode(json_encode($student), true);
    }

    /**
     * Obtener los ids de los cursos de un estudiante.
     */
    public function getIdCourses($id)
    {
        $courses = DB::table('enrollment')->pluck('id_course')->where('id_student', $id);
        return json_decode(json_encode($courses), true);
    }

    /**
     * Listado de estudiantes.
     */
    public function getAll()
    {
        $students = DB::table('students')->get();
        return json_decode(json_encode($students), true);
    }

    /**
     * Crear estudiante.
     */
    public function create($student)
    {
        // Student
        $id_student = DB::table('students')->insertGetId([
                'username' => $student['username'],
                'password' => password_hash($student['password'], PASSWORD_DEFAULT),
                'email' => $student['email'],
                'name' => $student['name'],
                'surname' => $student['surname'],
                'telephone' => $student['telephone'],
                'nif' => $student['nif'],
                'date_registered' => NOW()
        ]);

        // Enrollment
        foreach ($_POST['id_courses'] as $id_course) {
            $enrollment = DB::table('enrollment')->insertGetId([
                'id_student' => $id_student,
                'id_course' => $id_course,
                'status' => 1
            ]);
        }

        return $id_student;
    }

    /**
     * Actualizar estudiante.
     */
    public function edit($student)
    {
        $values = [
            'username' => $student['username'],
            'email' => $student['email'],
            'name' => $student['name'],
            'surname' => $student['surname'],
            'telephone' => $student['telephone'],
            'nif' => $student['nif'],
        ];
        if ($student['password']) {
            $values['password'] = password_hash($student['password'], PASSWORD_DEFAULT);
        }
        $student = DB::table('students')->where('id', $student['id'])->update($values);
    }

    /**
     * Eliminar un estudiante.
     */
    public function delete($id)
    {
        DB::table('students')->where('id', '=', $id)->delete();
        DB::table('enrollment')->where('id_student', '=', $id)->delete();
    }
}
