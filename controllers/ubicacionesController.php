<?php
    include_once '../../models/connectionDB.php';
    include_once '../../models/ubicacionesRepository.php';

    $CrudUbicaciones = new ubicacionesRepository($PDOConnection);
?>