<?php
include_once('/Tools/config.php');
include_once('/Model/alumno.php');
include_once('/Model/tutor.php');

//$result = Alumno->search("email","andre",$db);
//$alumno = Alumno->get(0,$db);
// $alumno->nombre_alumno="Juan";
// $alumno->email_alumno="juan"
// $alumno->password="123";
// $alumno->save($db);

$result = $db->fetchAll("Select * from alumnos where email like '%1%'");
print_r($result);
echo "Hello world";

?>