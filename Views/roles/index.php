<?php include_once '../../controllers/rolesController.php';?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once '../../header.php';?>
<body>
    <?php include_once '../../menu.php';?>

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
</body>
</html>