<!DOCTYPE html><HTML lang="es">

<HEAD>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ranking.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/header_login.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="shortcut icon" href="imagen/logo_foto.png">
    <TITLE> Dungeon War - Ranking</TITLE>
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
            <h1>Top Jugadores Dungeon War</h1>
            <table class="white">
                <tr>
                    <td>Posición</td>
                    <td>Jugador</td>
                    <td>Puntuación</td>
                </tr>
              
              <?php
              for ($i=0; $i < 10 ; $i++) { 
                  $pos = $i+1;
                echo "<tr class='registro'>";
                echo "<td>$pos</td>";
                echo "<td>".$usr[$i][0]."</td>";
                echo "<td>".$usr[$i][1]."pts.</td>";
                echo "</tr>";
              }


                ?>
            </table>
        </div>
    </div>   
    <?php require "footer.view.php" ?>
</body>
</html>