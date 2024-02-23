<?php

include("conexion.php");
include("funciones.php");
if($_POST["operacion"] == "crear"){
    
    
    
    
    
    $imagen = '';
    if ($_FILES["imagen_estudiante"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO estudiantes(codigo_estudiante, nombre_estudiante, apellidos_estudiante, fecha_nacimiento_estudiante, imagen)VALUES(:codigo_estudiante, :nombre, :apellidos, :fecha_nacimiento_estudiante, :imagen_estudiante)");

    $resultado = $stmt->execute(
        array(
            ':codigo_estudiante'  => $_POST["codigo_estudiante"],
            ':nombre'  => $_POST["nombre"],
            ':apellidos'  => $_POST["apellidos"],
            ':fecha_nacimiento_estudiante'  => $_POST["fecha_nacimiento_estudiante"],
            ':imagen_estudiante' => $imagen,
           

        )
        );
        if(!empty($resultado)){
            echo'Registro creado';
        }
}

if($_POST["operacion"] == "editar"){
    $imagen = '';
    if ($_FILES["imagen_estudiante"]["name"] != '') {
        $imagen = subir_imagen();
    }else{
        $imagen=$_POST["imagen_estudiante_oculta"];
    }
$stmt = $conexion->prepare("UPDATE estudiantes SET nombre_estudiante=:nombre, apellidos_estudiante=:apellidos,
fecha_nacimiento_estudiante=:fecha_nacimiento_estudiante, imagen=:imagen_estudiante WHERE codigo_estudiante = :codigo_estudiante");
    
   

    $resultado = $stmt->execute(
        array(
           
            ':nombre'  => $_POST["nombre"],
            ':apellidos'  => $_POST["apellidos"],
            ':fecha_nacimiento_estudiante'  => $_POST["fecha_nacimiento_estudiante"],
            ':imagen_estudiante' => $imagen,
            ':codigo_estudiante'  => $_POST["codigo_estudiante"]
            

           

        )
        );
        if(!empty($resultado)){
            echo'Registro actulizado';
        }
}





?>