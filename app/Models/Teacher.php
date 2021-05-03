<?php
/**
 * Modelo para los profesores.
 */
class Teacher {
    protected $db;
 
    public function __construct()
    {
        $this->db = SPDO::singleton();
    }
 
    /**
     * Obtener el número total de profesores.
     */
    public function getTotal()
    {
        $query = $this->db->prepare('SELECT COUNT(*) FROM teachers');
        $query->execute();
        return $query->fetch()[0];
    }

    /**
     * Obtener profesor.
     */
    public function get($id) 
    {
        $query = $this->db->prepare('SELECT FROM teachers WHERE id_teacher = ?');
        $query->execute([$id]);
        return $query;
    }

    /**
     * Obtener nombre profesor.
     */
    public function getNameById($id) 
    {
        $query = $this->db->prepare('SELECT name, surname FROM teachers WHERE id_teacher = ?');
        $query->execute([$id]);
        return $query;
    }    

    /**
     * Obtener un profesor por su id.
     */
    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM teachers WHERE id_teacher = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Listado de profesores.
     */
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM teachers');
        $query->execute();
        return $query;
    }    
    
    /**
    * Crear profesor.
    */
   public function create($teacher)
   {
       // Teacher
       $query = $this->db->prepare('
           INSERT INTO teachers (name, surname, telephone, nif, email)
           VALUES (?, ?, ?, ?, ?)
        ');
       $query->execute([           
           $teacher['name'],
           $teacher['surname'],
           $teacher['telephone'],
           $teacher['nif'],
           $teacher['email'],
       ]);
       $id_teacher = $this->db->lastInsertId();       

       return $id_teacher;
   }

   /**
     * Actualizar profesor.
     */
    public function edit($subject)
    {        
        $query = $this->db->prepare('UPDATE teachers SET name=?,surname=?,telephone=?,nif=?,email=? WHERE id_teacher = ? LIMIT 1');
        $query->execute([
            $subject['name'],
            $subject['surname'],                 
            $subject['telephone'],
            $subject['nif'],
            $subject['email'],     
            $subject['id_teacher']
        ]);
    }

   /**
     * Eliminar un profesor.
     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM teachers WHERE id_teacher = ?');
        $query->execute([$id]);       
    }

}
