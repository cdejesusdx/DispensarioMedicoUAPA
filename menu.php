<?php
    session_start();
    
    if(!isset($_SESSION["rol"])){
      header("location: ./views/usuarios/login.php");
    }
  ?>
    <?php
      if($_SESSION["rol"] == 1)
        include_once 'menuAdministrador.php';
      elseif ($_SESSION["rol"] == 2)
        include_once 'menuColaborador.php';
      elseif ($_SESSION["rol"] == 3)
        include_once 'menuMedico.php';
    ?>