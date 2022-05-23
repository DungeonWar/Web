<?php

session_start();
require "connect.php";



$sql = "select count(*) from mails";

$count = current($conexion->query("$sql")->fetch());

require "vistas/panel_admin.view.php";

?>