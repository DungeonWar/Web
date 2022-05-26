<!DOCTYPE html>
<HTML lang="es">

<HEAD>
    <link rel="stylesheet" href="css/guias.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/header_login.css" />


    <link rel="shortcut icon" href="imagen/logo_foto.png">

    <TITLE> Dungeon War - Guias </TITLE>
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
            <h1>Enemigos</h1><br>
            <table>
                <tr>
                    <td>
                        <p>En Dungeon War existen cientos de enemigos, pero de momento en los niveles mas bajos, donde tu podrás jugar, solo aparece un enemigo:</p><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Esqueleto</h2>
                        <p>El esqueleto fue antaño un valiente guerrero, pero los años y la magia oscura se han cernido sobre su cadaver otorgando una segunda "vida". No dudara en atacarte con su espada si te interpones en su camino.</p>
                    </td>
                    <td><img src="imagen/esqueleto.png" class="esqueleto"></td>
                </tr>
            </table>
        </div>


    </div>
    <?php require "footer.view.php" ?>

</BODY>

</HTML>