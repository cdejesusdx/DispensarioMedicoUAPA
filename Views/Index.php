<?php 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dispensario Médico UAPA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" >
    <link rel="stylesheet" href="./css/style.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Dispensario Médico UAPA</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mantenimientos
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="./Marcas/Index.php">Marcas</a></li>
                      <li><a href="#">Ubicaciones</a></li>
                      <li><a href="#">Tipos de Fármacos</a></li>
                      <hr/>
                      <li><a href="#">Medicamentos</a></li>
                      <hr/>
                      <li><a href="#">Médicos</a></li>
                      <li><a href="#">Pacientes</a></li>
                  </ul>
              </li>

              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Operaciones
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="#">Registro de Visitas</a></li>
                      <li><a href="#">Cola de Atención</a></li>
                  </ul>
              </li>

              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="#">Usuarios</a></li>
                      <li><a href="#">Roles</a></li>
                  </ul>
              </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid bg-1 text-center">
    <h3 class="margin">Bienvenido al Sistema.</h3>
    <!--<img src="bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">-->
  </div>

  <footer class="container-fluid bg-4 text-center">
    <p>© <?php echo date("Y"); ?> Universidad Abierta Para Adultos. Todos los derechos reservados.</a></p> 
  </footer>

</body>
</html>