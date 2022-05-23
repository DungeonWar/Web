<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/noticia.css" />
  <link rel="stylesheet" href="css/header_login.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
  <TITLE> Dungeon War - Crear Noticias </TITLE>
</HEAD>

<BODY>
  <?php
    extract($_SESSION);
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>

  <div class="cuerpo">
      <div id="login-box">
        <h1 class="titulo"><?php echo $resultado5.$i[4] ?></h1><br>
        <hr>
        <p class="hora"><?php echo $resultado5.$i[2] ?>, <?php echo $resultado5.$i[3] ?></p>
        <h2 class="sub"><?php echo $resultado5.$i[5] ?></h2>
        <div class="contenido"><?php echo $resultado5.$i[6] ?></div><br>  
      </div>
  </div>
  <?php require "footer.view.php" ?>

</BODY>



</HTML>