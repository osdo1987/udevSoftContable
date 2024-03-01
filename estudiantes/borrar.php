<?php

include("../conexion.php");
include("funciones.php");

$stmt = $conexion->prepare("DELETE FROM estudiantes WHERE codigo_estudiante = :codigo_estudiante");



$resultado = $stmt->execute(
    array(

        ':codigo_estudiante' => $_POST["codigo_estudiante"]
    )
);
if (!empty($resultado)) {
    echo 'Registro borrado';
}





?>