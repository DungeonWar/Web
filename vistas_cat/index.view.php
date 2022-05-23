<!DOCTYPE html>
<HTML lang="cat">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/header.css" />
  <link rel="stylesheet" href="../css/header_login.css" />
  <link rel="stylesheet" href="../css/footer.css" />

  <link rel="shortcut icon" href="../imagen/logo_foto.png">
  <TITLE> Dungeon War </TITLE>
</HEAD>

<BODY>
  <?php
    if (isset($_SESSION["mail"])) {
      require("../vistas/header_login.view.php");
    } else {
      require("../vistas/header.view.php");
    } ?>
    
  <div class="cuerpo">
    <div id="intro">
      <div class="intro2">
        <img class="logo_texto" src="../imagen/logo_texto.png">
      </div>
    </div>
    <div id="fondo">
      <div class="inicio">
        <h1>Submergeix-te a la MAZMORRA</h1><br>
        <h3>Benvingut a <strong>Dungeon War Online </strong> , on podràs posar a prova les teves habilitats
avançant per un món caòtic, monstres infinits i nivells cada cop més bojos. </h3>
      </div>
      <hr class="hr1">
      <div class="medio">
        <table class="tabla_inicio">
          <tr>
            <td>
              <h3>Coneix a <strong>Markus</strong>, ell serà el valent mag que controlessis per arribar fins al final de la masmorra i aconseguir ser el campió de <strong>Dungeon War.</strong></h3><br>
              <h3>És capaç d'acabar amb els seus enemics gràcies als seus potents encanteris i utilitzar el seu poder per elevar-se per l'aire amb un doble salt, però compte, Markus és un mag poderós, però així i tot pot morir a mans de qualsevol alimanya.</h3>
            </td>
            <td>
              <img src="../imagen/markus_idle.gif" alt="Markus" class="gif gif1">
              <img src="../imagen/markus_run.gif" alt="Markus" class="gif gif2">
              <img src="../imagen/markus_death.gif" alt="Markus" class="gif gif3">
            </td>

          </tr>
          <tr>
            <td colspan="2">
              <hr>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="trailer">
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <hr>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h1>Últimes notícies</h1>

              <table class="noticias"><br>
                <tr>
                  <td><a title='Noticia 1' href='noticia.php?num=0'>
                      <?php echo '<img class="miniatura" src="data:image/png;base64,'.base64_encode($noticia[0][1]).'"/>'; ?></a></br>
                    <label>Creado por: <?php echo $noticia[0][2] ?></label></br>
                    <label class="nombre"><?php echo $noticia[0][3] ?></label>
                    <a title='Noticia 1' href='noticia.php?num=0'>
                      <h2 class="titulo"><?php echo $noticia[0][4] ?></h2>
                    </a>
                  </td>
                  <td><a title='Noticia 2' href='noticia.php?num=1'>
                      <?php echo '<img class="miniatura" src="data:image/png;base64,'.base64_encode($noticia[1][1]).'"/>'; ?></a></br>
                    <label>Creado por: <?php echo $noticia[1][2] ?></label></br>
                    <label class="nombre"><?php echo $noticia[1][3] ?></label>
                    <a title='Noticia 2' href='noticia.php?num=1'>
                      <h2 class="titulo"><?php echo $noticia[1][4] ?></h2>
                    </a>
                  </td>
                  <td><a title='Noticia 3' href='noticia.php?num=2'>
                      <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[2][1]).'"/>'; ?></a></br>
                    <label>Creado por: <?php echo $noticia[2][2] ?></label></br>
                    <label class="nombre"><?php echo $noticia[2][3] ?></label>
                    <a title='Noticia 1' href='noticia.php?num=2'>
                      <h2 class="titulo"><?php echo $noticia[2][4] ?></h2>
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>


  </div>
  <?php 
     require "footer.view.php" ?>
</BODY>

</HTML>