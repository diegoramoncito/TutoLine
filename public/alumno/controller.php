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
        categoria($id);
        break;
    case 3:
        objetivo($id);
        break;
    case 4:
        tarea($id);
        break;
    case 5:
        tutor($id);
        break;
    default:
        fnDefault();
}


header("Location: $destination");
//die();



function tutoria($id,$idElement){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/alumno/tutorias.php";
    $result = $db->execute("insert into tutoralumno(id_alumno,id_tutor)values($id,$idElement)");
}
function categoria($id){
    GLOBAL $destination;
    GLOBAL $db;
    include_once('../Model/categoria.php');
    $destination = "/admin/categorias.php";
    $element = new Categoria();
    $element->get($id,$db);
    $element->delete($db);
}
function objetivo($id){
    GLOBAL $destination;
    GLOBAL $db;
    include_once('../Model/objetivo.php');
    $destination = "/admin/objetivos.php";
    $element = new Objetivo();
    $element->get($id,$db);
    $element->delete($db);
}
function tarea($id){
    GLOBAL $destination;
    GLOBAL $db;
    include_once('../Model/tarea.php');
    $destination = "/admin/tareas.php";
    $element = new Tarea();
    $element->get($id,$db);
    $element->delete($db);
}
function tutor($id){
    GLOBAL $destination;
    GLOBAL $db;
    include_once('../Model/tutor.php');
    $destination = "/admin/tutores.php";
    $element = new Tutor();
    $element->get($id,$db);
    $element->delete($db);
}


?>