<?php include_once '../../controllers/usuariosController.php';?>
<?php
    session_start();

    if(isset($_SESSION["nombreUsuario"])){
        header("location: ../../home.php");
    }

    if(isset($_GET["cerrarSesion"])){
        session_unset();
        session_destroy();
    }

    if(isset($_SESSION["rol"])){
        switch($_SESSION["rol"]){
            case 1:
                header("location: ../../home.php");
                break;
            case 2:
                header("location: ../../home.php");
                break;

            default:
        }
    }

    if(isset($_POST['btnIniciarSesion'])){        
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $selectRow = $CrudUsuarios->selectUsuario($usuario, md5($contrasena));
       
        if($selectRow == true){
    
            $id = $selectRow[0];
            $rol = $selectRow[1];
            $nombreUsuario = $selectRow[3];

            $CrudUsuarios->updateLastLogin($id);
            
            $_SESSION["rol"] = $rol;
            $_SESSION["nombreUsuario"] = $nombreUsuario;

            switch($_SESSION["rol"]){
                case 1:
                    header("location: ../../home.php");
                    break;
                case 2:
                    header("location: ../../home.php");
                    break;
    
                default:
            }

        }else{
            header("Location: login.php?noLogin");
        } 
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" > 
    <style>
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .need-help
        {
            margin-top: 10px;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="clearfix"></div><br/>

    <?php
      
        if(isset($_GET['noLogin']))
        {
            ?>
                <div class="container">
                    <div class="alert alert-warning">
                        <strong>Ups!</strong> Usuario y/o contraseña incorrectos!
                    </div>
                </div>
            <?php
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Inicio de Sesión</h1>
                <div class="account-wall">
                    <img class="profile-img" src="../../views/img/noUser.jpg" alt="">
                    <form class="form-signin" method='post'>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
                        <input type="password" class="form-control" name='contrasena' placeholder="Contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnIniciarSesion">
                            <span class="glyphicon glyphicon-user"></span> Iniciar Sesión
                        </button>
                        <a href="#" class="pull-right need-help">¿Olvidó su contraseña?</a><span class="clearfix"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>