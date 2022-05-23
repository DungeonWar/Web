<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  <script>
    function onSubmit(token) {
      document.getElementById("form").submit();
    }
  </script>
  <TITLE> Dungeon War - Iniciar Sesion </TITLE>
</HEAD>

<BODY>
  <?php
    
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>

  <div class="cuerpo">
    <div id="login-box">
      <h1>Iniciar Sesión</h1><br>
      <form action="" method="POST">
        <div class="form">
          <div class="item">
            <i class="fa fa-envelope"></i>
            <input type="text" id="mail" name="mail" placeholder="Correo electrónico"><br><br>
          </div>
          <div class="item">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" id="pass" name="password" placeholder="Contraseña">
            <!-- <button type="button" onclick="mostrarContraseña()"> </button> -->
            <br><br>
            <a href="recuperar.php">¿Has olvidado tu contraseña?</a>
          </div>
          <div class="g-recaptcha" data-sitekey="6Lf89DceAAAAANoceJIo_W2Tr1cKONU-h6DDr4O5" data-callback='onSubmit'>
          </div>
        </div>
        <?php if(!empty($error)): ?>
        <div>
          <ul class="error">
            <?php echo $error; ?>
          </ul>
        </div>
        <?php endif; ?>
        <input type="submit" value="Iniciar Sesión" id="boto"><br>
        <label>¿No tienes cuenta? </label><a href="registro.php">Registrate</a>
    </div>
    </form>
  </div>
  </div>
  <?php require "footer.view.php" ?>

</BODY>



</HTML>