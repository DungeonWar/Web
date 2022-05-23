<?php

session_start();

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

    extract($_POST);

    $username = filter_var(strtolower($username), FILTER_SANITIZE_STRING); 

    $imgContent = file_get_contents('imagen/user_icon.png');

    $error = "";

    if (empty($username) or empty($password) or empty($password2) or empty($mail)) {
        $error .="<li class='error'>Por favor rellena todos los campos correctamente</li>";
    } else {
        try {
            require "connect.php";

        } catch (PDOException $e) {
            echo "<li>Error: " . $e->getMessage()."</li><br>";
        }

        $statement = $conexion->prepare('SELECT * FROM users WHERE username = :user LIMIT 1');
		$statement->execute(array(':user' => $username));

        $statement2 = $conexion->prepare('SELECT * FROM mails WHERE mail = :mail LIMIT 1');
		$statement2->execute(array(':mail' => $mail));

        $resultado = $statement->fetch();
        $resultado2 = $statement2->fetch();

        if ($resultado != false) {
			$error .= '<li>El nombre de usuario ya existe</li><br>';
		} 
        if ($resultado2 != false) {
            $error .= '<li>El correo ya existe</li><br>';
        }

        if ($password != $password2) {
            $error.= '<li>Las contraseñas no son iguales</li><br>';
        }

        if (strlen($password) < 8 ) {
            $error .= '<li>La contraseña debe tener minimo 8 caracteres</li><br>';
        }

        if (detectar($password) != 0) {
            $error .= '<li>La contraseña debe contener minimo una mayuscula y una minuscula</li><br>';
        } 
            
        if (simbolos($password) == false) {
            $error .= '<li>La contraseña debe contener minimo un caracter especial  Ej: (-,_,@,/,?,...)</li><br>';
        } 

        if (numeros($password) == false) {
            $error .= '<li>La contraseña debe contener minimo un número</li><br>';

        } 
       
        
        $password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

       
    }
    if ($error == '') {

		$statement = $conexion->prepare('INSERT INTO users(ID,username) VALUES (null, :usuario)');
        $statement->execute(array(
            ':usuario' => $username
        ));
        $statement2 = $conexion->prepare('INSERT INTO mails(username,mail) VALUES (:usuario,:correo)');
        $statement2->execute(array(
            ':usuario' => $username,
            ':correo' => $mail
        ));
        $statement3 = $conexion->prepare('INSERT INTO passwords(mail,passwd) VALUES (:correo,:passwd)');
        $statement3->execute(array(
            ':correo' => $mail,
            ':passwd' => $password
        ));

        $statement4 = $conexion->prepare('INSERT INTO icons(mail,images) VALUES (:correo,:imagen)');
        $statement4->execute(array(
            ':correo' => $mail,
            ':imagen' => $imgContent
        ));
        
        $statement4 = $conexion->prepare('INSERT INTO rangos(mail) VALUES (:correo)');
        $statement4->execute(array(
            ':correo' => $mail,
        ));

        $statement4 = $conexion->prepare('INSERT INTO ranking(username) VALUES (:usuario)');
        $statement4->execute(array(
            ':usuario' => $username
        ));

        header('Location: login.php');
    }
}

require "vistas/registro.view.php";


?>
