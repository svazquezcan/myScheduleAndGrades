<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los horarios.
 */
class Schedule {
 
    /**
     * Obtener el número total de horarios.
     */
    public function getTotal()
    {
        return DB::table('schedule')->count();
    }

    /**
     * Obtener el último id.
     */
    public function getLastInsertId()
    {
        $lastScheduleId = DB::table('class')
                                ->orderBy('id_schedule')
                                ->limit(1)
                                ->pluck('id_schedule');
        return $lastScheduleId;
    }

    /**
     * Obtener todos los horarios del estudiante logueado
     */
    public function getSchedule($studentId){

        // Obtenemos el id del curso en el que está enrolado el estudiante
        $queryforId = DB::select("
            SELECT enrollment.id_course FROM enrollment
            JOIN courses ON enrollment.id_course=courses.id_course
            WHERE enrollment.id_student = ?
        ", [$studentId]);
        $id_course = $queryforId[0]->id_course;

        // Obtenemos los horarios de las clases del curso en el que está
        // enrolado el estudiante que hemos obtenido con la query anterior
        $result = DB::select("
            SELECT schedule.id_class AS id_class, schedule.id_schedule, schedule.time_start, schedule.time_end, schedule.day, class.name AS name
            FROM schedule 
            INNER JOIN class ON schedule.id_class=class.id_class
            WHERE id_course = ?
        ", [$id_course]);

        $data = array();
        foreach($result as $row){
            $data[] = array(
                'id'   => $row->id_class,
                'title'   => $row->name,
                'start'   => $row->day . " " . $row->time_start,
                'end'   =>$row->day . " " . $row->time_end,
                'type' => 'schedule'
            );
        }
        return $data; 
    }

    /**
     * Crear un registro de horario.
     */
    public function create($schedule)
    {
        $id_schedule = DB::table('schedule')->insertGetId([
            'id_class' =>$schedule['id_class'],
            'time_start' =>$schedule['time_start'],
            'time_end'=>$schedule['time_end'],
            'day'=>$schedule['day']
        ]);
        return $id_schedule;
    }
}


