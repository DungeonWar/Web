<?php 
session_start();

require "connect.php";


for ($i=0; $i < 10 ; $i++) {
    $statement = $conexion->query("SELECT username FROM ranking ORDER BY Puntos DESC LIMIT $i,1")->fetch();
    $nombres = $statement[0];

    $usr[$i] = $conexion->query("SELECT * FROM ranking WHERE username = '$nombres'")->fetch();
}

/* $statement4 = $conexion->query("SELECT ID FROM noticias ORDER BY ID DESC LIMIT $i,1")->fetch();
    $noticia[$i] = $conexion->query("SELECT * FROM noticias WHERE ID = $statement4[0]")->fetch();*/

require "vistas/ranking.view.php" ;
?>