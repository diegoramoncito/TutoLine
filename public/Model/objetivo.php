<?php
class Objetivo{
    public $id_objetivo;
    public $nombre_objetivo;
    public $descripcion_objetivo;
    public $estado_objetivo;
    public $alumno_id_alumno;
    public $tutor_id_tutor;
    
    function get($id, $db){
        if($id>0){
            $query = "select * from objetivos where id_objetivo = $id";
            $result = $db->fetchAll($query);
            foreach($result as $element){
                $this->id_objetivo = $element['id_objetivo'];
                $this->nombre_objetivo = $element['nombre_objetivo'];
                $this->descripcion_objetivo = $element['descripcion_objetivo'];
                $this->estado_objetivo = $element['estado_objetivo'];
                $this->alumno_id_alumno = $element['alumno_id_alumno'];
                $this->tutor_id_tutor = $element['tutor_id_tutor'];
            }
        }else{
            $query = "insert into objetivos(nombre_objetivo,descripcion_objetivo,estado_objetivo,alumno_id_alumno,tutor_id_tutor)values('','','',(select min(id_alumno) from alumnos),(select min(id_tutor) from tutors))";
            $db->execute($query);
            $result = $db->fetchAll('SELECT LAST_INSERT_ID()');
            foreach($result as $element){
                $this->id_objetivo = $element['LAST_INSERT_ID()'];
            }
        }
    }

    function search($field,$value,$db){
        $result = $db->fetchAll("Select * from objetivos where $field like '%$value%'");
        return $result;
    }

    function executeQuery($query, $db){
        return $db->fetchAll($query);
    }

    function save($db){
        $query = "update objetivos set ";
        $query .= "nombre_objetivo = '$this->nombre_objetivo'";
        $query .= ",descripcion_objetivo = '$this->descripcion_objetivo'";
        $query .= ",estado_objetivo = '$this->estado_objetivo'";
        $query .= ",alumno_id_alumno = $this->alumno_id_alumno";
        $query .= ",tutor_id_tutor = $this->tutor_id_tutor";
        $query .= " where id_objetivo = $this->id_objetivo";
        $db->execute($query);
    }

    function delete($db){
        $query = "delete from objetivos where id_objetivo = $this->id_objetivo";
        $db->execute($query);
    }
    
}