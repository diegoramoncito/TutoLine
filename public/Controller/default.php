<?php
include_once('Tools/config.php');

$destination = "";
$ruta=intval($_GET['route1']);

switch($ruta){
    case 1:
        login();
        break;
    case 2:
        register();
        break;
    case 3:
        register();
        break;
    case 4:
        register();
        break;
    default:
        fnDefault();
}


header("Location: $destination");
die();



function login(){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/login.html";
}

function register(){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/register.html";

    $tipo = $_POST['AlumnoProfesor'];
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($tipo == "alumno"){
        include_once('Model/Alumno.php');
        $alumno = Alumno->get(0,$db);
        $alumno->nombre_alumno=$nombre;
        $alumno->email_alumno=$email;
        $alumno->password=$password;
        $alumno->save($db);
    }else{
        include_once('Model/Tutor.php');
        $tutor = Tutor->get(0,$db);
        $tutor->nombre_tutor=$nombre;
        $tutor->email_alumno=$email;
        $tutor->password=$password;
        $tutor->save($db);
    }
}

function crud(){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/data.html";
}

function fnDefault(){
    GLOBAL $destination;
    $destination = "/index.php";

}

?>