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
        $query = $this->db->prepare('SELECT * FROM class');
        $query->execute();
        return $query;
    }

    /**
     * Obtener una asignatura por su id.
     */
    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM class WHERE id_class = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /** 
    * Crear asignatura.
    */
    public function create($class)
    {
        // class
        require 'models/Schedule.php';       
        $id_schedule = (new Schedule())->getLastInsertId() + 1;

        $query = $this->db->prepare('
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
        $id_class = $this->db->lastInsertId();                            
        
        $query = $this->db->prepare('
            INSERT INTO schedule (id_class, time_start, time_end, day)
            VALUES (?, ?, ?, ?)
         ');
         $query->execute([ 
             $id_class,
             $class['time_start'],
             $class['time_end'],
             $class['day'],
         ]);        

        return $id_class;
    }

    /**
     * Actualizar asignatura.
     */
    public function edit($subject)
    {
        $query = $this->db->prepare('
            UPDATE class SET name=?, color=? WHERE id_class = ? LIMIT 1');
        $query->execute([
            $subject['name'], 
            $subject['color'],            
            $subject['id_class'],
        ]);            
    }

    /**
     * Eliminar una asignatura.
     */
    public function delete($id)
    {
        // Eliminamos los horarios asociados a la clase
        $query = $this->db->prepare('DELETE FROM schedule WHERE id_class = ?');
        $query->execute([$id]); 
        // Eliminamos la clase
        $query = $this->db->prepare('DELETE FROM class WHERE id_class = ?');
        $query->execute([$id]);                 
    }

}
