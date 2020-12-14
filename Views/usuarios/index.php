<?php include_once '../../controllers/usuariosController.php';?>

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
                <th>Rol</th>
                <th>Usuario</th>
                <th>Nombre</th> 
                <th style="text-align: center;">Ultimo Inicio Sesión</th>
                <th style="text-align: center;">Bloqueado</th>
                <th style="text-align: center;">Activo</th>
                <th colspan=3 style="text-align: center;">Acción</th>
            </tr>
            <?php
                $query = "CALL ConsUsuarios();";       
                $recordsPerPage = 5;
                $newQuery = $CrudUsuarios->paging($query, $recordsPerPage);
                $CrudUsuarios->dataView($newQuery);
            ?>
            <tr>
                <td colspan="10" style="text-align: center;">
                    <div class="pagination-wrap">
                        <?php $CrudUsuarios->pagingLink($query, $recordsPerPage); ?>
                    </div>
                </td>
            </tr>
            </table>
        </div>

    <?php include_once '../../footer.php';?>
</body>
</html>