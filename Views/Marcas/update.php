<?php include_once '../../controllers/marcaController.php';?>
<?php
    
    if(isset($_POST['btnUpdate']))
    {
        $id = $_GET['updateId'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        if($CrudMarca->update($id, $descripcion, $estado))
            $msg = "<div class='alert alert-info'><strong>Registro actualizado satisfactoriamente</strong> <a href='index.php'>Todos los registros</a>!</div>";

        else
            $msg = "<div class='alert alert-warning'><strong>Ups!</strong> ERROR actualizando el registro!</div>";
    }

    if(isset($_GET['updateId']))
    {
        $id = $_GET['updateId'];
        
        $updateRow = $CrudMarca->getById($id);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once '../../header.php';?>
<body>
    <?php include_once '../../menu.php';?>
   
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
                    <td>Descripción</td>
                    <td><input type='text'id='descripcion' name='descripcion' class='form-control' value="<?php echo $updateRow->Descripcion; ?>" required></td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td>
                        <label class="radio-inline"><input type="radio" id='estado'name="estado" <?php if (isset($updateRow->Estado) && $updateRow->Estado == 1) echo "checked";?> value="1"> Activa</label>
                        <label class="radio-inline"><input type="radio" id='estado'name="estado" <?php if (isset($updateRow->Estado) && $updateRow->Estado == 0) echo "checked";?> value="0"> Inactiva</label>
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
</body>
</html>