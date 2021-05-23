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

echo "header(\"Location: $destination\")";
//die();


function login(){
    echo "Login\n";
    $destination = "/login.html";
}

function register(){
    echo "Register\n";
    $destination = "/register.html";
}

function crud(){
    echo "Crud\n";
    $destination = "/data.html";
}

function fnDefault(){
    echo "Default\n";
}

?>