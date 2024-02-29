<?php

include("../conexion.php");

$action = $_POST["operacion"];

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

        default:
            # code...
            break;
    }
}

function obtener_registros($conexion)
{
    global $conexion;

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

    if ($_POST['length'] != -1) {
        $query .= 'LIMIT ' . ($_POST["start"]) . ',' . $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach ($resultado as $fila) {
        $imagen = '';
        if ($fila["imagen"] != '') {
            $imagen = '<img src="img/' . $fila["imagen"] . '"  class="img-thumbnail" width="50" height="35" />';
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

        $sub_array[] = '<button type="button" data-bs-toggle="modal" data-bs-target="#modalUsuario" name="editar" id="' . $fila["codigo_estudiante"] . '"  class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="' . $fila["codigo_estudiante"] . '"class="btn btn-danger btn-xs  borrar">Borrar</button>';
        $datos[] = $sub_array;

    }

    $salida = array(
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => $filtered_rows,
        "recordsFiltered" => obtener_todos_registros(),
        "data" => $datos
    );

    echo json_encode($salida);
}

function obtener_registro($conexion, $nombre)
{
    if (isset($_POST["codigo_estudiante"])) {

        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM estudiantes WHERE codigo_estudiante = '" . $_POST["codigo_estudiante"] . "' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach ($resultado as $fila) {
            $salida["nombre_estudiante"] = $fila["nombre"];
            $salida["apellidos_estudiante"] = $fila["apellidos"];
            $salida["fecha_nacimiento_estudiante"] = $fila["fecha_nacimiento_estudiante"];
            if ($fila["imagen_estudiante"] != "") {
                $salida["imagen_estudiante"] = '<img src="img/' . $fila["imagen_estudiante"]
                    . '"  class="img-thumbnail" width="50" height="35" /><input type="hiden" name="imagen_estudiante_oculta" value="' . $fila["imagen"] . '"/>';
            } else {
                $salida["imagen_estudiante"] = '<input type="hidden" name="imagen_estudiante_oculta" value=""/>';
            }
            $salida["estado"] = $fila["estado"];
        }

        echo json_encode($salida);
    }
}


function borrar($conexion)
{
    if (isset($_POST["codigo_estudiante"])) {
        $imagen = obtener_nombre_imagen($_POST["codigo_estudiante"]);

        if ($imagen != "") {
            unlink("img/" . $imagen);
        }
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


function crear($conexion)
{
    $imagen = '';
    if ($_FILES["imagen_estudiante"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO estudiantes(nombre_estudiante, apellidos_estudiante, fecha_nacimiento_estudiante, imagen,estado)VALUES(:nombre, :apellidos, :fecha_nacimiento_estudiante, :imagen_estudiante, :estado)");

    $resultado = $stmt->execute(
        array(
            //':codigo_estudiante' => $_POST["codigo_estudiante"],
            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':fecha_nacimiento_estudiante' => $_POST["fecha_nacimiento_estudiante"],
            ':imagen_estudiante' => $imagen,
            ':estado' => $_POST["estado"],
        )
    );
    if (!empty($resultado)) {
        echo 'Registro creado';
    } else {
        echo 'Registro no guardado';
    }
}

function subir_imagen()
{
    if (isset($_FILES["imagen_estudiante"])) {

        $extensiones = explode('.', $_FILES["imagen_estudiante"]['name']);
        $nuevo_nombre = rand() . '.' . $extensiones[1];
        $ubicacion = './img/' . $nuevo_nombre;
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

function obtener_todos_registros()
{
    include('../conexion.php');
    $stmt = $conexion->prepare("SELECT * FROM estudiantes");
    $stmt->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt->rowCount();

}
function editar($conexion)
{
    $imagen = '';
    if ($_FILES["imagen_estudiante"]["name"] != '') {
        $imagen = subir_imagen();
    } else {
        $imagen = $_POST["imagen_estudiante_oculta"];
    }
    $stmt = $conexion->prepare("UPDATE estudiantes SET nombre_estudiante=:nombre, apellidos_estudiante=:apellidos,
    fecha_nacimiento_estudiante=:fecha_nacimiento_estudiante, imagen=:imagen_estudiante WHERE codigo_estudiante = :codigo_estudiante");
    $resultado = $stmt->execute(
        array(

            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':fecha_nacimiento_estudiante' => $_POST["fecha_nacimiento_estudiante"],
            ':imagen_estudiante' => $imagen,
            ':estado' => $_POST["estado"],
            ':codigo_estudiante' => $_POST["codigo_estudiante"]
        )
    );
    if (!empty($resultado)) {
        echo 'Registro actulizado';
    }
}

