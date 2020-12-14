<?php
    include_once '../../models/connectionDB.php';
    include_once '../../models/tiposFarmacosRepository.php';

    $CrudTiposFarmacos= new tiposFarmacosRepository($PDOConnection);
?>