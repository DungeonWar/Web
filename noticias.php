<?php
session_start();

//ALTER TABLE noticias AUTO_INCREMENT = 1;

$mail = $_SESSION["mail"];
require "connect.php";


$rango = $conexion->query("SELECT rango FROM rangos WHERE mail = '$mail' LIMIT 1");


$resultado = $rango->fetch();


$rango = $resultado[0];

for ($i=0; $i < 9 ; $i++) {
    $statement4 = $conexion->query("SELECT ID FROM noticias ORDER BY ID DESC LIMIT $i,1")->fetch();
    $noticia[$i] = $conexion->query("SELECT * FROM noticias WHERE ID = $statement4[0]")->fetch();
}

require "vistas/noticias.view.php";
    
?>