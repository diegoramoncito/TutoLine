<?php

class Categoria{

    public $id_categoria;
    public $nombre_categoria;
    public $descripcion_categoria;
    public $dificultad = 0;

    function get($id, $db){
        if($id>0){
            $query = "select * from categorias where id_categoria = $id";
            $result = $db->fetchAll($query);
            foreach($result as $element){
                $this->id_categoria = $element['id_categoria'];
                $this->nombre_categoria = $element['nombre_categoria'];
                $this->descripcion_categoria = $element['descripcion_categoria'];
                $this->dificultad = $element['dificultad'];
            }
        }else{
            $query = "insert into categorias(nombre_categoria,descripcion_categoria, dificultad)values('','',0)";
            $db->execute($query);
            $result = $db->fetchAll('SELECT LAST_INSERT_ID()');
            foreach($result as $element){
                $this->id_categoria = $element['LAST_INSERT_ID()'];
            }
        }
    }

    function search($field,$value,$db){
        $result = $db->fetchAll("Select * from categorias where $field like '%$value%'");
        return $result;
    }

    function executeQuery($query, $db){
        return $db->fetchAll($query);
    }

    function save($db){
        $query = "update categorias set ";
        $query .= "nombre_categoria = '$this->nombre_categoria'";
        $query .= ",descripcion_categoria = '$this->descripcion_categoria'";
        $query .= ",dificultad = '$this->dificultad'";
        $query .= " where id_categoria = $this->id_categoria";
        $db->execute($query);
    }

    function delete($db){
        $query = "delete from categorias where id_categoria = $this->id_categoria";
        $db->execute($query);
    }
    
}