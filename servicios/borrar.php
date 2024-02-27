<?php

include("../conexion.php");
include("funciones.php");

$stmt = $conexion->prepare("DELETE FROM servicios WHERE codigo_servicio = :codigo_servicio");
    
   

    $resultado = $stmt->execute(
        array(

            ':codigo_servicio'  => $_POST["codigo_servicio"]
        )
        );
        if(!empty($resultado)){
            echo'Registro borrado';
        }





?>