<?php


$nombre_empleado = @$_GET['nombres_empleado'];


$apellidos_empleados = @$_GET['apellidos_empleado'];
echo "el nombre del empleado es: " . $nombre_empleado . $apellidos_empleados;
echo "<br>";

$cargo_empleado = @$_GET['cargo_empleado'];
echo "el cargo del empleado es:" . $cargo_empleado;
echo "<br>";

$tipo_documento =@$_GET['tipo_documento'];


$documento_empleado = @$_GET['documento_empleado'];
echo "el documento es " . $tipo_documento . " y su numero es". $documento_empleado  ;
echo "<br>";

$estado_empleado =@$_GET['estado_empleado'];
echo $estado_empleado;
    

?>


