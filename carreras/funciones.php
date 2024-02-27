<?php

include('conexion.php');

function obtener_todos_registros (){
    
    $stmt = $conexion->prepare("SELECT * FROM carreras");
    $stmt ->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt ->rowCount();

}


?>