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
    
    
   try {
          
    require "connect.php";


        } catch (PDOException $e) {
            echo "<li>Error: " . $e->getMessage()."</li>";
        }
        $error= "";

        

    	$statement1 = $conexion->prepare('SELECT * FROM mails WHERE mail = :correo LIMIT 1');
	    $statement1->execute(array(':correo' => $mail));

        if (empty($password)) {
            $error .= "La contraseña antigua es obligatoria";
        } else {
            $password = hash('sha512', $password);
            $correo = $_SESSION["mail"];
            $statement = $conexion->query("SELECT * FROM passwords WHERE mail = '$correo' AND passwd = '$password'");
            $resultado2 = $statement->fetch();
            if ($resultado2 === false) {
                $error .= "<li>Datos incorrectos</li>";
            }
    
        }

       
        $resultado = $statement1->fetch();

        if ($_SESSION["mail"] != $mail) {
            if ($resultado != false) {
                $error .= '<li>El correo ya existe</li>';
            }
        }
    	
        if (!empty($password2)) {
            
            if ($password == $password2) {
                $error.= "<li>Las contraseñas no pueden ser iguales</li>";
            }
        
            if (detectar($password2) != 0) {
                $error .= '<li>La contraseña debe contener minimo una mayuscula y una minuscula</li>';
            } 
                
            if (simbolos($password2) == false) {
                $error .= '<li>La contraseña debe contener minimo un caracter especial  Ej: (-,_,@,/,?,...)</li>';
            } 

            if (numeros($password2) == false) {
                $error .= '<li>La contraseña debe contener minimo un número</li>';
            } 

            $password2 = hash('sha512', $password2);
    }

	

	if ($error == '') {
	

		$correo = $_SESSION["mail"];
        $user = $_SESSION["name"];
	
	        $imagen = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagen));

            if (($imagen != "")) {
                $statement4 = $conexion->query('UPDATE icons SET images = "'.$imgContent.'" WHERE mail = "'.$correo.'"');  
            }
            if (!empty($password2)) {
                $statement = $conexion->query('UPDATE passwords SET passwd = "'.$password2.'" WHERE mail = "'.$correo.'"');  
            }
	        
	        $statement2 = $conexion->query('UPDATE mails SET mail = "'.$mail.'" WHERE mail = "'.$correo.'"');  
	        
            $statement3 = $conexion->query('UPDATE users SET username = "'.$name.'" WHERE username = "'.$user.'"');  


	$_SESSION["mail"] = $mail;     
    $_SESSION["name"] = $name;
    
        header('Location: index.php');
    }
    
    }
require "vistas/user_editar.view.php" ;
	
	

?>