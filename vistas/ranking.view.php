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
                if ($pos == 1) {
                  echo "<td><IMG SRC='https://images.emojiterra.com/google/noto-emoji/v2.034/512px/1f947.png' WIDTH=25 HEIGHT=25></td>";                  
                }
                elseif ($pos == 2) {
                  echo "<td><IMG SRC='https://images.emojiterra.com/google/noto-emoji/v2.034/512px/1f948.png' WIDTH=25 HEIGHT=25></td>";
                }
                elseif ($pos == 3) {
                  echo "<td><IMG SRC='https://images.emojiterra.com/google/noto-emoji/v2.034/512px/1f949.png' WIDTH=25 HEIGHT=25></td>";
                }
                else {
                  echo "<td>$pos</td>";
                }
                echo "<td>".ucfirst($usr[$i][0])."</td>";
                echo "<td>".$usr[$i][1]." pts</td>";
                echo "</tr>";
              }


                ?>
            </table>
        </div>
    </div>   
    <?php require "footer.view.php" ?>
</body>
</html>