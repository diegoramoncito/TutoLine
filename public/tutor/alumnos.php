<?php
include_once('Tools/config.php');
$id=$_SESSION['id'];
$result = $db->fetchAll("select * from tutors where id_tutor = $id");
foreach($result as $element){
    $name = $element['nombre_tutor']." ".$element['apellido_tutor'];
}

?>