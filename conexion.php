<?php

<<<<<<< HEAD

$usuario = "hugosdd_udev";
$password = "udeVwx1";
$nombre_servidor = "mysql-hugosdd.alwaysdata.net";
$nombre_base_de_datos = "hugosdd_udev";

try {
    $dsn = "mysql:host=$nombre_servidor;dbname=$nombre_base_de_datos";
    $conexion = new PDO($dsn, $usuario, $password);
    // Configura PDO para que lance excepciones en caso de errores.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit; // Salir del script si hay un error de conexión
}


=======
$usuario = "hugosdd_udev";
$password = "udeVwx1";
$conexion = new PDO("mysql:host=mysql-hugosdd.alwaysdata.net;dbname=hugosdd_udev", $usuario, $password);
>>>>>>> 90f0a5bbc58c64c118287784748ca39c7615f284

