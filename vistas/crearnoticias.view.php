<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  extract($_POST);
  session_start();

  try {
      require "connect.php";

  } catch (PDOException $e) {
      echo "<li>Error: " . $e->getMessage()."</li>";
  }

  $imagen = $_FILES['imagenes']['tmp_name'];
  $imgContent = addslashes(file_get_contents($imagen));
  $hora = date("d-m-y h:i:s");
  $usr = ucfirst($_SESSION["name"]);
  $statement66 = $conexion->prepare('INSERT INTO noticias(ID,Username,Hora,Titular,Subtitulo,Contenido) VALUES (null, :user, :hora, :titulo, :sub, :cont)');
        $statement66->execute(array(
          ':user' => $usr,
          ':hora' => $hora,
          ':titulo' => $titulo,
          ':sub' => $subtitulo,
          ':cont' => $txtDescripcion
        ));
  $statement67 = $conexion->query("UPDATE noticias SET Miniatura = '$imgContent' ORDER BY ID DESC LIMIT 1");
  header("Location: noticias.php");
}
?>
<!DOCTYPE html>
<HTML lang="es">

<HEAD>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/noticia.css" />
  <link rel="stylesheet" href="css/header_login.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="shortcut icon" href="imagen/logo_foto.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
  <TITLE> Dungeon War - Crear Noticias </TITLE>
</HEAD>

<BODY>
  <?php
    extract($_SESSION);
    if (isset($_SESSION["mail"])) {
      require("header_login.view.php");
    } else {
      require("header.view.php");
    } ?>

  <div class="cuerpo">
      <div id="login-box">
      <h1>Crear Noticias</h1></br>
      <form action="" method="POST" enctype="multipart/form-data"></br>
      <div class="form">
      <div class="item">
          <input type="text" id="titulo" name="titulo" placeholder="Título"><br><br>
      </div>
      <div class="item">    
          <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo"><br><br><br>
      </div>    
          <label class="miniatur" >Miniatura: [recomendado 1280x720] </label><input class="white" type="file" name="imagenes" ></label></br></br><br>
          <hr></br></br>
          <label><h2>Insertar Contenido de la noticia: </h2></label><br>
          <textarea type="text" name="txtDescripcion" id="txtDescripcion" class="editor"></textarea>
          <script>
          ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
        <input type="submit" value="Publicar Noticia" id="boto"><br>
        </form>
          </div>
      </div>
  </div>
  <?php require "footer.view.php" ?>

</BODY>



</HTML>
