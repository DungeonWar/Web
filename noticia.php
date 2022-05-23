<?php

session_start();

require "connect.php";

$mail = $_SESSION["mail"];



for ($i=0; $i < 9; $i++) {
    if ($_GET['num'] == $i){
    $statement5 = $conexion->query("SELECT * FROM noticias order by ID DESC LIMIT $i,1");
    $resultado5.$i = $statement5->fetch();
    
    //$_SESSION["ID"] = $resultado5.$i[0];
    
    }
}

require "vistas/noticia.view.php";

?>