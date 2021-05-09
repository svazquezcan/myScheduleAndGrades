<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Modelo para las ramas.
 */
class Branch {
    protected $db;
 
    /*public function __construct()
    {
        $this->db = SPDO::singleton();
    }*/
 
    /**
     * Obtener el número total de reamas.
     */
    public function getTotal()
    {
        $query = DB::table('branches')->count();
        return $query;
    }

    /**
     * Listado de ramas.
     */
    public function getAll()
    {
        $branches = DB::table('branches')->get();
        $result = json_decode(json_encode($branches), true);
        //$query->execute();
        return $result;
    }

    /**
     * Listado nombres de ramas.
     */
    public function getAllNames()
    {
        $branches = DB::table('branches')->pluck('name');
        $result = json_decode(json_encode($branches), true);
        return $result;
    }

    /**
     * Obtener una rama por su id.
     */
    public function getById($id)
    {
        $branch = DB::table('branches')->where('id_branch',$id)->first();
        //$query->execute([$id]);
        $result = json_decode(json_encode($branch), true);
        return $result;
    }

     /**
    * Crear rama.
    */
   public function create($branch)
   {
       // Branch
       $id_course = DB::table('branches')->insertGetId(
        ['name'=>$branch['name']]
    );     

       /*$query = $this->db->prepare('
           INSERT INTO branches (name)
           VALUES (?)
        ');
       $query->execute([           
           $branch['name'],           
       ]);
       $id_branch = $this->db->lastInsertId();       

       return $id_branch;*/
   }

   /**
     * Actualizar rama.
     */
    public function edit($branch)
    {
        DB::table('branches')->where('id_branch',$branch['id_branch'])->update(
            ['name'=>$branch['name']]
        );
        /*$query = $this->db->prepare('UPDATE branches SET name=? WHERE id_branch = ? LIMIT 1');
        $query->execute([$branch['name'], $branch['id_branch']]);*/            
    }

   /**
     * Eliminar una rama.
     */
    public function delete($id)
    {
        DB::table('branches')->where('id_branch','=',$id)->delete();
        DB::table('class')->where('id_branch','=',$id)->delete();
    }
   
}
