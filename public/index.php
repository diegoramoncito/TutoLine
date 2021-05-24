<?php
if(isset($_SESSION['type'])){
    $destination ="";
    if($_SESSION['type'] == "alumno")
        $destination = "alumno.php";
    if($_SESSION['type'] == "tutor")
        $destination = "tutor.php";
    header("Location: $destination");
}else{
    header("Location: /login.html");
}

?>