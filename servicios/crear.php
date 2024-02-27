<?php

include("../conexion.php");
include("funciones.php");

if($_POST["operacion"] == "Crear"){

    

    $stmt = $conexion->prepare("INSERT INTO servicios(codigo_servicio, descripcion_servicio, valor_total_servicio, estado)
    VALUES(:codigo_servicio, :descripcion_servicio, :valor_total_servicio, :estado)");

    $resultado = $stmt->execute(
        array(
            ':codigo_servicio'  => $_POST["codigo_servicio"],
            ':descripcion_servicio'  => $_POST["descripcion_servicio"],
            ':valor_total_servicio'  => $_POST["valor_total_servicio"],
            ':estado'  => $_POST["estado"],
           
        )
        );
        if(!empty($resultado)){
            echo'Registro creado';
        }
}

if($_POST["operacion"] == "editar"){
    
    
    $stmt = $conexion->prepare("UPDATE servicios SET descripcion_servicio=:descripcion_servicio, 
    valor_total_servicio=:valor_total_servicio, estado=:estado WHERE codigo_servicio = :codigo_servicio");

    $resultado = $stmt->execute(
        array(
            ':descripcion_servicio' => $_POST["descripcion_servicio"],
            ':valor_total_servicio' => $_POST["valor_total_servicio"],
            ':estado' => $_POST["estado"],
            ':codigo_servicio' => $_POST["codigo_servicio"]
        )
    );
    
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    } else {
        echo "No se pudo actualizar el registro";
    }
}