<?php include_once '../../controllers/rolesController.php';?>
<?php include_once '../../header.php';?>

<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" > 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <a href="#" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp;Agregar</a>
</div>

<div class="clearfix"></div><br/>

<div class="container">
    <table class='table table-hover table-responsive'>
        <tr>
            <th>#</th>
            <th>Descripción</th>
            <th style="text-align: center;">Activo</th>
            <th colspan="2" style="text-align: center;">Acción</th>
        </tr>
        <?php
            $query = "CALL ConsRoles();";       
            $recordsPerPage = 5;
            $newQuery = $CrudRoles->paging($query, $recordsPerPage);
            $CrudRoles->dataView($newQuery);
        ?>
        <tr>
            <td colspan="7" style="text-align: center;">
                <div class="pagination-wrap">
                    <?php $CrudRoles->pagingLink($query, $recordsPerPage); ?>
                </div>
            </td>
        </tr>
        </table>
</div>

<?php include_once '../../footer.php';?>
