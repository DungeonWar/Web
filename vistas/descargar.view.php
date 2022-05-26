<!DOCTYPE html>
<HTML lang="es">

<?php 
include('config.php');
$productName = "Dungeon War";
$currency = "EUR";
$productPrice = 4.99;
$productId = 587965;
$orderNumber = 567;
?>

<HEAD>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/header_login.css" />
  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <script src="js/ventana.js"></script>

  <TITLE> Dungeon War - Descargar </TITLE>
</HEAD>

<BODY>
  <?php
    
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>
  <div class="cuerpo">

    <div id="fondo2">
      <h1>Selecciona el metodo de pago:</h1>
      <h5>Se puede pagar con Pay Pal / Sofort / Targeta</h5>
      <a href="javascript:ventanaSecundaria('pago.php')"><button id="boto">Seleccionar</button></a><br>
      <div class="enlaces">
        <a href="https://mega.nz/file/BH9xVA7B#Ib0i5bDSn6GWlQB0krqLfw9KWUzDOhljCdtaATYFW5Q" target="_blank"><img class="mega"
            src="imagen/Mega-logo.png" alt="Descarga MEGA"></a><br>
        <a href="https://www.mediafire.com/file/4jc6489ls2u7feb/DungeonWar.rar/file" target="_blank"><img class="mediafire" src="imagen/descargar-Mediafire.png"
            alt="Descarga Mediafire"></a>
      </div>
    </div>
    <script>

    </script>;
  </div>
  <?php require "footer.view.php" ?>

</BODY>

</HTML>