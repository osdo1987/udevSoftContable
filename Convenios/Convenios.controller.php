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
?>