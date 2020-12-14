<?php include_once '../../controllers/usuariosController.php';?>
<?php include_once '../../header.php';?>
<?php
    
    if(isset($_POST['btnChange']))
    {
        $id = $_GET['changeId'];
        $contrasena = $_POST['contrasena'];
        $confirmacionContrasena = $_POST['confirmacionContrasena'];

        if($contrasena != $confirmacionContrasena)
            $msg = "<div class='alert alert-warning'><strong>Ups!</strong> La contraseña y la confirmación no coinciden!</div>";

        else{
            if($CrudUsuarios->changePassword($id, md5($contrasena)))
                $msg = "<div class='alert alert-info'><strong>Registro actualizado satisfactoriamente</strong> <a href='index.php'>Todos los registros</a>!</div>";

            else
                $msg = "<div class='alert alert-warning'><strong>Ups!</strong> ERROR actualizando el registro!</div>";
        }
        
    }

    if(isset($_GET['changeId']))
    {
        $id = $_GET['changeId'];
        
        $updateRow = $CrudUsuarios->selectById($id);
    }

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" > 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="clearfix"></div>

<div class="container">
    <?php
        if(isset($msg))
        {
            echo $msg;
        }
    ?>
</div>

<div class="clearfix"></div><br />

<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
        <tr>
                <td>Rol</td>
                <td>
                    <select class="form-control" name="rol" readonly required>
                        <option value="">[Seleccione]</option>
                        <option value="1" <?php if($updateRow->IdRol == 1){ echo "selected"; } ?>>Administrador</option>
                        <option value="2" <?php if($updateRow->IdRol == 2){ echo "selected"; } ?>>Colaborador</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td><input type='text' name='usuario' class='form-control' value="<?php echo $updateRow->Usuario; ?>" readonly required></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type='text' name='nombre' class='form-control' value="<?php echo $updateRow->Nombre; ?>" readonly required></td>
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
                    <button type="submit" class="btn btn-primary" name="btnChange">
                        <span class="glyphicon glyphicon-edit"></span> Actualizar este registro
                    </button>
                    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp Regresar</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once '../../footer.php';?>