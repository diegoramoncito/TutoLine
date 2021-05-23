<?php

class Alumno{
    public $id_alumno;
    public $nombre_alumno;
    public $apellido_alumno;
    public $fecha_nacimiento_alumno;
    public $telefono_alumno;
    public $email_alumno;
    public $password_alumno;

    function get($id, $db){
        if($id>0){
            $query = "select * from alumnos where id_alumno = $id";
            $result = $db->fetchAll($query);
            foreach($result as $element){
                $id_alumno = $element['id_alumno'];
                $nombre_alumno = $element['nombre_alumno'];
                $apellido_alumno = $element['apellido_alumno'];
                $fecha_nacimiento_alumno = $element['fecha_nacimiento_alumno'];
                $telefono_alumno = $element['telefono_alumno'];
                $email_alumno = $element['email_alumno'];
                $password_alumno = $element['password_alumno'];
            }
        }else{
            $query = "";
            $db->execute($query);
            $result = $db->fetchAll('SELECT LAST_INSERT_ID()');
            foreach($result as $element){
                $id_alumno = $element['id_alumno'];
            }
        }
    }

    function save($db){
    }

    function delete($db){
    }
    
}
?>