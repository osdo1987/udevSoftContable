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
    <!-- barra del navegador -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Empleados.html">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Egresos.html">Egresos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <body>  



        <body>
      
          
              <div class="row mb-3 custom-margin">
                  <label for="codigoEgreso" class="col-sm-1 col-form-label">Codigo del egreso</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="codigo_egreso" placeholder="Escriba el codigo">
                  </div>
              </div>

              <div class="row mb-3 custom-margin">
                <label for="tipoEgreso" class="col-sm-1 col-form-label">Tipo de egreso</label>
                <div class="col-sm-5">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Escoja el tipo</option>
                    <option value="true">Pago nomina</option>
                    <option value="true">Servicios</option>
                    <option value="true">Pago asociados</option>
                    <option value="true">Otros</option>
                    
                  </select>
                </div>
          
                <div class="row mb-3 custom-margin">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripcion del egreso</label>
                    <div class="col-sm-6">
                    <textarea class="form-control" id="descripcion_egreso" rows="3"></textarea>
                </div>
                  </div>
          
              <div class="row mb-3 custom-margin">
                  <label for="facturadoA" class="col-sm-1 col-form-label">Facturado a:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="facturado_a" placeholder="Escriba nombre de la persona o empresa">
                  </div>
              </div>

              <div class="row mb-3 custom-margin">
                <label for="codigofkUsuario" class="col-sm-1 col-form-label">Codigo del usuario</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="codigo_fk_usuario" placeholder="Escriba el codigo">
                </div>
            </div>

            <div class="row mb-3 custom-margin">
                <label for="valorEgreso" class="col-sm-1 col-form-label">Valor del egreso</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="valor_egreso" placeholder="valor numerico">
                </div>
            </div>

            <div class="row mb-3 custom-margin">
                <label for="FechaEgreso" class="col-sm-1 col-form-label">Fecha del egreso</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="fecha_egreso" placeholder="Fecha">
                </div>
            </div>
      
             

           
            </div>
      
      
          
          </div>
      
          
    
          
        </body>

    <!-- Aquí va el contenido de tu página -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>