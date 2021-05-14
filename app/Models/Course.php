<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los cursos.
 */
class Course {

    /**
     * Obtener el número total de cursos.
     */
    public function getTotal()
    {
        return DB::table('courses')->count();
    }

    /**
     * Obtener un curso por su id.
     */
    public function getById($id)
    {
        $course = DB::table('courses')->where('id_course',$id)->first();
        return json_decode(json_encode($course), true);
    }
 
    /**
     * Listado de cursos.
     */
    public function getAll()
    {
        $courses = DB::table('courses')->get();
        return json_decode(json_encode($courses), true);
    }    

    /** 
    * Crear curso.
    */
    public function create($course)
    {
        $id_course = DB::table('courses')->insertGetId([
            'name'=>$course['name'],
            'description'=>$course['description'],
            'date_start'=>$course['date_start'],
            'date_end'=>date('Y-m-d', strtotime($course['date_start']. '+2 years')),
            'active'=>$course['active']
        ]); 
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
        DB::table('courses')->where('id_course',$course['id_course'])->update([
            'name'=>$course['name'],
            'description'=>$course['description'],
            'date_start'=>$course['date_start'],
            'date_end'=>date('Y-m-d', strtotime($course['date_start']. '+2 years')),
            'active'=>$course['active']
        ]);
    }

    /**
     * Eliminar un curso.
     */
    public function delete($id)
    {
        DB::table('courses')->where('id_course','=',$id)->delete();
    }
}
