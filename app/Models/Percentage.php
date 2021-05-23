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
    public function getPercentagesBySubjectId($subjectId)
    {
        $percentages = DB::table('percentage')->where('id_class', $subjectId)->first();
        return json_decode(json_encode($percentages), true);
    }

    /**
     * Editar los porcentajes de evaluación para una asignatura del curso.
     */
    public function edit($percentage)
    {
        if($percentage['continuous_assessment'] + $percentage['exams']  <= 100) {
            $percentage = DB::table('percentage')->where('id_percentage',$percentage['id_percentage'])->update([
                'continuous_assessment'=>$percentage['continuous_assessment'],
                'exams'=>$percentage['exams'],
            ]); 
        }
        
    }
}
