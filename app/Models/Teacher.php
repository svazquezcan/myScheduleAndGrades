<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Modelo para los profesores.
 */
class Teacher {
    protected $db;
 
    /*public function __construct()
    {
        $this->db = SPDO::singleton();
    }*/
 
    /**
     * Obtener el número total de profesores.
     */
    public function getTotal()
    {
        $query = DB::table('teachers')->count();
        return $query;
    }

    /**
     * Obtener profesor.
     */
    public function get($id) 
    {
        $teacher = DB::table('teachers')->where('id_teacher',$id);
        //$query->execute([$id]);
        $result = json_decode(json_encode($teacher), true);
        return $result;
    }

    /**
     * Obtener nombre profesor.
     */
    public function getNameById($id) 
    {
        $teacher = DB::table('teachers')->pluck('name', 'surname')->where('id_teacher',$id);
        //$query->execute([$id]);
        $result = json_decode(json_encode($teacher), true);
        return $result;
    }    

    /**
     * Obtener un profesor por su id.
     */
    public function getById($id)
    {
        $teacher = DB::table('teachers')->where('id_teacher',$id)->first();
        //$query->execute([$id]);
        $result = json_decode(json_encode($teacher), true);
        return $result;
    }

    /**
     * Listado de profesores.
     */
    public function getAll()
    {
        $teachers = DB::table('teachers')->get();
        //$query->execute();
        $result = json_decode(json_encode($teachers), true);
        return $result;
    }    
    
    /**
    * Crear profesor.
    */
   public function create($teacher)
   {
       // Teacher
       $id_teacher = DB::table('teachers')->insertGetId(
        ['name'=>$teacher['name'],
        'surname'=>$teacher['surname'],   
        'telephone'=>$teacher['telephone'],
        'nif'=>$teacher['nif'],
        'email'=>$teacher['email'],
        ]
    );    
   }

   /**
     * Actualizar profesor.
     */
    public function edit($teacher)
    {     
        
        $teacher = DB::table('teachers')->where('id_teacher',$teacher['id_teacher'])->update(
            ['name'=>$teacher['name'],
            'surname'=>$teacher['surname'],                 
            'telephone'=>$teacher['telephone'],
            'nif'=>$teacher['nif'],
            'email'=>$teacher['email'],
            ]
        );
        /*$query = $this->db->prepare('UPDATE teachers SET name=?,surname=?,telephone=?,nif=?,email=? WHERE id_teacher = ? LIMIT 1');
        $query->execute([
            $subject['name'],
            $subject['surname'],                 
            $subject['telephone'],
            $subject['nif'],
            $subject['email'],     
            $subject['id_teacher']
        ]);*/
    }

   /**
     * Eliminar un profesor.
     */
    public function delete($id)
    {
        DB::table('teachers')->where('id_teacher','=',$id)->delete();
    
    }

}
