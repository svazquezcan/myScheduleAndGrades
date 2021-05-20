<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los eventos.
 */
class Event
{

    /**
     * Obtener todos los eventos.
     */
    public function getEvents($studentId)
    {
        $result = DB::select("
            SELECT events.* FROM events 
            JOIN students ON events.id_student = students.id 
            WHERE students.id = ?
        ", [$studentId]);
        $data = [];
        foreach ($result as $row) {
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
    }

    /**
     * Eliminar evento seleccionado
     */
    public function deleteEvents($studentId)
    {
        if (isset($_POST["id"])) {
            DB::table('events')->where('id', '=', $_POST["id"])->delete();
        }
    }

    /**
     * Insertar evento en fecha seleccionada
     */
    public function insertEvents($studentId)
    {
        if (isset($_POST['title'])) {
            DB::table('events')->insertGetId([
                'title' => $_POST['title'],
                'start_event' => $_POST['start'],
                'end_event' => $_POST['end'],
                'id_student' => $studentId
            ]);
        }
    }

    /**
     * Modificar evento seleccionado
     */
    public function updateEvents($studentId)
    {
        if (isset($_POST["id"])) {
            DB::table('events')->where('id', $_POST['id'])->update([
                'start_event' => $_POST['start'],
                'end_event' => $_POST['end'],
                'id' => $_POST['id'],
                'id_student' => $studentId
            ]);
        }
    }
}
