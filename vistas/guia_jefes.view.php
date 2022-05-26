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
            <h1>Jefes</h1><br>
            <table>
                <tr>
                    <td>
                        <p>Los jefes son criatura poderosas que podrán darte algun que otro problema, pero me temo que aun no estas preparado para ellos, mas adelante tal vez...</p><br>
                    </td>
                </tr>
               
            </table>
        </div>


    </div>
    <?php require "footer.view.php" ?>

</BODY>

</HTML>