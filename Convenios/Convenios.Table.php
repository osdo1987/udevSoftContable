<?php

include("../conexion.php");



/*main($action, $conexion);

$stmt = $conexion->prepare('SELECT movimientos.codigo_movimiento, movimientos.fecha_movimiento, movimientos.valor_movimiento
    FROM convenio INNER JOIN movimientos ON convenio.codigo_estudiante=movimientos.codigo_fk_estudiante');
    $stmt->execute();
    $resultado = $stmt->fetch();
    return $stmt->rowCount();*/

// Manejo de la petición Ajax
$action = isset($_GET['action']) ? $_GET['action'] : '';

main($action, $conexion);

function main($action, $conexion) {
    switch ($action) {
        case 'buscar': // Corregido el nombre de la acción
            buscar($conexion);
            break;
        default:
        
        info_estudiante($conexion);
            //echo json_encode(array('error' => 'Acción no válida'));
    }
}

function info_estudiante($conexion)
{

    $salida = array();

    try {
        $stmt = $conexion->prepare("SELECT movimientos.codigo_movimiento, movimientos.fecha_movimiento, movimientos.valor_movimiento
        FROM movimientos
        WHERE movimientos.codigo_fk_estudiante = :codigo_estudiante");
        $stmt->bindParam(':codigo_estudiante', $_POST['codigo_estudiante'], PDO::PARAM_INT);

       // $stmt->bindParam(':codigo_convenio', $_POST['codigo_convenio'], PDO::PARAM_INT);
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

?>


    