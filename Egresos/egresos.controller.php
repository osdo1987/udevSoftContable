<?php
$tipo_egreso = @$_GET['tipo_egreso'];
echo " el tipo de egreso es " . $tipo_egreso;
echo "<br>";
$descripcion_egreso = @$_GET ['descripcion_egreso'];
echo "<br>";
echo $descripcion_egreso;
$facturado_a = @$_GET['facturado_a'];
echo "<br>";
echo "se le factura a " .$facturado_a;
$codigo_usuario =@$_GET['codigo_fk_usuario'];
echo "<br>";
echo $codigo_usuario;
$valor_egreso = @$_GET['valor_egreso'];
echo "<br>";
echo "valor del egreso " . $valor_egreso;
$fecha_egreso =@$_GET['fecha_egreso'];
echo "<br>";
echo $fecha_egreso

?>