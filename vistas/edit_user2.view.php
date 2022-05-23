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
            <form class="form" action="panel2.php" method="POST">
                <div class="item">
                    <input name="username" type="text" placeholder="Nombre Usuario" value="<?php echo $_SESSION["name_user"] ?>">
                    <input name="mail" type="email" placeholder="Correo Usuario" value="<?php echo $_SESSION["mail_user"]?>">
                    <input name="passwd" type="password" placeholder="Contraseña Usuario">
                    <br>
                    <?php 
                        switch ($valores[3]) {
                            case 'Admin':
                                echo '<select name="rango">
                                <option value="admin">Administrador</option>
                            </select>';
                                break;
                            case 'Estandard':
                                echo '<select name="rango">
                                <option value="estandard">Estandard</option>
                                <option value="admin">Administrador</option>
                                <option value="editor">Editor</option>
                            </select>';
                                break;
                            case 'Editor':
                                echo '<select name="rango">
                                <option value="editor">Editor</option>
                                <option value="estandard">Estandard</option>
                                <option value="admin">Administrador</option>
                            </select>';
                            
                                break;
                        }
                    ?>
                   <br>
                </div>
                <input type="submit" value="Guardar" id="boto">
            </form>

        </div>
        

    </div>
    <?php require "footer.view.php" ?>
</BODY>

</HTML>