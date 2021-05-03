<?php
/**
 * Modelo para los horarios.
 */
class Schedule {
    protected $db;
 
    public function __construct()
    {
        $this->db = SPDO::singleton();
    }
 
    /**
     * Obtener el número total de horarios.
     */
    public function getTotal()
    {
        $query = $this->db->prepare('SELECT COUNT(*) FROM schedule');
        $query->execute();
        return $query->fetch()[0];
    }

    public function getLastInsertId()
    {
        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId;
    }

    /**
     * Obtener todos los horarios del estudiante logueado
     */
    public function getSchedule(){

        //Obtenemos el id del curso en el que está enrolado el estudiante
        $id_student = (int) $_SESSION['user']['id'];
        $queryforId = $this->db->prepare("SELECT enrollment.id_course FROM enrollment
        JOIN courses ON enrollment.id_course=courses.id_course WHERE enrollment.id_student = :id_student"); 
        $queryforId->bindParam(":id_student", $id_student);
        $queryforId->execute();
        $id_course = $queryforId->fetchColumn(); 

        //Obtenemos los horarios de las clases del curso en el que está enrolado el estudiante que hemos obtenido con la query anterior

        $query = $this->db->prepare('SELECT schedule.id_class AS id_class, schedule.id_schedule, schedule.time_start, schedule.time_end, schedule.day, class.name AS name FROM schedule 
        INNER JOIN class ON schedule.id_class=class.id_class WHERE id_course = :id_course'); 
        $query->bindParam(":id_course", $id_course);
        $query->execute();
        $result = $query->fetchAll();
        $data = array();
        foreach($result as $row){
            $data[] = array(
                'id'   => $row["id_class"],
                'title'   => $row["name"],
                'start'   => $row["day"]." ".$row["time_start"],
                'end'   =>$row["day"]." ".$row["time_end"],
                'type' =>'schedule'
            );
        }
        return $data; 
    }

    public function create($schedule)
    {
        // schedule
        $query = $this->db->prepare('
        INSERT INTO schedule (id_class, time_start, time_end, day)
        VALUES (?, ?, ?, ?)
        ');
        $query->execute([ 
            $schedule['id_class'],
            $schedule['time_start'],
            $schedule['time_end'],
            $schedule['day'],
        ]);
        $id_schedule = $this->db->lastInsertId();                  

        return $id_schedule;
    }
}


