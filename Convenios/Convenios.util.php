<?php include("../conexion.php");


//obtencion de la tabla movimientos para mostrar sin DATATABLES por medio de listas y variables

if($conexion){
    try{
    $consulta = "SELECT movimientos.codigo_movimiento, movimientos.fecha_movimiento, movimientos.descripcion_movimiento, movimientos.valor_movimiento, convenio.codigo_estudiante
    FROM movimientos
    LEFT JOIN convenio
    ON movimientos.codigo_fk_estudiante = convenio.codigo_estudiante
    WHERE movimientos.codigo_fk_estudiante = 10 ";
    $resultado = $conexion->query($consulta);
    

        while($row = $resultado->fetch(PDO::FETCH_ASSOC))   {
            $codigo = $row['codigo_movimiento'];
            $fecha = $row['fecha_movimiento'];
            $descripcion = $row['descripcion_movimiento'];
            $cuotas = $row['valor_movimiento'];

            echo "<tr>";
            echo "<td>$codigo</td>";
            echo "<td>$fecha</td>";
            echo "<td>$descripcion</td>";
            echo "<td>$cuotas</td>";
            echo '<td class="text-center"><input type="checkbox" class="form-check-input"></td>';
            echo "</tr>";

        }
    }catch(PDOException $e){
        echo "error al ejecutar " . $e->getMessage();
    }

   
}


/*if ($conexion) {
    try {
        $consulta = "SELECT movimientos.codigo_movimiento, movimientos.fecha_movimiento, movimientos.valor_movimiento
                     FROM movimientos
                     WHERE movimientos.codigo_fk_estudiante = :codigo_estudiante";
                     
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':codigo_estudiante', $_POST['codigo_convenio'], PDO::PARAM_INT);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $codigo = $row['codigo_movimiento'];
            $fecha = $row['fecha_movimiento'];
            $cuotas = $row['valor_movimiento'];

            echo "<tr>";
            echo "<td>$codigo</td>";
            echo "<td>$fecha</td>";
            echo "<td>$cuotas</td>";
            echo '<td class="text-center"><input type="checkbox" class="form-check-input"></td>';
            echo "</tr>";
        }
    } catch(PDOException $e) {
        echo "Error al ejecutar: " . $e->getMessage();
    }
}*/
/*if ($conexion) {
    try {
        $codigo_convenio = $_POST['codigo_convenio'];

        // Consulta SQL para obtener los datos de los pagos del estudiante
        $consulta = "SELECT movimientos.codigo_movimiento, movimientos.fecha_movimiento, movimientos.valor_movimiento
                     FROM movimientos
                     WHERE movimientos.codigo_fk_estudiante = :codigo_estudiante";
                     
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':codigo_estudiante', $codigo_convenio, PDO::PARAM_INT);
        $stmt->execute();

        // Generar el HTML de la tabla con los datos de los pagos del estudiante
        $html = "";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $codigo = $row['codigo_movimiento'];
            $fecha = $row['fecha_movimiento'];
            $cuotas = $row['valor_movimiento'];

            $html .= "<tr>";
            $html .= "<td>$codigo</td>";
            $html .= "<td>$fecha</td>";
            $html .= "<td>$cuotas</td>";
            $html .= '<td class="text-center"><input type="checkbox" class="form-check-input"></td>';
            $html .= "</tr>";
        }

        echo $html;
    } catch(PDOException $e) {
        echo "Error al ejecutar: " . $e->getMessage();
    }
}*/