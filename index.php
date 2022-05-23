<?php 
session_start();

$mail = $_SESSION["mail"];
require "connect.php";



for ($i=0; $i < 9 ; $i++) {
    $statement4 = $conexion->query("SELECT ID FROM noticias ORDER BY ID DESC LIMIT $i,1")->fetch();
    $noticia[$i] = $conexion->query("SELECT * FROM noticias WHERE ID = $statement4[0]")->fetch();
}


require "vistas/index.view.php";
?>