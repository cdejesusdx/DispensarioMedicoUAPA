<?php
  session_start();
  
  if(!isset($_SESSION["rol"])){
    header("location: ./views/usuarios/login.php");
  }else{
    if($_SESSION["rol"] != 1)
      header("location: ./views/usuarios/login.php");
  }

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <title>Dispensario Médico UAPA</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" > 
      <style>
          body {
                font: 20px Montserrat, sans-serif;
                line-height: 1.8;
                color: #f5f6f7;
            }
          
          p {font-size: 16px;}
          
          .margin {margin-bottom: 45px;}

          .bg-1 { 
                background-color: #1abc9c;
                color: #ffffff;
            }

          .bg-2 { 
                background-color: #474e5d; 
                color: #ffffff;
            }
            
          .bg-3 { 
                background-color: #ffffff; 
                color: #555555;
            }

          .bg-4 { 
                background-color: #2f2f2f; 
                color: #fff;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 5px;
            }
            .navbar-nav  li a:hover {
                color: #1abc9c !important;
            }
      </style>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

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
                        <li><a href="./views/marcas/index.php">Marcas</a></li>
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
                        <li><a href="./views/usuarios/index.php">Usuarios</a></li>
                        <li><a href="./views/roles/index.php">Roles</a></li>
                    </ul>
                </li>
   
                <li class="dropdown">
                    <a class="dropdown-toggle" href="./views/usuarios/signOff.php">Cerrar Sesión</a>
                </li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
  </html>
