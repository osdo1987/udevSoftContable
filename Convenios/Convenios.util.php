<?php 
include("../conexion.php");

// obtención de la tabla movimientos para mostrar sin DATATABLES por medio de listas y variables
if ($conexion) {
    try {
        $codigoEstudiante = 26; // Código de estudiante fijo para la consulta
        $consulta = "
            SELECT 
                movimientos.codigo_movimiento, 
                movimientos.fecha_movimiento, 
                movimientos.descripcion_movimiento, 
                movimientos.valor_movimiento, 
                convenio.codigo_estudiante
            FROM movimientos
            LEFT JOIN convenio ON movimientos.codigo_fk_estudiante = convenio.codigo_estudiante
            WHERE movimientos.codigo_fk_estudiante = :codigoEstudiante
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':codigoEstudiante', $codigoEstudiante, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $codigo = htmlspecialchars($row['codigo_movimiento']);
            $fecha = htmlspecialchars($row['fecha_movimiento']);
            $descripcion = htmlspecialchars($row['descripcion_movimiento']);
            $cuotas = htmlspecialchars($row['valor_movimiento']);

            echo "<tr>";
            echo "<td>$codigo</td>";
            echo "<td>$fecha</td>";
            echo "<td>$descripcion</td>";
            echo "<td>$cuotas</td>";
            echo '<td class="text-center"><input type="checkbox" class="form-check-input"></td>';
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Error de conexión a la base de datos.";
}
?>
