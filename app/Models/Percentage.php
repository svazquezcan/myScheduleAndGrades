<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para los porcentajes.
 */
class Percentage {

    /**
     * Obtener los porcentajes para una asignatura del curso.
     */
    public function getPorcentagesBySubjectId($subjectId)
    {
        $percentages = DB::table('percentage')->where('id_class', $subjectId)->first();
        return json_decode(json_encode($percentages), true);
    }
}
