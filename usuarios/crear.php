<?php

include("conexion.php");
include("funciones.php");

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellidos, imagen, telefono, email, rol, estado, contraseña) VALUES(:nombre, :apellidos, :imagen, :telefono, :email, :rol, :estado, :contraseña)");

    $resultado = $stmt->execute(
        array(
            ':nombre'    => $_POST["nombre"],
            ':apellidos'    => $_POST["apellidos"],
            ':telefono'    => $_POST["telefono"],
            ':email'    => $_POST["email"],
            ':imagen'    => $imagen,
            ':rol'    => $_POST["rol"],
            ':estado'    => $_POST["estado"],
            ':contraseña'    => $_POST["contraseña"],
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    } else {
        $imagen = $_POST["imagen_usuario_oculta"];
    }

    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, imagen=:imagen, telefono=:telefono, rol=:rol, estado=:estado, contraseña=:contraseña, email=:email WHERE id = :id");

    // Pasar el id_usuario por separado utilizando bindParam o bindValue
    $stmt->bindParam(':id', $_POST["id_usuario"], PDO::PARAM_INT);

    $resultado = $stmt->execute(
        array(
            ':nombre'    => $_POST["nombre"],
            ':apellidos'    => $_POST["apellidos"],
            ':telefono'    => $_POST["telefono"],
            ':email'    => $_POST["email"],
            ':imagen'    => $imagen,
            ':rol'    => $_POST["rol"],
            ':estado'    => $_POST["estado"],
            ':contraseña'    => $_POST["contraseña"],
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}

?>
