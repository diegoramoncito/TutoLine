<?php
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
    echo "Login\n";
    $destination = "/login.html";
}

function register(){
    GLOBAL $destination;
    echo "Register\n";
    $destination = "/register.html";
}

function crud(){
    GLOBAL $destination;
    echo "Crud\n";
    $destination = "/data.html";
}

function fnDefault(){
    GLOBAL $destination;
    echo "Default\n";
}

?>