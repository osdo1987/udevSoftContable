<?php

include("../conexion.php");

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

function obtener_registros($conexion)
{
    
    $query = "";
$salida = array();
$query = "SELECT * FROM servicios ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE codigo_servicio LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR valor_total_servicio LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . 
    $_POST["order"][0]['dir'] . ' ';
} else {
    $query .= 'ORDER BY codigo_servicio DESC ';
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

        

        $sub_array = array();
        $sub_array[] = $fila["codigo_servicio"];
        $sub_array[] = $fila["descripcion_servicio"];
        $sub_array[] = $fila["valor_total_servicio"];
        $sub_array[] = $fila["estado"];
        $sub_array[] = '<div class="text-center"><button type="button" name="editar" id="' . $fila["codigo_servicio"] . '" class="btn btn-warning btn-xs editar"><i class="bi bi-pencil-fill"></i></button></div>';
        $sub_array[] = '<div class="text-center"><button type="button" name="borrar" id="' . $fila["codigo_servicio"] . '" class="btn btn-danger btn-xs borrar"><i class="bi bi-trash-fill"></i></button></div>';
        
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"              => $draw,
        "recordsTotal"      => $filtered_rows,
        "recordsFiltered"   => obtener_todos_registros(),
        'data'              => $datos
    );

echo json_encode($salida);

} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
}

function obtener_todos_registros (){
    include("../conexion.php");
    $stmt = $conexion->prepare("SELECT * FROM servicios");
    $stmt ->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt ->rowCount();

}

?>
