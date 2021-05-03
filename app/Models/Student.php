<?php
/**
 * Modelo para los estudiantes.
 */
class Student {
    protected $db;
 
    public function __construct()
    {
        $this->db = SPDO::singleton();
    }
 
    /**
     * Obtener el número total de estudiantes.
     */
    public function getTotal()
    {
        $query = $this->db->prepare('SELECT COUNT(*) FROM students');
        $query->execute();
        return $query->fetch()[0];
    }

    /**
     * Obtener un estudiante por su nombre de usuario.
     */
    public function getByUsername($username)
    {
        $query = $this->db->prepare('SELECT * FROM students WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un estudiante por su id.
     */
    public function getById($id)
    {
        $query = $this->db->prepare('SELECT * FROM students WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener los ids de los cursos de un estudiante.
     */
    public function getIdCourses($id)
    {
        $query = $this->db->prepare('SELECT id_course FROM enrollment WHERE id_student = ? AND status = 1');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    /**
     * Listado de estudiantes.
     */
    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM students');
        $query->execute();
        return $query;
    }

    /**
     * Crear estudiante.
     */
    public function create($student)
    {
        // Student
        $query = $this->db->prepare('
            INSERT INTO students (username, password, email, name, surname, telephone, nif, date_registered)
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
        $query->execute([
            $student['username'],
            password_hash($student['password'], PASSWORD_DEFAULT),
            $student['email'],
            $student['name'],
            $student['surname'],
            $student['telephone'],
            $student['nif'],
        ]);
        $id_student = $this->db->lastInsertId();

        // Enrollment
        $query = $this->db->prepare('
            INSERT INTO enrollment (id_student, id_course, status)
            VALUES (?, ?, ?)
        ');
        foreach ($_POST['id_courses'] as $id_course) {
            $query->execute([$id_student, $id_course, 1]);
        }

        return $id_student;
    }

    /**
     * Actualizar estudiante.
     */
    public function edit($student)
    {
        if($student['password']) {
            $query = $this->db->prepare('UPDATE students SET username=?,password=?,email=?,name=?,surname=?,telephone=?,nif=? WHERE id = ? LIMIT 1');
            $query->execute([
                $student['username'],
                password_hash($student['password'], PASSWORD_DEFAULT),
                $student['email'],
                $student['name'],
                $student['surname'],
                $student['telephone'],
                $student['nif'],
                $student['id']
            ]);
        } else {
            $query = $this->db->prepare('UPDATE students SET username=?,email=?,name=?,surname=?,telephone=?,nif=? WHERE id = ? LIMIT 1');
            $query->execute([
                $student['username'],
                $student['email'],
                $student['name'],
                $student['surname'],
                $student['telephone'],
                $student['nif'],
                $student['id']
            ]);
        }
        
    }

    /**
     * Eliminar un estudiante.
     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM students WHERE id = ?');
        $query->execute([$id]);
        $query = $this->db->prepare('DELETE FROM enrollment WHERE id_student = ?');
        $query->execute([$id]);
    }
}
