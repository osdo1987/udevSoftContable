<?php

include("../conexion.php");
include("funciones.php");





if ($_POST["operacion"] == "crear") {


    $imagen = '';
    if ($_FILES["imagen_estudiante"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO estudiantes(nombre_estudiante, apellidos_estudiante, fecha_nacimiento_estudiante, imagen, estado)VALUES(:nombre, :apellidos, :fecha_nacimiento_estudiante, :imagen_estudiante, :estado)");

    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':fecha_nacimiento_estudiante' => $_POST["fecha_nacimiento_estudiante"],
            ':imagen_estudiante' => $imagen,
            ':estado' => $_POST["estado"],
        )
    );
    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


$codigo = $_POST["codigo_estudiante"];

if ($_POST["operacion"] == "editar") {
    $imagen = '';

    if ($_FILES["imagen_estudiante"]["name"] != '') {
        $imagen = subir_imagen();
    } else {
        $imagen = $_POST["imagen_estudiante_oculta"];
    }

    $stmt = $conexion->prepare("UPDATE estudiantes SET nombre_estudiante=:nombre, apellidos_estudiante=:apellidos,fecha_nacimiento_estudiante=:fecha_nacimiento_estudiante, 
    imagen=:imagen_estudiante,estado=:estado WHERE codigo_estudiante = :codigo_estudiante");

    $stmt->bindParam(':nombre', $_POST["nombre"]);
    $stmt->bindParam(':apellidos', $_POST["apellidos"]);
    $stmt->bindParam(':fecha_nacimiento_estudiante', $_POST["fecha_nacimiento_estudiante"]);
    $stmt->bindParam(':imagen_estudiante', $imagen);
    $stmt->bindParam(':estado', $_POST["estado"]);
    $stmt->bindParam(':codigo_estudiante', $codigo);

    $resultado = $stmt->execute();

    if ($resultado) {
        echo 'Registro actualizado';
    } else {
        echo 'Error al actualizar el registro';
        print_r($stmt->errorInfo());
    }
}
