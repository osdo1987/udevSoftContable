<?php
function subir_imagen(){
    if(isset ($_FILES["imagen_estudiante"])) {

        $extensiones = explode('.', $_FILES["imagen_estudiante"]['name']);
        $nuevo_nombre = rand() . '.' . $extensiones[1];
        $ubicacion = './img/' . $nuevo_nombre;
        move_uploaded_file($_FILES["imagen_estudiante"]['tmp_name'], $ubicacion);
        return $nuevo_nombre;


        }
        }

    function obtener_nombre_imagen($codigo_estudiante){
        

        include('conexion.php');
        $stmt = $conexion ->prepare("SELECT imagen From estudiantes WHERE codigo_estudiante= '$codigo_estudiante'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imagen"];
        }

    }

function obtener_todos_registros (){
    include('conexion.php');
    $stmt = $conexion->prepare("SELECT * FROM estudiantes");
    $stmt ->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt ->rowCount();

}


?>