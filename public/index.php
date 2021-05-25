<?php
session_start();
if(isset($_SESSION['type'])){
    $destination ="admin.php";
    if($_SESSION['type'] == "alumno")
        $destination = "alumno.php";
    if($_SESSION['type'] == "tutor")
        $destination = "tutor.php";
    header("Location: $destination");
}else{
    header("Location: /login.html");
}

?>