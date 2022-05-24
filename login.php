<?php 
session_start();

if(isset($_SESSION["mail"])) {
    header("Location: index.php");
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = filter_var(strtolower($_POST["mail"]), FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    //$password = hash("sha512", $password);
    $password = base64_encode($password);

    try {
        require "connect.php";

    } catch (PDOException $e) {
        echo "<li>Error: " . $e->getMessage()."</li>";
    }

    $statement = $conexion->prepare("SELECT * FROM passwords WHERE mail = :correo AND passwd = :passwd");
    $statement->execute(array(
        ':correo' => $mail,
        ':passwd' => $password
    ));

$error .= $_POST['g-recaptcha-response'];

if (isset ($_POST['g-recaptcha-response']) && !empty ($_POST['g-recaptcha-response'])) {
    $secret = '6Lf89DceAAAAAOpYVAXoZGL-be0h20Y8lKyw034L'; 
    $verificarResponse = file_get_contents ('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST ['g-recaptcha-response']); 
    $responseData = json_decode ($verificarResponse); 
    if ($responseData-> success) {
        $resultado = $statement->fetch();
        if ($resultado !== false) {
            $_SESSION["mail"] = $mail;
            header("Location: index.php");
        } else {
            $error .= "<li>Datos incorrectos</li>";
        }
      
    } else {
        $error .= 'Falló la verificación del robot, intente nuevamente.';
    }
}else {
        $error .= 'Falló la verificación del robot, intente nuevamente.';
    }

}

require "vistas/login.view.php";
?>
