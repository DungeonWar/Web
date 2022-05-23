<?php
session_start();
require "connect.php";
    extract($_POST);
    $valores = explode(" ", $valores);

    $leng = strlen($valores[1]);
 
    $correo = "$valores[2]";
    $leng2 = strlen($correo);
    

    $_SESSION["name_user"] = substr($valores[1],0,$leng);
    $_SESSION["mail_user"] = substr($correo,0,$leng2);

    require "vistas/edit_user2.view.php"

?>