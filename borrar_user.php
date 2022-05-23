<?php

session_start();
require "connect.php";

$statement1 = $conexion->query('SELECT rango FROM rangos where mail = "'.$_SESSION["mail"].'"');
$rango = $statement1->fetch();
if ($rango[0] != "admin"){
header("Location:index.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    extract($_POST);

    try {
        require "connect.php";
     } catch (PDOException $e) {
         echo "<li>Error: " . $e->getMessage()."</li>";
         }

         $statement = $conexion->query('DELETE FROM users  WHERE username = "'.$valores.'"');  

         header('Location: panel_admin.php');

}

?>