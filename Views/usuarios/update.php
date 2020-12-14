<?php include_once '../../controllers/usuariosController.php';?>
<?php include_once '../../header.php';?>
<?php
    
    if(isset($_POST['btnUpdate']))
    {
        $id = $_GET['updateId'];
        $rol = $_POST['rol'];
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $activo = $_POST['activo'];
        $bloqueado = $_POST['bloqueado'];

        if($CrudUsuarios->update($id, $rol, $usuario, $nombre, $activo, $bloqueado))
            $msg = "<div class='alert alert-info'><strong>Registro actualizado satisfactoriamente</strong> <a href='index.php'>Todos los registros</a>!</div>";

        else
            $msg = "<div class='alert alert-warning'><strong>Ups!</strong> ERROR actualizando el registro!</div>";
    }

    if(isset($_GET['updateId']))
    {
        $id = $_GET['updateId'];
        
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
                    <select class="form-control" name="rol" required>
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
                <td><input type='text' name='nombre' class='form-control' value="<?php echo $updateRow->Nombre; ?>" required></td>
            </tr>
            <tr>
                <td>Activo</td>
                <td>
                    <label class="radio-inline"><input type="radio" name="activo" <?php if (isset($updateRow->Activo) && $updateRow->Activo == 1) echo "checked";?> value="1"> Si</label>
                    <label class="radio-inline"><input type="radio" name="activo" <?php if (isset($updateRow->Activo) && $updateRow->Activo == 0) echo "checked";?> value="0"> No</label>
                </td>
            </tr>
            <tr>
                <td>Bloqueado</td>
                <td>
                    <label class="radio-inline"><input type="radio" name="bloqueado" <?php if (isset($updateRow->Bloqueado) && $updateRow->Bloqueado == 1) echo "checked";?> value="1"> Si</label>
                    <label class="radio-inline"><input type="radio" name="bloqueado" <?php if (isset($updateRow->Bloqueado) && $updateRow->Bloqueado == 0) echo "checked";?> value="0"> No</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btnUpdate">
                        <span class="glyphicon glyphicon-edit"></span> Actualizar este registro
                    </button>
                    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp Regresar</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once '../../footer.php';?>