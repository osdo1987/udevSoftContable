<?php

include("conexion.php");
include("funciones.php");

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
        case 'obtener_registro':
            obtener_registro($conexion);
            break;
        default:
            # code...
            break;
    }
}

function borrar($conexion)
{
    if (isset($_POST["codigo_servicio"])) {
        $stmt = $conexion->prepare("DELETE FROM servicios WHERE codigo_servicio = :codigo_servicio");

        $resultado = $stmt->execute(
            array(
                ':codigo_servicio'  => $_POST["codigo_servicio"]
            )
        );
        if (!empty($resultado)) {
            echo 'Registro borrado';
        }
    }
}

function crear($conexion)
{
    $stmt = $conexion->prepare("INSERT INTO servicios(codigo_servicio, descripcion_servicio, valor_total_servicio, estado) VALUES(:codigo_servicio, :descripcion_servicio, :valor_total_servicio, :estado)");

    $resultado = $stmt->execute(
        array(
            ':codigo_servicio'  => $_POST["codigo_servicio"],
            ':descripcion_servicio'  => $_POST["descripcion_servicio"],
            ':valor_total_servicio'  => $_POST["valor_total_servicio"],
            ':estado'  => $_POST["estado"],
        )
    );
    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}

function editar($conexion)
{
    $stmt = $conexion->prepare("UPDATE servicios SET descripcion_servicio=:descripcion_servicio, valor_total_servicio=:valor_total_servicio, estado=:estado WHERE codigo_servicio = :codigo_servicio");

    $resultado = $stmt->execute(
        array(
            ':descripcion_servicio' => $_POST["descripcion_servicio"],
            ':valor_total_servicio' => $_POST["valor_total_servicio"],
            ':estado' => $_POST["estado"],
            ':codigo_servicio' => $_POST["codigo_servicio"]
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    } else {
        echo "No se pudo actualizar el registro";
    }
}

function obtener_registro($conexion)
{
    $salida = array();

    try {
        $stmt = $conexion->prepare("SELECT * FROM servicios WHERE codigo_servicio = :codigo_servicio LIMIT 1");
        $stmt->bindParam(':codigo_servicio', $_POST['codigo_servicio'], PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $salida = $resultado;
        } else {
            $salida["error"] = "No se encontraron resultados";
        }
    } catch (PDOException $e) {
        $salida["error"] = "Error en la ejecución de la consulta: " . $e->getMessage();
    }

    echo json_encode($salida);
}

function obtener_todos_registros()
{
    include("../conexion.php");
    $stmt = $conexion->prepare("SELECT * FROM servicios");
    $stmt->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt->rowCount();
}

?>
