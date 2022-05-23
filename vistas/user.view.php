<!DOCTYPE html>
<HTML lang="es">
<?php session_start(); ?>
<HEAD>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/header.css" />

  <link rel="shortcut icon" href="imagen/logo_foto.png">

  <TITLE> Dungeon War - <?php echo ucfirst($_SESSION["name"]); ?> </TITLE>
</HEAD>

<BODY>
  <?php
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    }?>
  <div class="cuerpo">

    <form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"> 

    <?php echo '<img class=img height="125" width="125" src="data:image/png;base64,'.base64_encode($icon).'"/>'; ?>

    </form>
    
  </div>
  <?php require "footer.view.php" ?>

</BODY>

</HTML>