<?php
include_once('../Tools/config.php');

$destination = "";
$ruta=intval($_GET['route2']);
$idElement=intval($_GET['passport']);

switch($ruta){
    case 1:
        tutoria($id,$idElement);
        break;
    case 2:
        removeTutoria($id,$idElement);
        break;
    case 3:
        def($id);
        break;
    case 4:
        def($id);
        break;
    case 5:
        def($id);
        break;
    default:
        def();
}


header("Location: $destination");
//die();



function tutoria($id,$idElement){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/alumno/tutorias.php";
    $result = $db->execute("insert into tutoralumno(id_alumno,id_tutor)values($id,$idElement)");
}
function removeTutoria($id,$idElement){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/alumno/tutorias.php";
    $result = $db->fetchAll("select * from tutoralumno where id_alumno = $id and id_tutor = $idElement");
    foreach($result as $element){
        $idTutoralumno = $element['id'];
    }
    //Borrar tareas
    $result = $db->execute("delete from tareas where alumno_id_alumno = $id and tutor_id_tutor = $idElement");
    //Borrar objetivos
    $result = $db->execute("delete from objetivos where alumno_id_alumno = $id and tutor_id_tutor = $idElement");
    //Borrar asignacion de tutor a alumno
    $result = $db->execute("delete from tutoralumno where id = $idTutoralumno");
}
function def($id){
    GLOBAL $destination;
    GLOBAL $db;
    include_once('../Model/objetivo.php');
    $destination = "/alumno/tutorias.php";
    $element = new Objetivo();
    $element->get($id,$db);
    $element->delete($db);
}
?>