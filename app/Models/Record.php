<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para el expediente del estudiante.
 */
class Record
{
    /**
     * Obtener el expediente de un estudiante.
     */
    public function getRecord($studentId)
    {
        $records = DB::select("
            SELECT courses.id_course, courses.name as course, class.id_class, class.name as subject
            FROM courses
            INNER JOIN class
            ON courses.id_course = class.id_course
            WHERE courses.id_course IN (SELECT id_course FROM enrollment WHERE id_student=?)
            AND courses.active = 1
            ORDER BY courses.id_course, class.id_class;
        ", [$studentId]);

        return json_decode(json_encode($records), true);
    }
}
