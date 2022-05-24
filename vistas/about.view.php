<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/header_login.css" />


  <link rel="shortcut icon" href="imagen/logo_foto.png">

  <TITLE> Dungeon War - Sobre Nosotros </TITLE>
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
      <h1>Quien está detrás de Dungeon War?</h1><br>
      <hr class="hr2">
      <table>
        <tr class="about">
          <td>Dungeon War es un proyecto de 2 estudiantes los cuales han decidido crear esta página web y un pequeño videojuego de plataformas en donde tendrás que derrotar a varios monstruos. El nombre de los creadores de este proyecto son Abel Montes y Oriol Campdepadrós, dos estudiantes del instituto Thos y Codina en el grado superior de ASIX. Esperamos que puedas disfrutar de nuestra web y videojuego intentando conseguir más puntos que ayer.</td>
          <td rowspan="2"><img class="img1" src="imagen/logo_foto.png"></td>
        </tr>
        <tr class="about">
          <td><br>Nuestro objetivo era poder crear un videojuego divertido y sencillo en el cual puedas estar horas intentando competir por quien tiene más puntos en la plataforma. Hemos logrado la mayoría de nuestros objetivos, pero siempre podemos crecer más. Si hay algún fallo o error, siempre podéis poneros en contacto con nosotros en la pestaña de <i>contactanos</i></td>
        </tr>
      </table>
    </div>


  </div>
  <?php require "footer.view.php" ?>

</BODY>

</HTML>