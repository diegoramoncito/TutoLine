<?php
class Tutor{
    public $id_tutor;
    public $nombre_tutor;
    public $apellido_tutor;
    public $fecha_nacimiento_tutor = '1995-05-29';
    public $email_tutor;
    public $password_tutor;
    public $telefono_tutor = 1;
    public $formacion_academica;
    public $categorias_id_categoria;

    function get($id, $db){
        if($id>0){
            $query = "select * from tutors where id_tutor = $id";
            $result = $db->fetchAll($query);
            foreach($result as $element){
                $this->id_tutor = $element['id_tutor'];
                $this->nombre_tutor = $element['nombre_tutor'];
                $this->apellido_tutor = $element['apellido_tutor'];
                $this->fecha_nacimiento_tutor = $element['fecha_nacimiento_tutor'];
                $this->telefono_tutor = $element['telefono_tutor'];
                $this->email_tutor = $element['email_tutor'];
                $this->password_tutor = $element['password_tutor'];
                $this->formacion_academica = $element['formacion_academica'];
                $this->categorias_id_categoria = $element['categorias_id_categoria'];
            }
        }else{
            $query = "insert into tutors(nombre_tutor,apellido_tutor,telefono_tutor,email_tutor,password_tutor,formacion_academica)values('','',1,'','','')";
            $db->execute($query);
            $result = $db->fetchAll('SELECT LAST_INSERT_ID()');
            foreach($result as $element){
                $this->id_tutor = $element['LAST_INSERT_ID()'];
            }
        }
    }

    function search($field,$value,$db){
        $result = $db->fetchAll("Select * from tutors where $field like '%$value%'");
        return $result;
    }

    function executeQuery($query, $db){
        return $db->fetchAll($query);
    }

    function save($db){
        $query = "update tutors set ";
        $query .= "nombre_tutor = '$this->nombre_tutor'";
        $query .= ",apellido_tutor = '$this->apellido_tutor'";
        $query .= ",fecha_nacimiento_tutor = '$this->fecha_nacimiento_tutor'";
        $query .= ",telefono_tutor = $this->telefono_tutor";
        $query .= ",email_tutor = '$this->email_tutor'";
        $query .= ",password_tutor = '$this->password_tutor'";
        $query .= ",formacion_academica = '$this->formacion_academica'";
        $query .= ",categorias_id_categoria = '$this->categorias_id_categoria'";
        $query .= " where id_tutor = $this->id_tutor";
        $db->execute($query);
        error_log($query);
    }

    function delete($db){
        $query = "delete tutors where id_tutor = $this->id_tutor";
        $db->execute($query);
    }
}

?>