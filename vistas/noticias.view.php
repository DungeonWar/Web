<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/noticias.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/header_login.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <TITLE> Dungeon War - Noticias </TITLE>
</HEAD>

<BODY>
  <?php
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>

  <div class="cuerpo">
    <div id="login-box">
      <h1>Noticias</h1>
      <table id="principal">
        <tr>
          <td colspan="3">
            <hr class="linea">
          </td>
          <td></td>
          <td></td>
        </tr>
        <tr class="noticias">
          <td class="prin" rowspan="2" colspan="2"><a title='Noticia 1' href='noticia.php?num=0'><img width='16' />
              <?php echo '<img class="miniatura2" src="data:image/png;base64,'.base64_encode($noticia[0][1]).'"/>'; ?></a>
            <label class="hora"><?php echo $noticia[0][2] ?>,</label>
            <label class="hora"><?php echo $noticia[0][3] ?></label>
            <a class="lk_noticia" title='Noticia 1' href='noticia.php?num=0'>
              <h1 class="titulo"><?php echo $noticia[0][4] ?></h1>
            </a>
            <h3 class="subtitulo"><?php echo $noticia[0][5] ?></h3>
          </td>
          <td><a title='Noticia 2' href='noticia.php?num=1'>
              <?php echo '<img class="miniatura" src="data:image/png;base64,'.base64_encode($noticia[1][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[1][2] ?>,</label>
              <label class="hora"><?php echo $noticia[1][3] ?></label>
              <h2 class="titulo1"><?php echo $noticia[1][4] ?></h2>
          </td>
        </tr>
        <tr>
          <td><a title='Noticia 3' href='noticia.php?num=2'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[2][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[2][2] ?>,</label>
              <label class="hora"><?php echo $noticia[2][3] ?></label>
              <h2 class="titulo1"><?php echo $noticia[2][4] ?></h2>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <hr class="linea">
          </td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td><a title='Noticia 4' href='noticia.php?num=3'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[3][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[3][2] ?>,</label>
              <label class="hora"><?php echo $noticia[3][3] ?>,</label>
              <h2 class="titulo1"><?php echo $noticia[3][4] ?></h2>
          </td>
          <td><a title='Noticia 5' href='noticia.php?num=4'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[4][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[4][2] ?>,</label>
              <label class="hora"><?php echo $noticia[4][3] ?>,</label>
              <h2 class="titulo1"><?php echo $noticia[4][4] ?></h2>
          </td>
          <td><a title='Noticia 6' href='noticia.php?num=5'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[5][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[5][2] ?>,</label>
              <label class="hora"><?php echo $noticia[5][3] ?>,</label>
              <h2 class="titulo1"><?php echo $noticia[5][4] ?></h2>
          </td>
        </tr>
        <tr>
          <td><a title='Noticia 7' href='noticia.php?num=6'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[6][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[6][2] ?>,</label>
              <label class="hora"><?php echo $noticia[6][3] ?>,</label>
              <h2 class="titulo1"><?php echo $noticia[6][4] ?></h2>
          </td>
          <td><a title='Noticia 8' href='noticia.php?num=7'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[7][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[7][2] ?>,</label>
              <label class="hora"><?php echo $noticia[7][3] ?>,</label>
              <h2 class="titulo1"><?php echo $noticia[7][4] ?></h2>
          </td>
          <td><a title='Noticia 9' href='noticia.php?num=8'>
              <?php echo '<img class="miniatura"  src="data:image/png;base64,'.base64_encode($noticia[8][1]).'"/>'; ?>
              <label class="hora"><?php echo $noticia[8][2] ?>,</label>
              <label class="hora"><?php echo $noticia[8][3] ?>,</label>
              <h2 class="titulo1"><?php echo $noticia[8][4] ?></h2>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <hr class="linea">
          </td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <?php 
          if ($rango == "admin" || $rango == "editor") {
           
            echo "<a href='crearnoticias.php'>  <button id='boto' type='button'>Crear Noticia</button></a>";
          }
        ?>
    </div>
  </div>
  <?php require "footer.view.php" ?>

</BODY>



</HTML>