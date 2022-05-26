<?php require("script/effect_logo.php") ?>
<nav class="navbar">
  <ul class="nav-links">
    <!-- NAVIGATION MENUS -->
    <div class="menu2">
      <li><a href="/">Inicio</a></li>
      <li><a href="descargar.php">Descargar</a></li>
      <li><a href="noticias.php">Noticias</a></li>
      <a href="ranking.php"><img class="logo1" src="imagen/logo_foto.png" onmouseover="hover1(this);" onmouseout="unhover1(this);"></a>
      <li><a href="contact.php">Contactanos</a></li>
      <li class="services">
        <a>Guías</a>
        <!-- DROPDOWN MENU -->
        <ul class="dropdown">
          <li><a href="guia_clases.php">Clases</a></li>
          <li><a href="guia_enemigos.php">Enemigos </a></li>
          <li><a href="guia_jefes.php">Jefes</a></li>
        </ul>
      </li>
      <li><a href="about.php">Sobre <br> nosotros</a></li>
     
        <?php require("user_name.php")?>
      
  </ul>
</nav>