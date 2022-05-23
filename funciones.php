<?php
session_start();
function comprobar_session() {
    if(isset($_SESSION["username"])) {
        header("Location: index.php");
    }
}

?>