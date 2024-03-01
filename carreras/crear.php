<?php

include("conexion.php");
//include("funciones.php"); no creo que vaya esto

if($_POST["operacion"] == "crear") {
    $stmt = $conexion->prepare("INSERT INTO carreras(descripcion_carrera, valor_total, estado) VALUES(:descripcion_carrera, :valor_total, :estado)");
           
    $resultado = $stmt->execute(
        array(
            ':descripcion_carrera' => $_POST["descripcion_carrera"],
            ':valor_total' => $_POST["valor_total_carrera"],
            ':estado' => $_POST["estado"]
        )
    );

    if(!empty($resultado) ){
        echo 'Registro creado';
    } 
}

?>
