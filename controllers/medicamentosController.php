<?php
    include_once '../../models/connectionDB.php';
    include_once '../../models/medicamentosRepository.php';

    $CrudMedicamentos = new medicamentosRepository($PDOConnection);
?>