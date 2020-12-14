<?php include_once '../../controllers/medicamentosController.php';?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once '../../header.php';?>
<body>
    <?php include_once '../../menu.php';?>

    <div class="container">
        <a href="create.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp;Agregar</a>
    </div>

    <div class="clearfix"></div><br/>

    <div class="container">
        <table class='table table-hover table-responsive'>
            <tr>
                <th>#</th>
                <th>Tipo Fármaco</th>
                <th>Ubicación</th>
                <th>Marca</th>
                <th>Descripción</th>
                <th>Dosis</th>
                <th style="text-align: center;">Estado</th>
                <th colspan="2" style="text-align: center;">Acción</th>
            </tr>
            <?php
                $query = "CALL ConsMedicamentos();";       
                $recordsPerPage = 5;
                $newQuery = $CrudMedicamentos->paging($query, $recordsPerPage);
                $CrudMedicamentos->dataView($newQuery);
            ?>
            <tr>
                <td colspan="10" style="text-align: center;">
                    <div class="pagination-wrap">
                        <?php $CrudMedicamentos->pagingLink($query, $recordsPerPage); ?>
                    </div>
                </td>
            </tr>
            </table>
    </div>

    <?php include_once '../../footer.php';?>
</body>
</html>