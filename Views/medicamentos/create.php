<?php include_once '../../controllers/medicamentosController.php';?>
<?php include_once '../../controllers/tiposFarmacosController.php';?>
<?php include_once '../../controllers/ubicacionesController.php';?>
<?php include_once '../../controllers/marcaController.php';?>
<?php
    
    if(isset($_POST['btnCreate']))
    {
        $tipoFarmaco = $_POST['tipoFarmaco'];
        $ubicacion = $_POST['ubicacion'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $dosis = $_POST['dosis'];

        if($CrudMedicamentos->create($tipoFarmaco, $ubicacion, $marca, $descripcion, $dosis))
            header("Location: create.php?create");

        else
            header("Location: create.php?noCreate");
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
                    <td>Tipos Fármacos</td>
                    <td>
                        <select class="form-control" name="tipoFarmaco" required>
                            <option value="" selected>[Seleccione]</option>
                            <?php 
                                $rows = $CrudTiposFarmacos->getAll();
                                foreach($rows as $item) {
                                    ?>
                                        <option value="<?php echo $item->IdTipoFarmaco; ?>"><?php echo $item->Descripcion; ?></option>
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
                                        <option value="<?php echo $item->IdUbicacion; ?>"><?php echo $item->Descripcion; ?></option>
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
                                        <option value="<?php echo $item->IdMarca; ?>"><?php echo $item->Descripcion; ?></option>
                                    <?php
                                }           
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Descripción</td>
                    <td><input type='text' name='descripcion' class='form-control' required></td>
                </tr>
                <tr>
                    <td>Dosis</td>
                    <td><input type='text' name='dosis' class='form-control'></td>
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