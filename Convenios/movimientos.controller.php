<?php
include "../conexion.php";
echo "Pagos";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_movimiento = $_POST["codigo_movimiento"];
    $fecha_movimiento = $_POST["fecha_movimiento"];
    $valor_movimiento = $_POST["valor_movimiento"];
    $descripcion_movimiento = $_POST["descripcion_movimiento"];
    $codigo_fk_estudiante = $_POST["codigo_fk_estudiante"];
    $codigo_servicio = $_POST["codigo_servicio"];

    $stmt = $conexion->prepare("INSERT INTO movimientos (codigo_movimiento, fecha_movimiento, valor_movimiento, descripcion_movimiento, codigo_fk_estudiante, codigo_servicio) VALUES (:codigo_movimiento, :fecha_movimiento, :valor_movimiento, :descripcion_movimiento, :codigo_fk_estudiante, :codigo_servicio)");


    if ($stmt) {

        $result = $stmt->execute(array(':codigo_movimiento' => $codigo_movimiento, ':fecha_movimiento' => $fecha_movimiento, ':valor_movimiento' => $valor_movimiento, ':descripcion_movimiento' => $descripcion_movimiento, ':codigo_fk_estudiante' => $codigo_fk_estudiante, ':codigo_servicio' => $codigo_servicio));

        if ($result) {
            echo 'Pago registrado exitosamente';
        } else {
            echo 'Error: No se pudo registrar el pago';
        }
    } else {
        echo 'Error: No se pudo preparar la consulta';
    }
}
?>