
<?php

include("../conexion.php");

$fecha_movimiento = $_POST['fecha_movimiento'];
$valor_movimiento = $_POST['valor_movimiento'];
$descripcion_movimiento = $_POST['descripcion_movimiento'];
$codigo_fk_estudiante = 12;
$codigo_servicio = 9;

$sql = "INSERT INTO movimientos (fecha_movimiento, valor_movimiento, descripcion_movimiento, codigo_fk_estudiante, codigo_servicio) VALUES ('$fecha_movimiento', '$valor_movimiento', '$descripcion_movimiento', '$codigo_fk_estudiante', '$codigo_servicio')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: ". $sql. "<br>" . $conn->error;
}

$conn->close();
?>