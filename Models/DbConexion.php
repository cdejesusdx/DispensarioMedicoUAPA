<?php 
    // Usando PDO para la conexion la DB y acceso a los datos.

    // Credenciales por defecto -> usuario BD
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','test');

    try {
        
        $PDOConexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    } catch (PDOException $e) {
        echo "Error en la conexión ". $e->getMessage();
    }     
?>