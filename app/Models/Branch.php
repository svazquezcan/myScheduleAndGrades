<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * Modelo para las ramas.
 */
class Branch { 
    /**
     * Obtener el número total de reamas.
     */
    public function getTotal()
    {
        return DB::table('branches')->count();
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
        return json_decode(json_encode($branches), true);
    }

    /**
     * Obtener una rama por su id.
     */
    public function getById($id)
    {
        $branch = DB::table('branches')->where('id_branch',$id)->first();
        return json_decode(json_encode($branch), true);
    }

     /**
    * Crear rama.
    */
   public function create($branch)
   {
       // Branch
       $id_branch = DB::table('branches')->insertGetId(['name'=>$branch['name']]);
       return $id_branch;
   }

   /**
     * Actualizar rama.
     */
    public function edit($branch)
    {
        DB::table('branches')->where('id_branch',$branch['id_branch'])->update(
            ['name'=>$branch['name']]
        );
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
