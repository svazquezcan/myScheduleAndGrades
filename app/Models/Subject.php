<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para las asignaturas.
 */
class Subject { 
    /**
     * Obtener el número total de asignaturas.
     */
    public function getTotal()
    {
        return DB::table('class')->count();
    }

    /**
     * Listado de asignaturas.
     */
    public function getAll()
    {
        $subjects = DB::table('class')->get();
        return json_decode(json_encode($subjects), true);
    }

    /**
     * Listado de asignaturas filtradas por profesor.
     */
    public function getAllByTeacher($id_teacher)
    {
        $subjects = DB::table('class')->where('id_teacher', $id_teacher)->get();
        return json_decode(json_encode($subjects), true);
    }

    /**
     * Obtener una asignatura por su id.
     */
    public function getSubjectById($id)
    {
        $subject = DB::table('class')->where('id_class',$id)->first();
        return json_decode(json_encode($subject), true);
    }

    /** 
    * Crear asignatura.
    */
    public function create($class)
    {
        // class
        $id_schedule = (new Schedule())->getLastInsertId();
        $id_schedule_array = $id_schedule->toArray();
        $new_id_schedule = $id_schedule_array[0] + 1;

        $id_class = DB::table('class')->insertGetId(
            ['name'=>$class['name'],
            'color'=>$class['color'],   
            'id_teacher'=>$class['id_teacher'],
            'id_course'=>$class['id_course'],
            'id_branch'=>$class['id_branch'],
            'id_schedule'=>$new_id_schedule
            ]
        );

        // schedule
        $id_schedule = DB::table('schedule')->insertGetId(
            ['id_class'=>$id_class,
            'time_start'=>$class['time_start'],
            'time_end'=>$class['time_end'],
            'day'=>$class['day']
            ]
        );

        return $id_class;
    }

    /**
     * Actualizar asignatura.
     */
    public function edit($subject)
    {
        $subject = DB::table('class')->where('id_class',$subject['id_class'])->update([
            'name'=>$subject['name'],
            'color'=>$subject['color']
        ]);         
    }

    /**
     * Eliminar una asignatura.
     */
    public function delete($id)
    {
        // Eliminamos los horarios asociados a la clase
        DB::table('schedule')->where('id_class','=',$id)->delete();
        
        // Eliminamos la clase
        DB::table('class')->where('id_class','=',$id)->delete();               
    }

    /**
     * Obtener los trabajos de una asignatura.
     */
    public function getWorksBySubject($subjectId)
    {
        $works = DB::select("
            SELECT works.id_work, works.name, students.name as student, works.id_student, works.mark 
            FROM works
            INNER JOIN students
            WHERE id_class=?
            ORDER BY id_work;
        ", [$subjectId]);

        return json_decode(json_encode($works), true);
    }

    /**
     * Obtener los exámenes de una asignatura.
     */
    public function getExamsBySubject($subjectId)
    {
        $exams = DB::select("
            SELECT exams.id_exam, exams.name, exams.id_student, students.name as student, exams.mark  
            FROM exams
            INNER JOIN students            
            WHERE id_class=?
            ORDER BY id_exam;
        ", [$subjectId]);

        return json_decode(json_encode($exams), true);
    }

}
