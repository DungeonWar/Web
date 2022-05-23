<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <link rel="stylesheet" href="css/contact.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/header_login.css" />

  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <script src = 'https://www.google.com/recaptcha/api.js' async defer></script>
  <TITLE> Dungeon War - Contactanos </TITLE>
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
      <div class="form">
        <form class="item" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <h1>Contactanos</h1>
        <hr><label>Introduce tus datos para proceder con la consulta:</label><br>
          <input type="text" name="name" placeholder="Nombre" value="<?php echo ucfirst($_SESSION["name"])?>">
          <input type="email" name="email" placeholder="Email" value="<?php echo $_SESSION["mail"]?>">
          <input type="text" name="asunto" placeholder="Asunto"><br>
          <hr>
          <label>Selecciona el departamento dependiendo de tu consulta:</label>
          <select name="department">
            <option value="Soporte técnico">Soporte técnico</option>
            <option value="Facturación" selected>Facturación</option>
          </select>
          <textarea class="textarea" placeholder="Escribe aqui tu consulta..." name="message"></textarea>
          <div class = "g-recaptcha" data-sitekey = "6Lf89DceAAAAANoceJIo_W2Tr1cKONU-h6DDr4O5" data-callback='onSubmit'>
          </div>
          <input type="submit" value="Enviar" id="boto">
        </form>
      </div>

      <?php if(!empty($error)): ?>
        <div>
          <ul class="error">
            <?php echo $error; ?>
          </ul>
        </div>
        <?php endif; ?>
        <?php if(!empty($acierto)): ?>
        <div>
          <ul class="acierto">
            <?php echo $acierto; ?>
          </ul>
        </div>
        <?php endif; ?>
    </div>

  </div>

  <?php require "footer.view.php" ?>
</BODY>

</HTML>