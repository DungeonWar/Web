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





    <div class="descarga">
      <img src="imagen/fondo_descarga.jpg">
      <h1>DESCARGAR</h1>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=test"></script>
    <script>
      paypal.Buttons().render('body');
    </script>


  </div>
  <?php require "footer.view.php" ?>

</BODY>

</HTML>