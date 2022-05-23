<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />

  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <TITLE> Dungeon War - Recuperar </TITLE>
</HEAD>

<body>
  <?php
     if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>

  <div class="cuerpo">
    <div id="login-box">
      <h1>Recuperar Contraseña</h1><br>
      <h3>Introduce la nueva contraseña</h3>
      <form name="recuperar" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form">
          <div class="item">
            <input type="password" name="password" placeholder="Contraseña"><br><br>
          </div>
          <div class="item">
            <input type="password" name="password2" placeholder="Repite la Contraseña">
          </div>
        </div> 
        <?php if(!empty($error)): ?>
    <div>
      <ul class="error">
        <?php echo $error; ?>
      </ul>
    </div>
    <?php endif; ?>
        <input type="submit" value="Enviar" name="input" id="boto">
    </div>

    </form>
  </div>


<?php require "footer.view.php" ?>

</body>
</html>
