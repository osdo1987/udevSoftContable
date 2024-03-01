<?php



?>

<!DOCTYPE html>
<html>
<head>
    <title> udev </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .custom-margin {
            margin: 10px; /* ajuste de margen */
        }

        body {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
<?php include_once '../componentes/navbar.php';?>

    <body>  



        <body>
            <h1> Formulario empleados </h1>
      
          
              <div class="row mb-3 custom-margin">
                  <label for="codigoEmpleado" class="col-sm-1 col-form-label">Codigo del empleado</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="codigo_empleado" placeholder="Escriba codigo del empleado de su carnet">
                  </div>
              </div>
          
              <div class="row mb-3 custom-margin">
                  <label for="nombreEmpleado" class="col-sm-1 col-form-label">Nombre del empleado</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="nombre_empleado" placeholder="Escriba los nombres">
                  </div>
              </div>
          
              <div class="row mb-3 custom-margin">
                  <label for="apellidosEmpleado" class="col-sm-1 col-form-label">Apellido del empleado</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="apellidos_empleado" placeholder="Escriba los appellidos ">
                  </div>
              </div>
      
              <div class="row mb-3 custom-margin">
                <label for="cargoEmpleado" class="col-sm-1 col-form-label">Cargo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="cargo_empleado" placeholder="cargo que ocupada la persona">
                </div>
            </div>

            <div class="row mb-3 custom-margin">
                <label for="DocumentoEmpleado" class="col-sm-1 col-form-label">Tipo de documento</label>
                <div class="col-sm-5">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Escoja el tipo</option>
                    <option value="true">Tarjeta de identidad</option>
                    <option value="true">Cedula de ciudadania</option>
                    <option value="true">Pasaporte</option>
                    <option value="true">Cedula extranjera</option>
                    
                  </select>
                </div>
      
            <div class="row mb-3 custom-margin">
              <label for="numeroDocuemtno" class="col-sm-1 col-form-label">Numero del documento</label>
              <div class="col-sm-5">
                  <input type="text" class="form-control" id="documento_empleado" placeholder="Escriba el numero de identificacion">
              </div>
            </div>

            <div class="row mb-3 custom-margin">
                <label for="EstadoEmpleado" class="col-sm-1 col-form-label">Estado</label>
                <div class="col-sm-5">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Escoja estado del empleado</option>
                    <option value="true">Activo</option>
                    <option value="false">Desactivado</option>
                    
                  </select>
                </div>
            </div>
      
      
          
          </div>
      
          
    
          
        </body>
        <body>

        <?php include_once '../componentes/pie.php';?>
        </body>

    <!-- Aquí va el contenido de tu página -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>