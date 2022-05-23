<?php
session_start();
require 'PHPMailer/PHPMailerAutoload.php';
require "vistas/recuperar.view.php";


if($_SERVER['REQUEST_METHOD'] == 'POST') {

for ($i=0; $i < 6; $i++) { 
        $codigo .= rand(0, 9);
    }
    
    $email = $_POST["mail"];
    $_SESSION["email"] = $email;
    $_SESSION["codigo"] = $codigo;
    
    require "connect.php";



    $statement = $conexion->prepare("SELECT username FROM mails WHERE mail = :correo");
        $statement->execute(array(
        ':correo' => $email,
        ));
    
        $user = $statement->fetch();

    if (!empty($user[0])){
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
 
        //Configuracion servidor mail
        $mail->setFrom('soporte-tecnico@dungeonwar.online', 'Dungeon War-Soporte técnico'); //remitente
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl'; //seguridad
        $mail->Host = "authsmtp.securemail.pro"; // servidor smtp
        $mail->Port = 465; //puerto
        $mail->Username ='soporte-tecnico@dungeonwar.online'; //nombre usuario
        $mail->Password = 'pollete10-'; //contraseña
        $mail->CharSet = 'UTF-8';
        
        //Agregar destinatario
        
        $file = file_get_contents('https://www.dungeonwar.es/plantillas/contrasena.html');
        $contenido = array('email', 'codigo', 'user');
        $busqueda = array($email, $codigo, ucfirst($user[0]));
        
        $mail->AddAddress("$email");
        $mail->Subject = 'Recuperación de Contraseña';
        $mail->Body = str_replace($contenido, $busqueda, $file);
        $mail->IsHTML(true);

        //Avisar si fue enviado o no y dirigir al index 
        if ($mail->Send()) {
            echo'<script type="text/javascript">
                   alert("Enviado Correctamente");
                   window.location ="recuperacion.php";
                </script>';
        } else {
            echo'<script type="text/javascript">
                   alert("NO ENVIADO, intentar de nuevo");
                </script>';
    
        }
    } else {
        echo'<script type="text/javascript">
                alert("El correo que ha introducido no corresponde a ninguna cuenta");
            </script>';
    }
}
//"From: dungeonwaronline@gmail.com");
?>