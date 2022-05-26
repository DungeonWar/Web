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
            <h1>Clases</h1><br>
            <table>
                <tr>
                    <td>
                        <p>En Dungeon War existen todo tipo de clases, las cuales se añadiran poco a poco al universo
                            jugable del juego, de momento contamos con un mago ofensivo llamado Markus.</p><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Mago</h2>
                        <p>Utiliza el poder de la magia para saltar sobre los enemigos con un doble salto y derribarlos
                            con un potente hechizo. Utiliza tu vara y libro de hehcizos para desatar el caos por las mazmorras y derrotar a todo el que se meta en tu camino.</p>
                    </td>
                    <td><img src="imagen/mago_idle_5.png" class="mago"> </td>
                </tr>
                <tr>
                    <td>
                        <h2>Guerrero</h2>
                        <p>COMING SOON...</p>
                    </td>
                </tr>
            </table>
        </div>


    </div>
    <?php require "footer.view.php" ?>

</BODY>

</HTML>