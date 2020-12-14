<?php include_once '../../controllers/tiposFarmacosController.php';?>

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
                <th style="text-align: center;">Estado</th>
                <th colspan="2" style="text-align: center;">Acción</th>
            </tr>
            <?php
                $query = "CALL ConsTiposFarmacos();";       
                $recordsPerPage = 5;
                $newQuery = $CrudTiposFarmacos->paging($query, $recordsPerPage);
                $CrudTiposFarmacos->dataView($newQuery);
            ?>
            <tr>
                <td colspan="7" style="text-align: center;">
                    <div class="pagination-wrap">
                        <?php $CrudTiposFarmacos->pagingLink($query, $recordsPerPage); ?>
                    </div>
                </td>
            </tr>
            </table>
    </div>

    <?php include_once '../../footer.php';?>
</body>
</html>