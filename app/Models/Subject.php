<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Modelo para las asignaturas.
 */
class Subject {
    protected $db;
 
    /*public function __construct()
    {
        $this->db = SPDO::singleton();
    }*/
 
    /**
     * Obtener el número total de asignaturas.
     */
    public function getTotal()
    {
        $query = DB::table('class')->count();
        return $query;
    }

    /**
     * Listado de asignaturas.
     */
    public function getAll()
    {
        $subjects = DB::table('class')->get();
        $result = json_decode(json_encode($subjects), true);
        //$query->execute();
        return $result;
    }

    /**
     * Obtener una asignatura por su id.
     */
    public function getById($id)
    {
        $subject = DB::table('class')->where('id_class',$id)->first();
        $result = json_decode(json_encode($subject), true);
        return $result; 
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

        var_dump($new_id_schedule);

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

        /*$query = $this->db->prepare('
            INSERT INTO class (name, color, id_teacher, id_course, id_branch)
            VALUES (?, ?, ?, ?, ?)
         ');
        $query->execute([           
            $class['name'],
            $class['color'],   
            $class['id_teacher'],
            $class['id_course'],
            $class['id_branch'],
        ]);
        $id_class = $this->db->lastInsertId();*/                            
        
        /*$query = $this->db->prepare('
            INSERT INTO schedule (id_class, time_start, time_end, day)
            VALUES (?, ?, ?, ?)
         ');
         $query->execute([ 
             $id_class,
             $class['time_start'],
             $class['time_end'],
             $class['day'],
         ]);        

        return $id_class;*/
    }

    /**
     * Actualizar asignatura.
     */
    public function edit($subject)
    {
        $subject = DB::table('class')->where('id_class',$subject['id_class'])->update(
            ['name'=>$subject['name'],
            'color'=>$subject['color']
            ]
        );
        /*$query = $this->db->prepare('
            UPDATE class SET name=?, color=? WHERE id_class = ? LIMIT 1');
        $query->execute([
            $subject['name'], 
            $subject['color'],            
            $subject['id_class'],
        ]);*/            
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

}
