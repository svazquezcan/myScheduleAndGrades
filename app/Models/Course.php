<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Modelo para los cursos.
 */
class Course {
    protected $db;
 
    /*public function __construct()
    {
        $this->db = SPDO::singleton();
    }*/

    /**
     * Obtener el número total de cursos.
     */
    public function getTotal()
    {
        $query = DB::table('courses')->count();
        return $query;
    }

    /**
     * Obtener un curso por su id.
     */
    public function getById($id)
    {
        $course = DB::table('courses')->where('id_course',$id);
        //$query->execute([$id]);
        $result = json_decode(json_encode($course), true);
        return $result;    }
 
    /**
     * Listado de cursos.
     */
    public function getAll()
    {
        $courses = DB::table('courses')->get();
        $result = json_decode(json_encode($courses), true);
        //$query->execute();
        return $result;
    }    

    /** 
    * Crear curso.
    */
    public function create($course)
    {
        // Course
        $query = $this->db->prepare('
            INSERT INTO courses (name, description, date_start, date_end, active)
            VALUES (?, ?, ?, ?, ?)
         ');
        $query->execute([           
            $course['name'],
            $course['description'],
            $course['date_start'],
            date('Y-m-d', strtotime($course['date_start']. '+2 years')),
            $course['active'],
        ]);
        $id_course = $this->db->lastInsertId();               
 
        return $id_course;
    }

    /**     
     * Actualizar curso.
     */
    public function edit($course)
    {        
        if ($course['active'] == "Activo" || $course['active'] == "activo") {
            $course['active'] = 1;
        } else if ($course['active'] == "Inactivo" || $course['active'] == "inactivo") {
            $course['active'] = 0;
        }

        $query = $this->db->prepare('UPDATE courses SET name=?,description=?,date_start=?,date_end=?,active=? WHERE id_course = ? LIMIT 1');
        $query->execute([
            $course['name'], 
            $course['description'], 
            $course['date_start'], 
            $course['date_end'], 
            $course['active'], 
            $course['id_course'],
        ]);
    }

    /**
     * Eliminar un curso.
     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM courses WHERE id_course = ?');
        $query->execute([$id]);
    }
}
