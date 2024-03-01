<?php
include("../conexion.php");
include("funciones.php");
//[]  ''
if (isset($_POST["codigo_estudiante"])) {

    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM estudiantes WHERE codigo_estudiante = '" . $_POST["codigo_estudiante"] . "' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach ($resultado as $fila) {
        $salida["nombre_estudiante"] = $fila["nombre_estudiante"];
        $salida["apellidos_estudiante"] = $fila["apellidos_estudiante"];
        $salida["fecha_nacimiento_estudiante"] = $fila["fecha_nacimiento_estudiante"];
        /*if ($fila["imagen_estudiante"] != "") {
            $salida["imagen_estudiante"] = '<img src="img/' . $fila["imagen_estudiante"]
                . '"  class="img-thumbnail" width="50" height="35" /><input type="hiden" name="imagen_estudiante_oculta" value="' . $fila["imagen"] . '"/>';

        } else {
            $salida["imagen_estudiante"] = '<input type="hidden" name="imagen_estudiante_oculta" value=""/>';
        }*/
        $salida["estado"] = $fila["estado"];

    }

    echo json_encode($salida);
}