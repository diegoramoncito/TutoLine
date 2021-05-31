<?php

class Alumno{
    public $id_alumno;
    public $nombre_alumno;
    public $apellido_alumno;
    public $fecha_nacimiento_alumno = '1995-05-29';
    public $telefono_alumno = 1;
    public $email_alumno;
    public $password_alumno;

    function get($id, $db){
        if($id>0){
            $query = "select * from alumnos where id_alumno = $id";
            $result = $db->fetchAll($query);
            foreach($result as $element){
                $this->id_alumno = $element['id_alumno'];
                $this->nombre_alumno = $element['nombre_alumno'];
                $this->apellido_alumno = $element['apellido_alumno'];
                $this->fecha_nacimiento_alumno = $element['fecha_nacimiento_alumno'];
                $this->telefono_alumno = $element['telefono_alumno'];
                $this->email_alumno = $element['email_alumno'];
                $this->password_alumno = $element['password_alumno'];
            }
        }else{
            $query = "insert into alumnos(nombre_alumno,apellido_alumno,telefono_alumno,email_alumno,password_alumno)values('','',1,'','')";
            $db->execute($query);
            $result = $db->fetchAll('SELECT LAST_INSERT_ID()');
            foreach($result as $element){
                $this->id_alumno = $element['LAST_INSERT_ID()'];
            }
        }
    }

    function search($field,$value,$db){
        $result = $db->fetchAll("Select * from alumnos where $field like '%$value%'");
        return $result;
    }

    function executeQuery($query, $db){
        return $db->fetchAll($query);
    }

    function save($db){
        $query = "update alumnos set ";
        $query .= "nombre_alumno = '$this->nombre_alumno'";
        $query .= ",apellido_alumno = '$this->apellido_alumno'";
        $query .= ",fecha_nacimiento_alumno = '$this->fecha_nacimiento_alumno'";
        $query .= ",telefono_alumno = $this->telefono_alumno";
        $query .= ",email_alumno = '$this->email_alumno'";
        $query .= ",password_alumno = '$this->password_alumno'";
        $query .= " where id_alumno = $this->id_alumno";
        log_error($query);
        $db->execute($query);
    }

    function delete($db){
        $query = "delete alumnos where id_alumno = $this->id_alumno";
        $db->execute($query);
    }
    
}
?>