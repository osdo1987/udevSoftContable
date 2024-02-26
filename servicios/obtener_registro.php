<?php

include("../conexion.php");
include("funciones.php");


$salida = array();

try {
    $stmt = $conexion->prepare("SELECT * FROM servicios WHERE codigo_servicio = 3 LIMIT 1");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $salida = $resultado;
    } else {
        $salida["error"] = "No se encontraron resultados";
    }
} catch (PDOException $e) {
    $salida["error"] = "Error en la ejecución de la consulta: " . $e->getMessage();
}

echo json_encode($salida);
