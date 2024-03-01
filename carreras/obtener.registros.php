<?php

include("conexion.php");
include("funciones.php");

$query = "";
$salida = array();
$query = "SELECT * FROM carreras ";

if(isset($_POST["search"]["value"])){
    $query .= 'WHERE descripcion_carrera LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if(isset($_POST["order"])){
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST["order"][0]['dir'] . ' ';
} else {
    $query .= 'ORDER BY codigo_carrera DESC ';
}

if($_POST['length'] != -1){
    $query .= 'LIMIT ' . ($_POST["start"]) . ',' . $_POST["length"];
}

$stmt = $conexion->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchAll();
$datos = array();
$filtered_rows = $stmt->rowCount();

foreach($resultado as $fila){
    $sub_array = array();
    $sub_array[] = $fila["codigo_carrera"];
    $sub_array[] = $fila["descripcion_carrera"];
    $sub_array[] = $fila["valor_total"];
    $sub_array[] = $fila["estado"];
    $sub_array[] = '<button type="button" name="editar" id="'.$fila["codigo_carrera"].'" class="btn btn warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id="'.$fila["codigo_carrera"].'" class="btn btn warning btn-xs borrar">Borrar</button>';

    $datos[] = $sub_array;
}

$salida = array (
    "draw"            => intval($_POST["draw"]),
    "recordsTotal"    => $filtered_rows,
    "recordsFiltered" => $filtered_rows,//obtener_todos_registros(),
    "data"            => $datos
);

echo json_encode($salida);

?>
