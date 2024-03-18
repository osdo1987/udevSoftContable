<?php

include("../conexion.php");
//include("funciones.php");

@$action = $_POST["operacion"];
main($action, $conexion);

function main($action, $conexion)
{
    switch ($action) {
        case 'crear':
            crear($conexion);
            break;

        case 'editar':
            editar($conexion);
            break;

        case 'borrar':
            borrar($conexion);
            break;

        case 'obtener_registro':
            obtener_registro($conexion);
            break;

        default:
            obtener_registros($conexion);
            break;
    }
}

function crear($conexion)
{

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
}

function editar($conexion)
{


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


}

function borrar($conexion)
{
    if (isset($_POST["codigo_estudiante"])) {
        $stmt = $conexion->prepare("DELETE FROM estudiantes WHERE codigo_estudiante = :codigo_estudiante");

        $resultado = $stmt->execute(
            array(
                ':codigo_estudiante' => $_POST["codigo_estudiante"]
            )
        );
        if (!empty($resultado)) {
            echo 'Registro borrado';
        }
    }
}

function obtener_registros($conexion)
{

    $query = "";
    $salida = array();
    $query = "SELECT * FROM estudiantes ";


    if (isset($_POST["search"]["value"])) {

        $query .= 'WHERE nombre_estudiante LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= ' OR apellidos_estudiante LIKE "%' . $_POST["search"]["value"] . '%" ';

    }
    if (isset($_POST["order"])) {

        $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' .
            $_POST["order"][0]['dir'] . ' ';

    } else {
        $query .= 'ORDER BY codigo_estudiante DESC ';
    }

    if (isset($_POST["length"]) && isset($_POST["start"])) {
        $query .= 'LIMIT ' . $_POST["start"] . ', ' . $_POST["length"];
    }

    $stmt = $conexion->prepare($query);

    try {



        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $datos = array();
        $filtered_rows = $stmt->rowCount();

        $draw = isset($_POST['draw']) ? intval($_POST['draw']) : 0;
        foreach ($resultado as $fila) {
            $imagen = '';
            if ($fila["imagen"] != '') {
                $imagen = '<img src="../img/' . $fila["imagen"] . '"  class="img-thumbnail" width="50" height="35" />';
            } else {
                $imagen = '';
            }

            $sub_array = array();
            $sub_array[] = $fila["codigo_estudiante"];
            $sub_array[] = $fila["nombre_estudiante"];
            $sub_array[] = $fila["apellidos_estudiante"];
            $sub_array[] = $fila["fecha_nacimiento_estudiante"];
            $sub_array[] = $imagen;
            $sub_array[] = $fila["estado"];

            $sub_array[] = '<button type="button" data-bs-toggle="modal" data-bs-target="#modalUsuario" name="editar" id="' . $fila["codigo_estudiante"] . '"  class="btn btn-warning bi bi-pencil-square editar"></button>';
            $sub_array[] = '<button type="button" name="borrar" id="' . $fila["codigo_estudiante"] . '"  class="btn btn-danger bi bi-trash borrar"></button>';
            $datos[] = $sub_array;

        }

        $salida = array(
            "draw" => $draw,
            "recordsTotal" => $filtered_rows,
            "recordsFiltered" => obtener_todos_registros(),
            "data" => $datos
        );

        echo json_encode($salida);

    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}




function obtener_registro($conexion)
{

    if (isset($_POST["codigo_estudiante"])) {

        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM estudiantes WHERE codigo_estudiante = '" . $_POST["codigo_estudiante"] . "' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach ($resultado as $fila) {
            $salida["nombre_estudiante"] = $fila["nombre_estudiante"];
            $salida["apellidos_estudiante"] = $fila["apellidos_estudiante"];
            $salida["fecha_nacimiento_estudiante"] = $fila["fecha_nacimiento_estudiante"];
            if ($fila["imagen"] != "") {
                $salida["imagen_estudiante"] = '<../img src="img/' . $fila["imagen"]
                    . '"  class="img-thumbnail" width="100" height="" /><input type="hiden" name="imagen_estudiante_oculta" value="' . $fila["imagen"] . '"/>';

            } else {
                $salida["imagen_estudiante"] = '<input type="hidden" name="imagen_estudiante_oculta" value=""/>';
            }
            $salida["estado"] = $fila["estado"];

        }

        echo json_encode($salida);
    }
}

function obtener_todos_registros()
{
    include('../conexion.php');
    $stmt = $conexion->prepare("SELECT * FROM estudiantes");
    $stmt->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt->rowCount();

}

function subir_imagen()
{
    if (isset($_FILES["imagen_estudiante"])) {

        $extensiones = explode('.', $_FILES["imagen_estudiante"]['name']);
        $nuevo_nombre = rand() . '.' . $extensiones[1];
        $ubicacion = '../img/' . $nuevo_nombre;
        move_uploaded_file($_FILES["imagen_estudiante"]['tmp_name'], $ubicacion);
        return $nuevo_nombre;


    }
}

function obtener_nombre_imagen($codigo_estudiante)
{
    include('../conexion.php');
    $stmt = $conexion->prepare("SELECT imagen From estudiantes WHERE codigo_estudiante= '$codigo_estudiante'");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach ($resultado as $fila) {
        return $fila["imagen"];
    }

}