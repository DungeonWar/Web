<?php
require 'PHPMailer/PHPMailerAutoload.php';
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    extract($_POST);
    $error = "";
    $acierto = "";

    if ($email != "" && $name != "" && $asunto != "" && $message != "" ) {

        if (isset ($_POST['g-recaptcha-response']) && !empty ($_POST['g-recaptcha-response'])) {
            $secret = '6Lf89DceAAAAAOpYVAXoZGL-be0h20Y8lKyw034L'; 
            $verificarResponse = file_get_contents ('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST ['g-recaptcha-response']); 
            $responseData = json_decode ($verificarResponse); 
            if ($responseData-> success) {
        
                $mail = new PHPMailer();
                $mail->IsSMTP();
 
               //Configuracion servidor mail
                switch ($department) {
                    case 'Soporte técnico':
                        $rem = 'soporte-tecnico@dungeonwar.online';
                    break;
                    case 'Facturación':
                        $rem = 'facturacion@dungeonwar.online';
                    break;
                }
        
                $mail->setFrom('equipo-directivo@dungeonwar.online', 'Dungeon War-Dirección'); //remitente
                $mail->addBCC('dungeonwaronline@gmail.com');
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl'; //seguridad
                $mail->Host = "authsmtp.securemail.pro"; // servidor smtp
                $mail->Port = 465; //puerto
                $mail->Username = 'equipo-directivo@dungeonwar.online'; //nombre usuario
                $mail->Password = 'pollete10-'; //contraseña
                $mail->CharSet = 'UTF-8';
        
                //Agregar destinatario
        
                $fecha = date("j/m/Y/ G:i:s");
                
                $file = file_get_contents('plantillas/consulta.html');
                $contenido = array('email', 'user', 'texto', 'departamento', 'fecha');
                $busqueda = array($email, ucfirst($name), $message, $department, $fecha);
        
                $mail->AddAddress("$rem");
                $mail->Subject = 'Consulta Usuario';
            $mail->Body = str_replace($contenido, $busqueda, $file);
                $mail->IsHTML(true);

                //Avisar si fue enviado o no y dirigir al index
        
                if ($mail->Send()) {
            
                   // $_SESSION['acierto'] = '<li>Su consulta ha sido enviada con éxito</li>';
                    $acierto .= "<li>Su consulta ha sido enviada con éxito</li>";
            
                } else {
                    //$_SESSION['error'] = '<li>Error en el envio</li>';
                    $error .= "<li>Error en el envio</li>";
            }
        
       } else {
           // $_SESSION['error'] = '<li>Falló la verificación del robot, intente nuevamente.</li>';
            $error .= "<li>Falló la verificación del robot, intente nuevamente.</li>";

        }
    } else {
       // $_SESSION['error'] = '<li>Falló la verificación del robot, intente nuevamente.</li>';
        $error .= "<li>Falló la verificación del robot, intente nuevamente.</li>";

    }   
    }else {
        $error .= "<li>Por favor, rellena todos los campos</li>";
    }
} 
    


require("vistas/contact.view.php");

?>