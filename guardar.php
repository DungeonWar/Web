<?php
session_start();
date_default_timezone_set("Europe/Madrid");
extract($_POST);

$image = $_FILES['images']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));
$user = ucfirst($_SESSION["name"]);
$titular = $_POST["Titular"];
$sub = $_POST["Subtitulo"];
$contenido = $_REQUEST["contenido"];
echo $user;
$hora = date("d-m-Y H:i:s");
$conexion = new PDO("mysql:host=localhost;dbname=Dungeon_War", "Abel", "dwonline");

//$conexion = new PDO("mysql:host=localhost;dbname=DungeonWarOnline", "Abel", "dwonline");
//$conexion = new PDO("mysql:host=localhost;dbname=zg4qb47y_dungeonwaronline", "zg4qb47y", "e1{5fw96_]-f");

$statement = $conexion->prepare("INSERT INTO noticias(Hora, Contenido, Username) VALUES(:date, :contenido, :user)");
        $statement->execute(array(
        ':date' => $hora,
        ':contenido' => $contenido,
        ':user' => $user,
        ));

$statement2 = $conexion->query('SELECT ID FROM noticias ORDER BY ID DESC LIMIT 1');
            $resultado = $statement2->fetch();
        
$statement3 = $conexion->query("UPDATE noticias SET Miniatura = '$imgContent', Titular = '$titular', Subtitulo = '$sub' WHERE ID = $resultado[0]");


    if (/*$statement > 0 && $statement2 > 0 &&*/ $statement3 > 0) {
        echo "<script>
        alert ('Noticia Guardada');
        window.location ='noticias.php';
        </script>";
    } else {
        echo "<script>
        alert ('Error al guardar la noticia');
        window.location = 'noticias.php';
        </script>";
    }
?>
