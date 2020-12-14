<?php
    include_once '../../models/connectionDB.php';
    include_once '../../models/marcaRepository.php';

    $CrudMarca = new marcaRepository($PDOConnection);
?>