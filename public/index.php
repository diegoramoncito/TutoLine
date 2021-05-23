<?php
include_once('/Tools/config.php');
include_once('/Model/alumno.php');
include_once('/Model/tutor.php');

$alumno = Alumno->get(0,$db);
$alumno->nombre_alumno="Juan";
$alumno->email_alumno="juan"
$alumno->password="123";
$alumno->save($db);
echo "Hello world";

?>