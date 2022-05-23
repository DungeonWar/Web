<?php
session_start();


require "connect.php";

$mail = $_SESSION["mail"];

if (isset($_SESSION["mail"])) {
    $resultat = $conexion->query("SELECT rango FROM rangos WHERE mail = '$mail'");
    $editor = $resultat->fetch();
    if ($editor[0] == "editor" || $editor[0] == "admin") {
        require "vistas/crearnoticias.view.php";
    } else {
        echo "<script>
        alert ('Solo personal autorizado');
        window.location ='noticias.php';
        </script>";
    }
} else {
    header("Location: login.php");
} 

?>