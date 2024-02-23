<?php

include("conexion.php");
include("funciones.php");


if(isset($_POST["codigo_estudiante"])){
    $imagen = obtener_nombre_imagen($_POST["codigo_estudiante"]);

    if ($imagen != "") {
       unlink("img/" . $imagen );


    }
$stmt = $conexion->prepare("DELETE FROM estudiantes WHERE codigo_estudiante = :codigo_estudiante");
    
   

    $resultado = $stmt->execute(
        array(
           
           
            ':codigo_estudiante'  => $_POST["codigo_estudiante"]
            

           

        )
        );
        if(!empty($resultado)){
            echo'Registro borrado';
        }
}




?>