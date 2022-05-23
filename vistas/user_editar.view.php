<!DOCTYPE html>
<HTML lang="es">

<HEAD>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/user.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/header_login.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="shortcut icon" href="imagen/logo_foto.png">
    <TITLE> Dungeon War - Editar Usuario</TITLE>
</HEAD>

<BODY>
    <?php
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>

    <div class="cuerpo">

        <div id="user-box">
            <form action="" method="POST" enctype="multipart/form-data" >
                <table>
                    <tr>
                        <td>
                            
                            <?php echo '<img height="201" width="201" src="data:image/png;base64,'.base64_encode($icon).'"/>'; ?>
                        </td>
                        <td class="cuadro-info">
                            <div class="form">
                                <div class="item">

                                    <input type="text" class="name" name="name"
                                        value="<?php  echo ucfirst($_SESSION["name"]) ?>"placeholder="Usuario">
                                </div>
                                <div class="item">
                                    <input type="text" class="correo" name="mail"
                                        value="<?php  echo $_SESSION["mail"] ?>" placeholder="Correo">
                                </div>
                                <div class="item">
                                    <input type="password" class="pass" name="password"
                                        placeholder="Contraseña antigua">
                                </div>
                                <div class="item">
                                    <input type="password" class="pass" name="password2" placeholder="Contraseña nueva">
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="white" type="file" name="image" accept="image/png, .jpg">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php if(!empty($error)): ?>
                            <div>
                                <ul class="error">
                                    <?php echo $error; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>

                </table>


                <input type="submit" value="Guardar Cambios" id="boto"><br>
        </div>
        </form>
    </div>
    </div>
    <?php require "footer.view.php" ?>
    </div>

</BODY>

</HTML>