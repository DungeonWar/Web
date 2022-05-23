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

       
        $error= "";
        
        echo $_SESSION['mail_user'];

    	$statement1 = $conexion->prepare('SELECT * FROM mails WHERE mail = :correo LIMIT 1');
	    $statement1->execute(array(':correo' => $mail));

        $statement2 = $conexion->prepare('SELECT * FROM users WHERE username = :nombre LIMIT 1');
	    $statement2->execute(array(':nombre' => $username));
           

        $resultado = $statement1->fetch();


        if ($_SESSION["mail_user"] != $mail) {
            if ($resultado != false) {
                $error .= "<li>$mail</li>";


                $error .= '<li>El correo ya existe</li>';
            }
        }
        $resultado = $statement2->fetch();

       if ($_SESSION["name_user"] != $username) {
            if ($resultado != false) {
                $error .= '<li>El nombre de usuario ya existe</li>';
            }
        }
    	
        if (!empty($passwd)) {
            $passwd = hash('sha512', $passwd);
        }

    if ($error == '') {
           
        $correo = $_SESSION["mail_user"];
        $user = $_SESSION["name_user"];

                if (!empty($passwd)) {
                    $statement = $conexion->query('UPDATE passwords SET passwd = "'.$passwd.'" WHERE mail = "'.$correo.'"');  
                }
                if (!empty($mail)) {
                    $statement2 = $conexion->query('UPDATE mails SET mail = "'.$mail.'" WHERE mail = "'.$correo.'"');  
                }
                if (!empty($username)) {
                    $statement3 = $conexion->query('UPDATE users SET username = "'.$username.'" WHERE username = "'.$user.'"');  
                }
                
                $statement4 = $conexion->query('UPDATE rangos SET rango = "'.$rango.'" WHERE mail = "'.$mail.'"');  


            header('Location: panel_admin.php');

        } else {
            echo $error;
        }

	
}