<?php

include("../conexion.php");

@$action = $_POST["operacion"];
main($action, $conexion);

function main($action, $conexion)
{
    switch ($action) {
        case 'crear':
            crear($conexion);
            break;
        case 'editar':
            editar($conexion);
            break;
        case 'borrar':
            borrar($conexion);
            break;
        case 'obtener_registro':
            obtener_registro($conexion);
            break;
        default:
        obtener_registros($conexion);
            break;
    }
}

function crear ($conexion)

{

$stmt = $conexion->prepare("INSERT INTO convenios(codigo_convenio, descripcion_convenio, valor_total_convenio, saldo_convenio, codigo_carrera, codigo_institucion, codigo_tipo_convenio, codigo_estudiante, estado)VALUES(:codigo_convenio, :nombre_convenio, :valor_total_convenio, :saldo_convenio, :codigo_carrera, :codigo_institucion, :codigo_tipo_convenio, :codigo_estudiante, :estado )");

$resultado = $stmt->execute(

    array(
        'codigo_convenio' => $_POST["codigo_convenio"],
        'descripcion_convenio' => $_POST["nombre_convenio"],
        'valor_total_convenio' => $_POST["valor_total_convenio"],
        'saldo_convenio' => $_POST["saldo_convenio"],
        'codigo_carrera' => $_POST["codigo_carrera"],
        'codigo_institucion' => $_POST["codigo_institucion"],
        'codigo_tipo_convenio' => $_POST["codigo_tipo_convenio"],
        'codigo_estudiante' => $_POST["codigo_estudiante"],
        'estado' => $_POST["estado"]
        )
    );
    if(!empty($resultado)) {
        echo 'Registro creado';
    } else {
        echo 'Registro no creado';
    }

}

function editar($conexion){
    $stmt = $conexion->("UPDATE convenios SET descripcion_convenio=:nombre_convenio, valor_total_convenio=:valor_total_convenio, saldo_convenio=:saldo_convenio, codigo_carrera=:codigo_carrera, 
    codigo_institucion=:codigo_institucion, codigo_tipo_convenio=:codigo_tipo_convenio, codigo_estudiante=:codigo_estudiante, estado=:estado WHERE codigo_convenio=:codigo_convenio");







}







?>