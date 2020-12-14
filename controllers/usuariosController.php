<?php
    include_once '../../models/connectionDB.php';
    include_once '../../models/usuariosRepository.php';

    $CrudUsuarios = new usuariosRepository($PDOConnection);
?>