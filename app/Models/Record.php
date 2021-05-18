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

    /**
     * Obtener los trabajos del estudiante para una asignatura.
     */
    public function getWorks($studentId, $subjectId)
    {
        $works = DB::select("
            SELECT * FROM works
            WHERE id_student=? AND id_class=?
            ORDER BY id_work;
        ", [$studentId, $subjectId]);

        return json_decode(json_encode($works), true);
    }

    /**
     * Obtener los exámenes del estudiante para una asignatura.
     */
    public function getExams($studentId, $subjectId)
    {
        $exams = DB::select("
            SELECT * FROM exams
            WHERE id_student=? AND id_class=?
            ORDER BY id_exam;
        ", [$studentId, $subjectId]);

        return json_decode(json_encode($exams), true);
    }
}
