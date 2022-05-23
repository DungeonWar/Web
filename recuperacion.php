<?php
session_start();
require "vistas/recuperacion.view.php";


if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    

    if ($_SESSION["codigo"] == $_POST["codigo"]) {
        header("Location: recuperacion2.php");
    }

}

?>