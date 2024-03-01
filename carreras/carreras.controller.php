<?php 

include("../conexion.php");
//include("funciones.php") tampoco creo que vaya esto 

//echo var_dump($_POST);

//esta es la variable que a tomar el ajax para identificar el metodo

//$action = isset($_POST["action"]) ? $_POST["action"] : null;

//if ($action === null) {
  //  echo "No se ha proporcionado la operación.";
    //exit; // Otra opción: manejar el error de alguna otra manera
//}

$action = $_POST["operacion"];
// Resto del código aquí...



//lLLAMADO FUNCION MAIN con los dos argumentos necesarios para funcionar
main($action, $conexion);

//CREACION FUNCION MAIN
function main($action, $conexion){
// el methodo switch toma varias funciones en cada case(caso) para que por medio del argumentoy/o varible
//$action defina cual va  a hacer uso la main

switch($action){
    case'crear': //en caso de que action sea crear se ejectura la funcion crear; si no en caso de editar y borrar lo mismo
        crear ($conexion);
        break;
    case 'editar':
        editar($conexion);
        break;
    case 'borrar':
        borrar($conexion);
        break;
    //case'obtener_todos_registros': //en caso de que action sea crear se ejectura la funcion crear; si no en caso de editar y borrar lo mismo
     //   obtener_todos_registros ($conexion);
     //   break;


    default:
    break;
}


}

//CREACION FUNCION CREAR : debe tener el agumento de conexion ya que debe hacerlo en la 
//base de datos

function crear($conexion){
    
        $stmt = $conexion->prepare("INSERT INTO carreras(descripcion_carrera, valor_total_carrera, estado) VALUES(:descripcion_carrera, :valor_total_carrera, :estado)");
               
        $resultado = $stmt->execute(
            array(
                ':descripcion_carrera' => $_POST["descripcion_carrera"],
                ':valor_total_carrera' => $_POST["valor_total_carrera"],
                ':estado' => $_POST["estado"]
            )
        );
    
        if(!empty($resultado) ){
            echo 'Registro creado';
            
        } else{
            echo 'Registro no creado';
        }


    
}
//CREACION FUNCION EDITAR : esto anidado en la funcion crear inicial
function editar($conexion){
    $stmt = $conexion->prepare("UPDATE carreras SET descripcion_carrera=:descripcion_carrera, valor_total=:valor_total,
     estado=:estado WHERE codigo_carrera = :codigo_carrera");
$resultado = $stmt->execute(
    array(

        ':descripcion_carrera'  => $_POST["descripcion_carrera"],
        ':valor_total_carrera'  => $_POST["valor_total"],
        ':estado'  => $_POST["estado"],
        ':codigo_carrera'  => $_POST["codigo_carrera"]
    )
);
if (!empty($resultado)) {
    echo 'Registro actulizado'; 
}else{
    echo "No se pudo actulizar el registro";
};
}

//CREACION FUNCION BORRAR : anidado en la de crear 
function borrar($conexion){

    $stmt = $conexion->prepare("DELETE FROM carreras WHERE codigo_carrera = :codigo_carrera");

    $resultado = $stmt->execute(
        array(
            ':codigo_carrera'  => $_POST["codigo_carrera"]
        )
    );
    if (!empty($resultado)) {
        echo 'Registro borrado';
    }



    }



function obtener_registros($conexion){

    global $conexion;


    $stmt = $conexion->prepare("SELECT * FROM carreras");
    $stmt ->execute();
    $resultado = $stmt->fetchAll();
    return $stmt ->rowCount();

$query = "";
$salida = array();
$query = "SELECT * FROM carreras ";

if(isset($_POST["search"]["value"])){
    $query .= 'WHERE descripcion_carrera LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if(isset($_POST["order"])){
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST["order"][0]['dir'] . ' ';
} else {
    $query .= 'ORDER BY codigo_carrera DESC ';
}

if($_POST['length'] != -1){
    $query .= 'LIMIT ' . ($_POST["start"]) . ',' . $_POST["length"];
}

$stmt = $conexion->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchAll();
$datos = array();
$filtered_rows = $stmt->rowCount();

foreach($resultado as $fila){
    $sub_array = array();
    $sub_array[] = $fila["codigo_carrera"];
    $sub_array[] = $fila["descripcion_carrera"];
    $sub_array[] = $fila["valor_total"];
    $sub_array[] = $fila["estado"];
    $sub_array[] = '<button type="button" data-bs-toggle="modal" data-bs-target="#modalUsuario" name="editar" id="'.$fila["codigo_carrera"].'" class="btn btn warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id="'.$fila["codigo_carrera"].'" class="btn btn danger btn-xs borrar">Borrar</button>';

    $datos[] = $sub_array;
}

$salida = array (
    "draw"            => intval($_POST["draw"]),
    "recordsTotal"    => $filtered_rows,
    "recordsFiltered" => obtener_todos_registros(),
    "data"            => $datos
);

echo json_encode($salida);

} 



function obtener_registro($conexion, $descripcion_carrera){

   /* $salida = array();

    try {
        $stmt = $conexion->prepare("SELECT * FROM carreras WHERE codigo_carrera = :codigo_carrera LIMIT 1");
        $stmt->bindParam(':codigo_carrera', $_POST['codigo_carrera'], PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $salida = $resultado;
        } else {
            $salida["error"] = "No se encontraron resultados";
        }
    } catch (PDOException $e) {
        $salida["error"] = "Error en la ejecución de la consulta: " . $e->getMessage();
    } **/
    if (isset($_POST["codigo_carrera"])) {

        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM carreras WHERE codigo_carrera = '" . $_POST["codigo_carrera"] . "' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach ($resultado as $fila) {
            $salida["descripcion_carrera"] = $fila["descripcion_carrera"];
            $salida["valor_total_carrera"] = $fila["valor_total_carrera"];
            $salida["estado"] = $fila["estado"];
           
            ;}

    echo json_encode($salida);
}
}


function obtener_todos_registros()
{
    include("../conexion.php");
    $stmt = $conexion->prepare("SELECT * FROM carreras");
    $stmt->execute();
    $resutlado = $stmt->fetchAll();
    return $stmt->rowCount();
}







?> 