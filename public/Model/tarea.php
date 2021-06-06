<?php

class Tarea{

    public $id_tarea;
    public $nombre_tarea;
    public $descripcion_tarea;
    public $estado_tarea;
    public $fecha_entrega;
    public $calificacion_tarea;
    public $comentarios_tarea;
    public $entregable_tarea;
    public $alumno_id_alumno;
    public $tutor_id_tutor;

    function get($id, $db){
        if($id>0){
            $query = "select * from tareas where id_tarea = $id";
            $result = $db->fetchAll($query);
            foreach($result as $element){
                $this->id_tarea = $element['id_tarea'];
                $this->nombre_tarea = $element['nombre_tarea'];
                $this->descripcion_tarea = $element['descripcion_tarea'];
                $this->estado_tarea = $element['estado_tarea'];
                $this->calificacion_tarea = $element['calificacion_tarea'];
                $this->comentarios_tarea = $element['comentarios_tarea'];
                $this->entregable_tarea = $element['entregable_tarea'];
                $this->alumno_id_alumno = $element['alumno_id_alumno'];
                $this->tutor_id_tutor = $element['tutor_id_tutor'];
            }
        }else{
            $query = "insert into tareas(nombre_tarea,descripcion_tarea,calificacion_tarea,comentarios_tarea,entregable_tarea,estado_tarea)values('','',1,'','','')";
            $db->execute($query);
            $result = $db->fetchAll('SELECT LAST_INSERT_ID()');
            foreach($result as $element){
                $this->id_tarea = $element['LAST_INSERT_ID()'];
            }
        }
    }

    function search($field,$value,$db){
        $result = $db->fetchAll("Select * from tareas where $field like '%$value%'");
        return $result;
    }

    function executeQuery($query, $db){
        return $db->fetchAll($query);
    }

    function save($db){
        $query = "update tareas set ";
        $query .= "nombre_tarea = '$this->nombre_tarea'";
        $query .= ",descripcion_tarea = '$this->descripcion_tarea'";
        $query .= ",estado_tarea = '$this->estado_tarea'";
        $query .= ",calificacion_tarea = $this->calificacion_tarea";
        $query .= ",comentarios_tarea = '$this->comentarios_tarea'";
        $query .= ",entregable_tarea = '$this->entregable_tarea'";
        $query .= ",alumno_id_alumno = $this->alumno_id_alumno";
        $query .= ",tutor_id_tutor = $this->tutor_id_tutor";
        $query .= " where id_tarea = $this->id_tarea";
        $db->execute($query);
        error_log($query);
    }

    function delete($db){
        $query = "delete from tareas where id_tarea = $this->id_tarea";
        $db->execute($query);
    }
}

