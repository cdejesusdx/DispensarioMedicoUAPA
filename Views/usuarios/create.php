<?php include_once '../../controllers/usuariosController.php';?>
<?php
    
    if(isset($_POST['btnCreate']))
    {
        $rol = $_POST['rol'];
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $confirmacionContrasena = $_POST['confirmacionContrasena'];

        if($contrasena != $confirmacionContrasena){
            $msg = "<div class='alert alert-warning'><strong>Ups!</strong> La contraseña y la confirmación no coinciden!</div>";
        }
        else {
            if($CrudUsuarios->create($rol, $usuario, $nombre, md5($contrasena)))
             header("Location: create.php?create");

            else
                header("Location: create.php?noCreate");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once '../../header.php';?>
<body>
    <?php include_once '../../menu.php';?>

    <div class="clearfix"></div>

    <?php
        if(isset($_GET['create']))
        {
            ?>
                <div class="container">
                    <div class="alert alert-info">
                        <strong>Registro creado satisfactoriamente</strong><a href="index.php"> Todos los registros</a>
                    </div>
                </div>
            <?php
        }
        else if(isset($_GET['noCreate']))
        {
            ?>
                <div class="container">
                    <div class="alert alert-warning">
                        <strong>Ups!</strong> ¡ERROR al crear el registro!
                    </div>
                </div>
            <?php
        }
    ?>

    <div class="clearfix"></div><br/>

    <div class="container">
        <?php
            if(isset($msg))
            {
                echo $msg;
            }
        ?>
    </div>

    <div class="container">
        <form method='post'>
            <table class='table table-bordered'>
                <tr>
                    <td>Rol</td>
                    <td>
                        <select class="form-control" name="rol" required>
                            <option value="" selected>[Seleccione]</option>
                            <option value="1">Administrador</option>
                            <option value="2">Colaborador</option>
                            <option value="3">Médico</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Usuario</td>
                    <td><input type='text' name='usuario' class='form-control' required></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type='text' name='nombre' class='form-control' required></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input type='password' name='contrasena' class='form-control' required></td>
                </tr>
                <tr>
                    <td>Confirmación Contraseña</td>
                    <td><input type='password' name='confirmacionContrasena' class='form-control' required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btnCreate">
                            <span class="glyphicon glyphicon-plus"></span>Crear nuevo registro
                        </button>  
                        <a href="index.php" class="btn btn-large btn-success">
                            <i class="glyphicon glyphicon-backward"></i>&nbsp;Regresar
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

<?php include_once '../../footer.php';?>
</body>
</html>