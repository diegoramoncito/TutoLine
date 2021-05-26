<?php
include_once('../Tools/config.php');

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
//die();



function login(){
    GLOBAL $destination;
    GLOBAL $db;
    $destination = "/login.html";
    $user = $_POST['email'];
    $password = $_POST['password'];

    if(strtolower($user) == "admin@gmail.com"){
        //verificar administrador
        if(strtolower($password) == "admin"){
            $_SESSION['type']="admin";
            $_SESSION['id']=1;
            $destination = "/admin.php";
        }
    }else{
        //buscar alumno
        $result = $db->fetchAll("select * from alumnos where email_alumno = '$user' and password_alumno = '$password'");
        if(sizeof($result) == 1){
            foreach($result as $element){
                $_SESSION['type']="alumno";
                $_SESSION['id']=$element['id_alumno'];
                $destination = "/alumno.php";
                return;
            }
        }
        //buscar profesor
        $result = $db->fetchAll("select * from tutors where email_tutor = '$user' and password_tutor = '$password'");
        if(sizeof($result) == 1){
            foreach($result as $element){
                $_SESSION['type']="tutor";
                $_SESSION['id']=$element['id_tutor'];
                $destination = "/tutor.php";
                return;
            }
        }
    }
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
        $result = $db->fetchAll("select * from alumnos where email_alumno = '$email'");
        if(sizeof($result) == 0){
            include_once('../Model/alumno.php');
            $alumno = new Alumno();
            $alumno->get(0,$db);
            $alumno->nombre_alumno=$nombre;
            $alumno->email_alumno=$email;
            $alumno->password_alumno=$password;
            $alumno->save($db);
            $destination = "/login.html";
        }
    }else{
        $result = $db->fetchAll("select * from tutors where email_tutor = '$email'");
        if(sizeof($result) == 0){
            include_once('../Model/tutor.php');
            $tutor = new Tutor();
            $tutor->get(0,$db);
            $tutor->nombre_tutor=$nombre;
            $tutor->email_tutor=$email;
            $tutor->password_tutor=$password;
            $tutor->save($db);
            $destination = "/login.html";
        }
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