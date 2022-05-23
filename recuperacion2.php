<?php
session_start();

require("vistas/recuperacion2.view.php");

function detectar($passwd) {
    if ($passwd === strtoupper($passwd)) {
        return 1;
    }

    if ($passwd === strtolower($passwd)) {
        return -1;
    }

    return 0;
}

function simbolos($passwd) {
    $simbolos_permitidos = array("-","_","@","$","&","!","#","%","*","+",":","/",".",";",">","<","=","?","^");
    foreach ($simbolos_permitidos as $key => $value) {
        $pos = strpos($passwd, $simbolos_permitidos[$key]);
        if ($pos === false) {
            $resultado = false;
        } else {
            return true;
        } 
        
    }
    return $resultado;
}

function numeros($passwd) {
    $num = array("0","1","2","3","4","5","6","7","8","9");
    foreach ($num as $key => $value) {
        $pos = strpos($passwd, $num[$key]);
        echo $pos;
        if ($pos === false) {
            $resultado = false;
        } else {
            return true;
        } 
        
    }
    return $resultado;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $password = $_POST["password"];
    if (!empty($_POST["password"])){
        
        if($_POST["password"] == $_POST["password2"]){
            if (strlen($password) < 8 ) {
                $_SESSION['error'] = "<li>La contraseña debe tener minimo 8 caracteres</li>";
                header('Location: recuperacion.php');
            }else {
                if (detectar($password) != 0) {
                    $_SESSION['error'] = "La contraseña debe contener minimo una mayuscula y una minuscula";
                    header('Location: recuperacion.php');
                } else {
                    if (simbolos($password) == false) {
                        $_SESSION['error'] = "La contraseña debe contener minimo un caracter especial  Ej: (-,_,@,/,?,...)";
                        header('Location: recuperacion.php');
                    } else {
                        if (numeros($password) == false) {
                            $_SESSION['error'] = "La contraseña debe contener minimo un número";
                            header('Location: recuperacion.php');
                        } else {
                            require "connect.php";

            
                            $password = hash('sha512', $_POST["password"]);
                            $mail = $_SESSION["email"];
            
                            $update = $conexion->query('UPDATE passwords SET passwd = "'.$password.'" WHERE mail = "'.$mail.'"'); 
                            
                            if($update){
                                session_destroy();
                                header('Location: login.php');
                            }
                            
                        }
                    }
                }
            }
        } else {
            $_SESSION['error'] = "<li>Las contraseñas no son iguales</li>";
            session_destroy();
            header('Location: recuperacion.php');
        }
    } else {
        if ($_POST["codigo"] == $_SESSION["codigo"]){
            $_SESSION["ocultar"] = 1;
            $_SESSION["ocultar_"] = 1;
            $_SESSION["ocultar2"] = 1;
            $_SESSION["ocultar3"] = 1;
            $_SESSION["msg"] = 1;
            echo'<script type="text/javascript">
                    alert("BIEEEEEN");
                </script>';
            header('Location: recuperacion.php');
        }else {
                $_SESSION['error'] = "El codigo de validación es erróneo";
                header('Location: recuperacion.php');
        }
    }
}
?>