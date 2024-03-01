<?php
include("../conexion.php");
include("funciones.php");

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
?>
