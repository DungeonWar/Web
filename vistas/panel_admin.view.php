<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/panel.css" />
  <link rel="stylesheet" href="css/header_login.css" />
  <link rel="stylesheet" href="css/footer.css" />

  <link rel="shortcut icon" href="imagen/logo_foto.png">

  <TITLE> Dungeon War - Panel Admin </TITLE>
</HEAD>

<BODY>
<?php
    $statement1 = $conexion->query('SELECT rango FROM rangos where mail = "'.$_SESSION["mail"].'"');
                    $rango = $statement1->fetch();
    if ($rango[0] != "admin"){
        header("Location:index.php");
    }
    
    if (isset($_SESSION["mail"])) {
        require("header_login.view.php");
    } else {
      require("header_login.view.php");
    } ?>
    <div class="cuerpo">
    <div id="login-box">
      <h1>Panel Admin</h1><br>
      <form name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form">
          <input class="txt" type="text" name="buscar" placeholder = "Búsqueda por e-mail">
          <input type="submit" value="Buscar" name="input" id="boto2"><br>
        </div>
      </form>
      <label>o</label>
      <form name="login1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form">
          <input class="txt" type="text" name="buscar1" placeholder = "Búsqueda por username">
          <input type="submit" value="Buscar" name="input" id="boto2"><br>
        </div>
      </form>
      <form name="login2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <?php 
        $buscar = "";
        if (isset($_POST["buscar"])){
        $buscar = 'AND m.mail = "'.$_POST['buscar'].'"';
        $count = 1;
        } else if (isset($_POST["buscar1"])){
        $buscar = 'AND m.username = "'.$_POST['buscar1'].'"';
        $count = 1;
        }
        ?><br>
        <input type="submit" value="Reiniciar" name="input" id="boto2"><br>
        <?php if(!empty($error)): ?>
    <div class="error">
      <ul>
        <?php echo $error; ?>
      </ul>
    </div>
    <?php endif; ?>
    </div>
    </form>
    <div id="login-box">
        <div>  
          <ul>
              <?php  
              for ($x=0; $x < $count; $x++) {
                $i=$x;
                $statement = $conexion->query("SELECT m.username, m.mail, r.rango FROM mails m JOIN rangos r WHERE r.mail = m.mail $buscar LIMIT $x,1;");
                    $user.$i = $statement->fetch();
           
                echo "<div class='usuarios'><li>";
                  echo "<form class='editar_F' action='edit_user2.php' method='POST'>";
                    echo " | ".ucfirst($user.$i[0])." | ".$user.$i[1]." | ".ucfirst($user.$i[2])." | ";
                    $v1 =" ".ucfirst($user.$i[0])." ".$user.$i[1]." ".ucfirst($user.$i[2]);
                    echo "<input name='valores' class='valores' value='$v1'>";
                    echo "<div class='editar2'>";
                    echo "<input class='edit' id='boto3' type='submit' value='Editar'>";
                    echo "</div>";
                  echo"</form>";
                  echo "<form classs='borrar_F' action='borrar_user.php' method='POST'>";
                    $v2 = ucfirst($user.$i[0]);
                    echo "<input name='valores' class='valores' value='$v2'>";
                    if ($user.$i[2] != "admin") {
                      echo "<input class='borrar' id='boto4' type='submit' value='Borrar'>";
                    }
                   
                  echo "</form>";
                echo "</li></div>";
              }
              ?>
          </ul>
        </div>  
    </div>  
    
  </div>
  <?php require "footer.view.php" ?>
</BODY>
</HTML>