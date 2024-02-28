<?php 

include("conexion.php");
include("funciones.php")



//esta es la variable que a tomar el ajax para identificar el metodo

$action = $_POST ["operacion"];

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

    default:
    break;
}

}

//CREACION FUNCION CREAR : debe tener el agumento de conexion ya que debe hacerlo en la 
//base de datos

function crear($conexion){
    
        $stmt = $conexion->prepare("INSERT INTO carreras(descripcion_carrera, valor_total, estado) VALUES(:descripcion_carrera, :valor_total, :estado)");
               
        $resultado = $stmt->execute(
            array(
                ':descripcion_carrera' => $_POST["descripcion_carrera"],
                ':valor_total' => $_POST["valor_total_carrera"],
                ':estado' => $_POST["estado"]
            )
        );
    
        if(!empty($resultado) ){
            echo 'Registro creado';
        } 
    

//CREACION FUNCION EDITAR : esto anidado en la funcion crear inicial
        function editar($conexion){
            $stmt = $conexion->prepare("UPDATE carreras SET descrpcion_carrera=:descripcion_carrera, valor_total=:valor_total,
             estado=:estado WHERE codigo_carrera = :codigo_carrera");
        $resultado = $stmt->execute(
            array(

                ':descripcion_carrera'  => $_POST["descripcion_carrera"],
                ':valor_total'  => $_POST["valor_total"],
                ':estado'  => $_POST["estado"],
                ':codigo_carrera'  => $_POST["codigo_carrera"]
            )
        );
        if (!empty($resultado)) {
            echo 'Registro actulizado';
            
        }
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
}







?> 