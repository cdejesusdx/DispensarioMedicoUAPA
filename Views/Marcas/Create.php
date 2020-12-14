<?php include_once '../../controllers/marcaController.php';?>
<?php
    
    if(isset($_POST['btnCreate']))
    {
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        if($CrudMarca->create($descripcion, $estado))
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
        <form method='post'>
            <table class='table table-bordered'>
                <tr>
                    <td>Descripción</td>
                    <td><input type='text' id='descripcion' name='descripcion' class='form-control' required></td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td>
                        <label class="radio-inline"><input type="radio" id='estado'name="estado" value="1" checked> Activa</label>
                        <label class="radio-inline"><input type="radio" id='estado'name="estado" value="0"> Inactiva</label>
                    </td>
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