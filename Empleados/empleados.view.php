<?php

$descripcion_egreso = @$_GET ['descripcion_egreso'];
$tipo_egreso = @$_GET['tipo_egreso'];
$facturado_a = @$_GET['facturado_a'];
$codigo_usuario =@$_GET['codigo_fk_usuario'];
$valor_egreso = @$_GET['valor_egreso'];
$fecha_egreso =@$_GET['fecha_egreso'];

?>

<!DOCTYPE html>
<html>

<head>
    <title> udev </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .custom-margin {
            margin: 10px;
            /* ajuste de margen */
        }

        body {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <?php include_once '../componentes/navbar.php'; ?>

    <body>



        <body>
            



            <div class="container">
            <h1> Empleados </h1>
            <br>

                <div class="row mb-3 custom-margin">
                    <label for="codigoEmpleado" class="col-sm-1 col-form-label">Codigo del empleado</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="codigo_empleado" placeholder="Escriba codigo del empleado de su carnet">
                    </div>
                </div>
            </div>


            <form action="empleados.controller.php" method="get" div class="container">
                <div class="row mb-3 custom-margin">
                    <label for="nombreEmpleado" class="col-sm-1 col-form-label">Nombre del empleado</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nombre_empleado" name="nombres_empleado" placeholder="Escriba los nombres">
                    </div>
                </div>

                <div class="row mb-3 custom-margin">
                    <label for="apellidosEmpleado" class="col-sm-1 col-form-label">Apellido del empleado</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="apellidos_empleado" name="apellidos_empleado" placeholder="Escriba los appellidos ">
                    </div>
                </div>

                <div class="row mb-3 custom-margin">
                    <label for="cargoEmpleado" class="col-sm-1 col-form-label">Cargo</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="cargo_empleado" name="cargo_empleado" placeholder="cargo que ocupada la persona">
                    </div>
                </div>

                <div class="row mb-3 custom-margin">
                    <label for="DocumentoEmpleado" class="col-sm-1 col-form-label">Tipo de documento</label>
                    <div class="col-sm-5">
                        <select class="form-select" id="tipo_documento" name="tipo_documento" aria-label="Default select example">
                            <option selected>Escoja el tipo</option>
                            <option value="tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="cedula de ciudadania">Cedula de ciudadania</option>
                            <option value="pasaporte">Pasaporte</option>
                            <option value="cedula extranjera">Cedula extranjera</option>

                        </select>
                    </div>

                    <div class="row mb-3 custom-margin">
                        <label for="numeroDocuemtno" class="col-sm-1 col-form-label">Numero del documento</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="documento_empleado" name="documento_empleado" placeholder="Escriba el numero de identificacion">
                        </div>
                    </div>

                    <div class="row mb-3 custom-margin">
                        <label for="EstadoEmpleado" class="col-sm-1 col-form-label">Estado</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="estado_empleado" name="estado_empleado" aria-label="Default select example">
                                <option selected>Escoja estado del empleado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Desactivado</option>

                            </select>
                        </div>
                    </div>



                </div>

                <button type="submit" class="btn btn-info">Ingresar</button>



                </div>




        </body>

        <body>

            <?php include_once '../componentes/pie.php'; ?>
        </body>

        <!-- Aquí va el contenido de tu página -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

</html>