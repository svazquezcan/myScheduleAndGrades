<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Modelo para los estudiantes.
 */
class Student {
    protected $db;
 
    /*public function __construct()
    {
        $this->db = SPDO::singleton();
    }*/
 
    /**
     * Obtener el número total de estudiantes.
     */
    public function getTotal()
    {
        $query = DB::table('students')->count();
        return $query;
    }

    /**
     * Obtener un estudiante por su nombre de usuario.
     */
    public function getByUsername($username)
    {
        $user = DB::table('students')->where('username',$username);
        //$query->execute([$username]);
        $result = json_decode(json_encode($user), true);
        return $result;
    }

    /**
     * Obtener un estudiante por su id.
     */
    public function getById($id)
    {
        $student = DB::table('students')->where('id',$id)->first();
        $result = json_decode(json_encode($student), true);
        return $result;  
    }

    /**
     * Obtener los ids de los cursos de un estudiante.
     */
    public function getIdCourses($id)
    {
        $courses = DB::table('enrollment')->pluck('id_course')->where('id_student',$id);
        $result = json_decode(json_encode($courses), true);
        return $result; 
    }

    /**
     * Listado de estudiantes.
     */
    public function getAll()
    {
        $students = DB::table('students')->get();
        $result = json_decode(json_encode($students), true);
        //$query->execute();
        return $result;
    }

    /**
     * Crear estudiante.
     */
    public function create($student)
    {
        // Student
        $studentPass = Hash::make($student['password']);
        $id_student = DB::table('students')->insertGetId(
            ['username'=>$student['username'],
            'password'=>$studentPass,
            'email'=>$student['email'],
            'name'=>$student['name'],
            'surname'=>$student['surname'],
            'telephone'=>$student['telephone'],
            'nif'=>$student['nif'],
            'date_registered'=>NOW()]
        );      
        /*$query = $this->db->prepare('
            INSERT INTO students (username, password, email, name, surname, telephone, nif, date_registered)
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $query->execute([
            $student['username'],
            password_hash($student['password'], PASSWORD_DEFAULT),
            $student['email'],
            $student['name'],
            $student['surname'],
            $student['telephone'],
            $student['nif'],
        ]);
        $id_student = $this->db->lastInsertId();*/

        // Enrollment
        foreach ($_POST['id_courses'] as $id_course) {
            $enrollment = DB::table('enrollment')->insertGetId(
                ['id_student'=>$id_student,
                'id_course'=>$id_course,
                'status'=>1]  
            );      
        }
       
        /*$this->db->prepare('
            INSERT INTO enrollment (id_student, id_course, status)
            VALUES (?, ?, ?)
        ');
        foreach ($_POST['id_courses'] as $id_course) {
            $query->execute([$id_student, $id_course, 1]);
        }*/

        return $id_student;
    }

    /**
     * Actualizar estudiante.
     */
    public function edit($student)
    {
        if($student['password']) {
            $studentPass = Hash::make($student['password']);
            $student = DB::table('students')->where('id',$student['id'])->update(
                ['username'=>$student['username'],
                'password'=>$studentPass,
                'email'=>$student['email'],
                'name'=>$student['name'],
                'surname'=>$student['surname'],
                'telephone'=>$student['telephone'],
                'nif'=>$student['nif'],
                ]
            );
            /*$query = $this->db->prepare('UPDATE students SET username=?,password=?,email=?,name=?,surname=?,telephone=?,nif=? WHERE id = ? LIMIT 1');
            $query->execute([
                $student['username'],
                password_hash($student['password'], PASSWORD_DEFAULT),
                $student['email'],
                $student['name'],
                $student['surname'],
                $student['telephone'],
                $student['nif'],
                $student['id']
            ]);*/
        } else {
            $student = DB::table('students')->where('id',$student['id'])->update(
                ['username'=>$student['username'],
                'email'=>$student['email'],
                'name'=>$student['name'],
                'surname'=>$student['surname'],
                'telephone'=>$student['telephone'],
                'nif'=>$student['nif'],
                ]
            );
            /*$query = $this->db->prepare('UPDATE students SET username=?,email=?,name=?,surname=?,telephone=?,nif=? WHERE id = ? LIMIT 1');
            $query->execute([
                $student['username'],
                $student['email'],
                $student['name'],
                $student['surname'],
                $student['telephone'],
                $student['nif'],
                $student['id']
            ]);*/
        }
        
    }

    /**
     * Eliminar un estudiante.
     */
    public function delete($id)
    {
        DB::table('students')->where('id','=',$id)->delete();
        DB::table('enrollment')->where('id_student','=',$id)->delete();
        /*$query = $this->db->prepare('DELETE FROM students WHERE id = ?');
        $query->execute([$id]);
        $query = $this->db->prepare('DELETE FROM enrollment WHERE id_student = ?');
        $query->execute([$id]);*/
    }
}
