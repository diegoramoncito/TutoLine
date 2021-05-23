<?php
$destination = "";
echo $_GET['route1'];
echo "\n";
echo intval($_GET['route1']);
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
            
}
/*
header("Location: $destination");
die();


function login(){
    $destination = "/login.html";
}

function register(){
    $destination = "/register.html";
}

function crud(){
    destination = "/data.html";
}
*/


?>