<?php include_once '../../controllers/medicamentosController.php';?>
<?php include_once '../../controllers/tiposFarmacosController.php';?>
<?php include_once '../../controllers/ubicacionesController.php';?>
<?php include_once '../../controllers/marcaController.php';?>
<?php
    
    if(isset($_POST['btnUpdate']))
    {
        $id = $_GET['updateId'];
        $tipoFarmaco = $_POST['tipoFarmaco'];
        $ubicacion = $_POST['ubicacion'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $dosis = $_POST['dosis'];
        $estado = $_POST['estado'];

        if($CrudMedicamentos->update($id, $tipoFarmaco, $ubicacion, $marca, $descripcion, $dosis, $estado))
            $msg = "<div class='alert alert-info'><strong>Registro actualizado satisfactoriamente</strong> <a href='index.php'>Todos los registros</a>!</div>";

        else
            $msg = "<div class='alert alert-warning'><strong>Ups!</strong> ERROR actualizando el registro!</div>";
    }

    if(isset($_GET['updateId']))
    {
        $id = $_GET['updateId'];
        
        $updateRow = $CrudMedicamentos->selectById($id);
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
                    <td>Tipos Fármacos</td>
                    <td>
                        <select class="form-control" name="tipoFarmaco" required>
                            <option value="" selected>[Seleccione]</option>
                            <?php 
                                $rows = $CrudTiposFarmacos->getAll();
                                foreach($rows as $item) {
                                    ?>
                                        <option value="<?php echo $item->IdTipoFarmaco; ?>" <?php if($updateRow->IdTipoFarmaco == $item->IdTipoFarmaco){ echo "selected"; } ?>>
                                            <?php echo $item->Descripcion; ?>
                                        </option>
                                    <?php
                                }           
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Ubicaciones</td>
                    <td>
                        <select class="form-control" name="ubicacion" required>
                            <option value="" selected>[Seleccione]</option>
                            <?php 
                                $rows = $CrudUbicaciones->getAll();
                                foreach($rows as $item) {
                                    ?>
                                        <option value="<?php echo $item->IdUbicacion; ?>" <?php if($updateRow->IdUbicacion == $item->IdUbicacion){ echo "selected"; } ?>>
                                            <?php echo $item->Descripcion; ?>
                                        </option>
                                    <?php
                                }           
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Marcas</td>
                    <td>
                        <select class="form-control" name="marca" required>
                            <option value="" selected>[Seleccione]</option>
                            <?php 
                                $rows = $CrudMarca->getAll();
                                foreach($rows as $item) {
                                    ?>
                                        <option value="<?php echo $item->IdMarca; ?>" <?php if($updateRow->IdMarca == $item->IdMarca){ echo "selected"; } ?>>
                                            <?php echo $item->Descripcion; ?>
                                        </option>
                                    <?php
                                }           
                            ?>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Descripción</td>
                    <td><input type='text' name='descripcion' class='form-control' value="<?php echo $updateRow->Descripcion; ?>" required></td>
                </tr>
                <tr>
                    <td>Dosis</td>
                    <td><input type='text' name='dosis' class='form-control' value="<?php echo $updateRow->Dosis; ?>" required></td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td>
                        <label class="radio-inline"><input type="radio" name="estado" <?php if (isset($updateRow->Estado) && $updateRow->Estado == 1) echo "checked";?> value="1"> Activo</label>
                        <label class="radio-inline"><input type="radio" name="estado" <?php if (isset($updateRow->Estado) && $updateRow->Estado == 0) echo "checked";?> value="0"> Inactivo</label>
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