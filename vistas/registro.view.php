<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/registro.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />

  <link rel="shortcut icon" href="imagen/logo_foto.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" href="imagen/logo_foto.png">

  <TITLE> Dungeon War - Registrate </TITLE>
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
      <h1>Registro</h1><br>
      <form name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form">

          <div class="item">
          <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="username" placeholder="Usuario"><br><br>
          </div>
          <div class="item">
          <i class="fa fa-envelope"></i>       
          <input type="email" name="mail" placeholder="Correo electrónico"><br><br>
          </div>
          <div class="item">
          <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" name="password" placeholder="Contraseña"><br><br>
          </div>
          <div class="item">
          <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" name="password2" placeholder="Confirmar contraseña"><br><br>
          </div>
        </div>
        <input type="submit" value="Registrarse" name="input" id="boto"><br><br>
        <?php if(!empty($error)): ?>
    <div>
      <ul class='error'>
        <?php echo $error; ?>
      </ul>
    </div>
    <?php endif; ?>
        <label>¿Ya tienes cuenta? </l<bel><a href="login.php">Iniciar Sesión</a>
    </div>
    </form>
  </div>
  <?php require "footer.view.php" ?>

</BODY>

</HTML>