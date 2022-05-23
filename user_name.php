<?php 
session_start();
        
        try {
            require "connect.php";

        } catch (PDOException $e) {
            echo "<li>Error: " . $e->getMessage()."</li>";
        }

        $sesion_username = $_SESSION["mail"];
        


    $rango = $conexion->query("SELECT rango FROM rangos WHERE mail = '$sesion_username' LIMIT 1");


    $resultado = $rango->fetch();


    $rango = $resultado[0];

        $statement = $conexion->prepare("SELECT username FROM mails WHERE mail = :correo");
        $statement->execute(array(
            ":correo" => $sesion_username
        ));

        // IMAGENES 
        $statement2 = $conexion->prepare("SELECT images FROM icons WHERE mail = :correo");
        $statement2->execute(array(
            ":correo" => $sesion_username
        ));

        //------------

        $resultado = $statement->fetch();
        $resultado1 = $statement2->fetch();
        $username = $resultado[0];
        $icon = $resultado1[0]; 
        
        $_SESSION["name"] = $username;
        $_SESSION["icon"] = $icon;
        echo ' <li class="services" style="margin-left:20%">
        <a> '.ucfirst($username).'</a>
        <ul class="dropdown_user">';

        if ($rango == "admin") {
            echo '<li><a href="panel_admin.php">Panel de Control</a></li>';
        }
        
            echo '<li><a href="user_editar.php">Editar  <br>Perfil</a></li>
            <li><a href="cerrar_sesion.php"> Cerrar <br> Sesión</a></li>
        </ul>
        </li>';   
        echo '<img class="img" src="data:image/png;base64,'.base64_encode($icon).'"/>&nbsp';

                  
?>