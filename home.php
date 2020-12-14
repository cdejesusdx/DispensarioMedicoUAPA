<?php 
    
?>

<?php include_once 'header.php';?>

<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Bienvenido al Sistema.</h3>
  <img src="./views/img/noUser.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="160" height="160">
  <h5 class="margin"><?php echo $_SESSION["nombreUsuario"] ?></h5>
</div>

<?php include_once 'footer.php';?>