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
        $query = $this->db->prepare('SELECT * FROM branches');
        $query->execute();
        return $query;
    }

    /**
     * Listado nombres de ramas.
     */
    public function getAllNames()
    {
        $query = $this->db->prepare('SELECT name FROM branches');
        $query->execute();
        return $query;
    }

    /**
     * Obtener una rama por su id.
     */
    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM branches WHERE id_branch = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

     /**
    * Crear rama.
    */
   public function create($branch)
   {
       // Branch
       $query = $this->db->prepare('
           INSERT INTO branches (name)
           VALUES (?)
        ');
       $query->execute([           
           $branch['name'],           
       ]);
       $id_branch = $this->db->lastInsertId();       

       return $id_branch;
   }

   /**
     * Actualizar rama.
     */
    public function edit($branch)
    {
        $query = $this->db->prepare('UPDATE branches SET name=? WHERE id_branch = ? LIMIT 1');
        $query->execute([$branch['name'], $branch['id_branch']]);            
    }

   /**
     * Eliminar una rama.
     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM branches WHERE id_branch = ?');
        $query->execute([$id]);
        $query = $this->db->prepare('DELETE FROM class WHERE id_branch = ?');
        $query->execute([$id]);
    }
   
}
