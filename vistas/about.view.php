<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/header.css" />

  <link rel="shortcut icon" href="imagen/logo_foto.png">

  <TITLE> Dungeon War - Sobre Nosotros </TITLE>
</HEAD>

<BODY>
  <?php
    
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>
  <div class="cuerpo">




  </div>
  <?php require "footer.view.php" ?>

</BODY>

</HTML>