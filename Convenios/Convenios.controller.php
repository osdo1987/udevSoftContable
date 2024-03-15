
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



function crear($conexion){

    $stmt = $conexion->prepare("INSERT INTO convenio(codigo_convenio, descripcion_convenio, valor_total_convenio, saldo_convenio, codigo_carrera, codigo_estudiante, estado) VALUES(:codigo_convenio, :descripcion_convenio, :valor_total_convenio, :saldo_convenio, :codigo_carrera, :codigo_estudiante, :estado)");

    $resultado = $stmt->execute(
        array(
            'codigo_convenio' => $_POST["codigo_convenio"],
            ':descripcion_convenio' => $_POST["descripcion_convenio"],
            ':valor_total_convenio' => $_POST["valor_total_convenio"],
            ':saldo_convenio' => $_POST["saldo_convenio"],
            ':codigo_carrera' => $_POST["codigo_carrera"],
            ':codigo_estudiante' => $_POST["codigo_estudiante"],
            ':estado' => $_POST["estado"]
        )
    );

    if (!empty($resultado)) {
        echo 'Convenio creado';
    } else {
        echo 'Convenio no creado';
    }


}

function editar($conexion){

$stmt = $conexion->prepare("UPDATE convenio SET descripcion_convenio=:descripcion_convenio, valor_total_convenio=:valor_total_convenio, saldo_convenio=:saldo_convenio, 
 codigo_carrera=:codigo_carrera, codigo_estudiante=:codigo_estudiante, estado=:estado WHERE codigo_convenio=:codigo_convenio");

$resultado = $stmt->execute(

    array(

        
            ':descripcion_convenio' => $_POST["descripcion_convenio"],
            ':valor_total_convenio' => $_POST["valor_total_convenio"],
            ':saldo_convenio' => $_POST["saldo_convenio"],
            ':codigo_carrera' => $_POST["codigo_carrera"],
            ':codigo_estudiante' => $_POST["codigo_estudiante"],
            ':estado' => $_POST["estado"],
            'codigo_convenio' => $_POST["codigo_convenio"]



    )


    );if (!empty($resultado)) {
    echo 'Convenio actulizado';
} else {
    echo "No se pudo actulizar el convenio";
};

}




function obtener_registros($conexion)
{
    $query = "";
    $salida = array();
    $query = "SELECT * FROM convenio";

    if (isset($_POST["search"]["value"])) {
        $query .= ' WHERE descripcion_convenio LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= ' ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST["order"][0]['dir'] . ' ';
    } else {
        $query .= ' ORDER BY codigo_convenio DESC ';
    }

    if (isset($_POST['length']) && isset($_POST['start'])) {
        $query .= 'LIMIT ' . ($_POST["start"]) . ',' . $_POST["length"];
    }

    $stmt = $conexion->prepare($query);

    try {

        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $datos = array();
        $filtered_rows = $stmt->rowCount();

        $draw = isset($_POST['draw']) ? intval($_POST['draw']) : 0;
        foreach ($resultado as $fila) {
            $sub_array = array();
            $sub_array[] = $fila["codigo_convenio"];
            $sub_array[] = $fila["descripcion_convenio"];
            $sub_array[] = $fila["valor_total_convenio"];
            $sub_array[] = $fila["saldo_convenio"];
            $sub_array[] = $fila["codigo_carrera"];
            $sub_array[] = $fila["codigo_estudiante"];
            $sub_array[] = $fila["estado"];

           $sub_array[] = '<button type="button" data-bs-toggle="modal" data-bs-target="#modalCrearConvenio" name="MasInfo" id="' . $fila["codigo_convenio"] . '" class="btn btn-warning bi bi-pencil-square editar"></button>';

            $datos[] = $sub_array;
        }

        $salida = array(
            "draw" => $draw,
            "recordsTotal" => $filtered_rows,
            "recordsFiltered" => obtener_todos_registros(),
            "data" => $datos
        );

        echo json_encode($salida);
    } catch (Exception $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}

function obtener_registro($conexion)
{

    $salida = array();

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
        $salida["error"] = "Error en la ejecución de la consulta: " . $e->getMessage();
    }
    echo json_encode($salida);
}

function obtener_todos_registros()
{
    include('../conexion.php');
    $stmt = $conexion->prepare('SELECT * FROM convenio');
    $stmt->execute();
    $resultado = $stmt->fetch();
    return $stmt->rowCount();
}