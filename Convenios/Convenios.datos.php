<?php 
include("../conexion.php");

// Consulta de la información del estudiante y mostrar en los inputs, listas y variables
if ($conexion) {
    try {
        $codigoEstudiante = 26; // Código de estudiante fijo para la consulta
        $query = "
            SELECT 
                estudiantes.codigo_estudiante, 
                estudiantes.nombre_estudiante, 
                estudiantes.apellidos_estudiante, 
                estudiantes.fecha_nacimiento_estudiante, 
                estudiantes.imagen, 
                servicios.codigo_servicio, 
                servicios.descripcion_servicio
            FROM convenio
            INNER JOIN estudiantes ON convenio.codigo_estudiante = estudiantes.codigo_estudiante
            INNER JOIN servicios ON convenio.codigo_servicio = servicios.codigo_servicio
            WHERE convenio.codigo_estudiante = :codigoEstudiante
        ";

        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':codigoEstudiante', $codigoEstudiante, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $codigoEstudi = htmlspecialchars($row['codigo_estudiante']);
            $nombreEst = htmlspecialchars($row['nombre_estudiante']);
            $apellidosEst = htmlspecialchars($row['apellidos_estudiante']);
            $fechaNaciEst = htmlspecialchars($row['fecha_nacimiento_estudiante']);
            $carreraEst = htmlspecialchars($row['descripcion_servicio']);
            $imagenEst = htmlspecialchars($row['imagen']);

            
        }
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Error de conexión a la base de datos.";
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $codigoEstudi = htmlspecialchars($row['codigo_estudiante']);
    $nombreEst = htmlspecialchars($row['nombre_estudiante']);
    $apellidosEst = htmlspecialchars($row['apellidos_estudiante']);
    $fechaNaciEst = htmlspecialchars($row['fecha_nacimiento_estudiante']);
    $carreraEst = htmlspecialchars($row['descripcion_servicio']);
    $imagenEst = htmlspecialchars($row['imagen']);

    // Pasar las variables necesarias al archivo de vista
    include('Convenios.view.php');
}

// Función para obtener un registro específico del convenio
function obtener_registro($conexion) {
    $salida = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo_convenio'])) {
        try {
            $stmt = $conexion->prepare("SELECT * FROM convenio WHERE codigo_convenio = :codigo_convenio LIMIT 1");
            $stmt->bindParam(':codigo_convenio', $_POST['codigo_convenio'], PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                $salida = $resultado;
            } else {
                $salida["error"] = "No se encontraron resultados";
            }
        } catch (PDOException $e) {
            $salida["error"] = "Error en la ejecución de la consulta: " . htmlspecialchars($e->getMessage());
        }
    } else {
        $salida["error"] = "Solicitud inválida o código de convenio no proporcionado";
    }

    echo json_encode($salida);
}
?>
