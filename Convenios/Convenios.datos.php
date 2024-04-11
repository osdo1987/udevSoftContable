<?php 
include("../conexion.php");


if ($conexion) {
    try {

        /*$query = "SELECT estudiantes.codigo_estudiante, estudiantes.nombre_estudiante, estudiantes.apellidos_estudiante, estudiantes.fecha_nacimiento_estudiante 
        FROM estudiantes 
        INNER JOIN convenio ON estudiantes.codigo_estudiante = convenio.codigo_estudiante 
        WHERE convenio.codigo_convenio = 10 ";*/
        $query = "SELECT estudiantes.codigo_estudiante, estudiantes.nombre_estudiante, estudiantes.apellidos_estudiante, estudiantes.fecha_nacimiento_estudiante, servicios.codigo_servicio, servicios.descripcion_servicio
        FROM convenio 
        INNER JOIN estudiantes 
        ON convenio.codigo_estudiante = estudiantes.codigo_estudiante 
        INNER JOIN servicios
        ON convenio.codigo_servicio = servicios.codigo_servicio 
        WHERE convenio.codigo_estudiante = 10";


        /*$stmt = $conexion->prepare($query);
$stmt ->bindParam(':codigo_convenio', $_POST['codigo_convenio'], PDO::PARAM_INT);

try{
    $stmt->execute();
    $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(Exception $e){
    echo "Error en la consulta: " . $e->getMessage();

}*/

        //$resultadoQuery=mysqli_query($conexion, $query);
        /*$resultadoQuery = $conexion->query($query);

if(mysqli_num_rows($resultadoQuery)>0){

    while($fila = mysqli_fetch_assoc($resultadoQuery)){

        $codigo_estudi = $fila['codigo_estudiante'];
        $nombre_est = $fila['nombre_estudiante'];
        $apellidos_est = $fila['apellidos_estudiante'];
        $fecha_naci_est = $fila['fecha_nacimiento_estudiante'];
        echo "codigo " . $fila['codig_estudiante'] . "nombre" $fila ['nombre_est'];

        echo "<tr>";
        echo "<td>$codigo</td>";
        echo "<td>$fecha</td>";
        echo "<td>$cuotas</td>";
        echo "<td><!-- Aquí puedes colocar el botón o enlace de selección --></td>";
        echo "</tr>";

    }
}
mysqli_close($conexion);*/


        $resultadoDato = $conexion->query($query);


        while ($row = $resultadoDato->fetch(PDO::FETCH_ASSOC)) {
            $codigo_estudi = $row['codigo_estudiante'];
            $nombre_est = $row['nombre_estudiante'];
            $apellidos_est = $row['apellidos_estudiante'];
            $fecha_naci_est = $row['fecha_nacimiento_estudiante'];
            $carrera_est= $row['descripcion_servicio'];
           
        }
    } catch (PDOException $e) {
        echo "error al ejecutar " . $e->getMessage();
    }
}
