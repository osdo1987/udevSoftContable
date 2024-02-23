<?php

include("conexion.php");
include("funciones.php");


if(isset($_POST["operacion"]) && $_POST["operacion"] == "crear") {
    
    try {
        if(isset($_POST["nombre_carrera"], $_POST["descripcion_carrera"], $_POST["valor_total_carrera"], $_POST["estado"])) {
            $stmt = $conexion->prepare("INSERT INTO carreras(nombre_carrera, descripcion_carrera, valor_total, estado) VALUES(:nombre_carrera, :descripcion_carrera, :valor_total, :estado)");
            $resultado = $stmt->execute(array(
                ':nombre_carrera' => $_POST["nombre_carrera"],
                ':descripcion_carrera' => $_POST["descripcion_carrera"],
                ':valor_total' => $_POST["valor_total_carrera"],
                ':estado' => $_POST["estado"]
            ));

            if($resultado) {
                echo 'Registro creado';
            } else {
                echo 'Error al crear el registro';
            }
        } else {
            echo 'Faltan campos obligatorios';
        }
    } catch(PDOException $e) {
        echo 'Error en la consulta: ' . $e->getMessage();
    }
} else {
    echo 'Operación no válida';
}

?>
