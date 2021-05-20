<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los horarios.
 */
class Event {
 
    /**
     * Obtener todos los eventos.
     */
    public function getEvents($studentId){

        $result = DB::select("
            SELECT events.* FROM events 
            JOIN students ON events.id_student = students.id 
            WHERE students.id = ?
        ", [$studentId]);
        
        $data = [];

        foreach($result as $row){
            $data[] = array(
                'id'   => $row->id,
                'title'   => $row->title,
                'start'   => $row->start_event,
                'end'   => $row->end_event,
                'id_student' => $row->id_student,
                'type' => "event"
            );
        }

        return $data;
        //return json_decode(json_encode($data), true);

    }

    /**
     * Eliminar evento seleccionado
     */
    public function deleteEvents(){
        if(isset($_POST["id"])){
            $query = $this->db->prepare("DELETE from events WHERE id=:id");
            $query->execute(
                array(
                    ':id' => $_POST['id']
                ) 
            );
        }
    } 

    /**
     * Insertar evento en fecha seleccionada
     */
    
    public function insertEvents(){
        if(isset($_POST['title'])){
            $id_student = (int) $_SESSION['user']['id'];
            $query = $this->db->prepare("INSERT INTO events (title, start_event, end_event, id_student) VALUES (:title, :start_event, :end_event, :id_student)");
            $query->execute(
                array(
                    ':title'  => $_POST['title'],
                    ':start_event' => $_POST['start'],
                    ':end_event' => $_POST['end'],
                    ':id_student' => $id_student
                )
            );

        }
    }

    /**
     * Modificar evento seleccionado
     */
    public function updateEvents(){
        if(isset($_POST["id"])){
            $id_student = (int) $_SESSION['user']['id'];
            $query = $this->db->prepare("UPDATE events SET start_event=:start_event, end_event=:end_event, id_student=:id_student WHERE events.id=:id");
            $query->execute(
                array(
                ':start_event' => $_POST['start'],
                ':end_event' => $_POST['end'],
                ':id'   => $_POST['id'],
                ':id_student' => $id_student
                )
            );
        }
    }

}
