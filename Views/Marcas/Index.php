<?php
    require "../../Controllers/MarcasController.php"; 
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

    <div class="container">
        <a href="Create.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp;Agregar</a>
    </div>
    
    <div class="clearfix"></div><br/>

    <div class="container">
        <table class='table table-bordered table-responsive'>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th colspan="2" align="center">Acción</th>
            </tr>
            <?php
                $query = "SELECT * FROM Marcas";       
                //$records_per_page = 3;
                //$newquery = $crud->paging($query,$records_per_page);
                $CrudMarca->DataView($query);
            ?>
            <tr>
                <td colspan="7" align="center">
                    <div class="pagination-wrap">
                        <?php //$crud->paginglink($query,$records_per_page); ?>
                    </div>
                </td>
            </tr>
         </table>
    </div>

    <footer class="container-fluid bg-4 text-center">
        <p>© <?php echo date("Y"); ?> Universidad Abierta Para Adultos. Todos los derechos reservados.</a></p> 
    </footer>
</body>
</html>