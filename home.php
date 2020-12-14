<?php
    session_start();
    
    if(!isset($_SESSION["rol"])){
      header("location: ./views/usuarios/login.php");
    }

  ?>

<!DOCTYPE html>
  <html lang="en">
  <?php include_once 'header.php';?>
  <body>
    <?php
      if($_SESSION["rol"] == 1)
        include_once 'menuAdministrador.php';
      elseif ($_SESSION["rol"] == 2)
        include_once 'menuColaborador.php';
      elseif ($_SESSION["rol"] == 3)
        include_once 'menuMedico.php';
    ?>
    <div class="container-fluid bg-1 text-center">
      <h3 class="margin">Bienvenido al Sistema.</h3>
      <img src="./views/img/noUser.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="160" height="160">
      <h5 class="margin"><?php echo $_SESSION["nombreUsuario"] ?></h5>
    </div>
      <?php include_once 'footer.php';?>
  </body>
</html>