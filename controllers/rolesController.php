<?php
    include_once '../../models/connectionDB.php';
    include_once '../../models/rolesRepository.php';

    $CrudRoles = new rolesRepository($PDOConnection);
?>