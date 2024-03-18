<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONVENIOS</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <!-- Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/style.css">

  
</head>

<body>
  <?php include_once '../componentes/navbar.php' ?>
  <h1 class="text-center">CONVENIOS</h1>

  <br>
  <br>
  <div class="row">
      <div class="col-2 offset-10">
        <div class="text-center">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearConvenio"
            id="botonCrear">
            <i class="bi bi-plus-circle-fill"></i> Crear
          </button>
        </div>
      </div>
    </div>
    <br>
  <div class="table-responsive">
    <table id="datos_convenios" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>CODIGO</th>
          <th>CODIGO ESTUDIANTE</th>
          <th>CODIGO CARRERA</th>
          <th>DESCRIPCION</th>
          <th>VALOR TOTAL </th>
          <th>SALDO TOTAL</th>
          <th>ESTADO</th>
          <th>Edición</th>
          <th>+Infos</th>
        </tr>
      </thead>
    </table>
  </div>
  </div>
  
  <?php
  include("../componentes/pie.php");
  ?>

  <!-- Modal Crear Convenio -->
  <div class="modal fade" id="modalCrearConvenio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR CONVENIO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" id="formulario" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
             <div class="row w-100">
               <div class="col-md-6">
                <label for="codigo_carrera">Codigo carrera</label>
                <input type="text" name="codigo_carrera" id="codigo_carrera" class="form-control">
                <br>
             </div>
             <div class="col-md-6 text-end">
              <label for="codigo_estudiante">Codigo estudiante</label>
                <input type="text" name="codigo_estudiante" id="codigo_estudiante" class="form-control">
                <br>
              </div>
             </div>
            <div class="row w-100">
             <div class="col-md-6">
               <label for="descripcion_convenio">Descripcion</label>
              <input type="text" name="descripcion_convenio" id="descripcion_convenio" class="form-control">
              <br>
             </div>
             <div class="col-md-6 text-end">
             <label for="descripcion_convenio">Tipo de descuento</label>
              <input type="text" name="descripcion_convenio" id="descripcion_convenio" class="form-control">
              <br>
              </div>
            </div>
            <div class="row w-100">
             <div class="col-md-6">
               <label for="valor_total_convenio">Valor total</label>
              <input type="number" name="valor_total_convenio" id="valor_total_convenio" class="form-control">
              <br>
             </div>
             <div class="col-md-6 text-end">
             <label for="saldo_convenio">Cuotas adelantadas</label>
              <input type="number" name="saldo_convenio" id="saldo_convenio" class="form-control">
              <br>
             </div>
            </div>
            </div>

            
              <br>
              <!--<label for="codigo_carrera">carrera</label>
              <select name="codigo_carrera" id="codigo_carrera" class="form-control">
                <option value="">Seleccione una opciones</option>
                <?php //foreach ($carreras as $carrera):?>
              
                <option value="<?php // echo $carrera['codigo_carrera'];?>"><?php //echo $carrera['descripcion_carrera']; ?></option>
                //<?php //endforeach;?>
              </select>
              <br>
              <label for="codigo_estudiante">Estado</label>
              <select name="codigo_estudiante" id="codigo_estudiante" class="form-control">
                <option value="">Seleccione una opciones</option>
                <option value=""></option>
                <option value=""></option>
              </select>
              <br>-->
              
            <!--
              <label for="estado">Estado</label>
              <select name="estado" id="estado" class="form-control">
                <option value="">Seleccione una opciones</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
              <br> -->


              <!-- <div class="row">
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="estado" id="estado" checked disabled>
                  <label class="form-check-label" for="estado" value="Activo">
                    activo
                  </label>
                  </div>
                </div>
                <div class="col"> 
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="estado" id="estado" disabled>
                  <label class="form-check-label" for="estado" value="Inactivo">
                    inactivo
                  </label>
                </div>
              </div>
              </div>

              
                <div class="offset-md-4 col-md-8">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Inactivo/Activo</label>
                  </div>
                </div>-->
              



            

            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_convenio" id="id_convenio">
              <input type="hidden" method="POST" name="operacion" id="operacion">
              <input type="submit" name="action" id="action" class="btn btn-primary" value="crear">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalInfoEstudiante" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="nuevoModalLabel">Pagos</h5>
          <button type="button" class="btn btn-light btn-close" style="position: absolute; top: 0.5rem; right: 1.5rem; padding: 0.5rem 1rem; border: 0; background: 0; font-size: 1.5rem; cursor: pointer; outline: 0;" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row w-100">
            <div class="col-md-6">
              <h5>Código: <span id="codigo_estudiante"></span></h5>
            </div>
            <div class="col-md-6 text-end">
              <img src="" alt="Imagen del estudiante" id="imagen" class="img-fluid">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5>Nombre: <span id="nombre_estudiante"></span></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5>Apellidos: <span id="apellidos_estudiante"></span></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5>Fecha de nacimiento: <span id="fecha_nacimiento_estudiante"></span></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5>Carrera: <span id="carrera"></span></h5>
            </div>
          </div>
          <br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>P</th>
                <th>Código</th>
                <th>Fecha</th>
                <th>cuotas</th>
                <th>Seleccionar</th>
              </tr>
            </thead>
            <tbody id="tabla-pagos">
              <!-- Aquí se mostrarán los pagos -->
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-pagar" data-bs-toggle="modal" data-bs-target="#modalExcelConvenio">Pagar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Confirmar Pago Convenio -->
  <div class="modal fade" id="modalExcelConvenio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">CONFIRMA LA INFORMACION</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" id="formulario" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <h3>Se pagara lo siguiente: </h3>

              <div class="table-responsive">
                <table id="datos_confirmacion_pago" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>C</th>
                      <th>FECHA</th>
                      <th>VALOR</th>
                    </tr>
                  </thead>
                  <!-- Valores de prueba (cuota,fecha,valor) -->
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>01/01/24</td>
                      <td>120000</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>01/02/24</td>
                      <td>120000</td>
                    </tr>
                </table>
                <div class="col-5 offset-7">
                  <h6>TOTAL: </h6>
                  <div class="card">
                    <div class="card-body">
                      $ 240000
                    </div>
                  </div>
                </div>


              </div>
              <div class="modal-footer">
                <input type="submit" name="action" id="action" class="btn btn-success" value="Pagar">
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>


  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- DataTables JavaScript -->
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



  <script type="text/javascript">
    $(document).ready(function() {
      $("#botonCrear").click(function() {
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Convenio");
        $("#action").val("crear");
        $("#operacion").val("crear");
      });
      // Dentro del evento $(document).ready

// Llenar el select de estudiantes
/*$.ajax({
    url: "Convenios.controller.php",
    method: "POST",
    data: { operacion: 'obtener_registro_estudiante' },
    dataType: "json",
    success: function(data) {
        var options = '';
        data.estudiantes.forEach(function(estudiante) {
            options += '<option value="' + estudiante.codigo_estudiante + '">' + estudiante.nombre_estudiante+ '</option>';
        });
        $('#codigo_estudiante').html(options);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
});*/


      var dataTable = $('#datos_convenios').DataTable({
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-MX.json',
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          url: "Convenios.controller.php",
          type: "POST"
        },
        "columnDefs": [{
            "targets": "_all",
            "className": "text-center"
          },
          {
            "targets": 2, // Índice de la columna "valor total"
            "render": function(data, type, row) {
              // Formato de moneda con el símbolo "$" y puntuación de miles
              return '$' + parseFloat(data).toLocaleString('es-ES', {
                minimumFractionDigits: 2
              });
            }
          }, {
            "targets": [4, 5],
            "orderable": false,
          }
        ]

      });

      $(document).on('submit', '#formulario', function(event) {
        event.preventDefault();
        var codigo_convenio = $("#codigo_convenio").val();
        var descripcion_convenio = $("#descripcion_convenio").val();
        var valor_total_convenio = $("#valor_total_convenio");
        var saldo_convenio = $("#saldo_convenio").val();
        var codigo_carrera = $("#codigo_carrera");
        var codigo_estudiante = $("#codigo_estudiante").val();
        var estado = $("#estado").val();

        if (codigo_convenio != '' && descripcion_convenio != '' && valor_total_convenio != '' && codigo_estudiante != '') {

          $.ajax({
            url: "Convenios.controller.php",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
              alert(data);
              $('#formulario')[0].reset();
              $('#modalCrearConvenio').modal('hide');
              dataTable.ajax.reload();
            }


          });
        } else {
          alert("Algunos campos son obligatorios");
        }

      });

      $(document).on('click', '.editar', function() {
        //$("#botonEditar").click(function(){  
        var codigo_convenio = $(this).attr("id");
        $.ajax({

          url: "Convenios.controller.php",
          method: "POST",
          data: {
            codigo_convenio: codigo_convenio,
            operacion: 'obtener_registro'

          },
          dataType: "json",
          success: function(data) {

            $('#modalEditarConvenio').modal('show');
            $('#codigo_convenio').val(data.codigo_convenio);
            $('#descripcion_convenio').val(data.descripcion_convenio);
            $('#valor_total_convenio').val(data.valor_total_convenio);
            $('#saldo_convenio').val(data.saldo_convenio);
            $('#codigo_carrera').val(data.codigo_carrera);
            $('#codigo_estudiante').val(data.codigo_estudiante);
            $('#estado').val(data.estado);


            $('#modal-title').text('Editar estudiante');
            $('#id_convenio').val(codigo_convenio);
            $('#action').val('editar').removeClass('btn-primary').addClass('btn-warning');
            $('#operacion').val("editar");


          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }





        });








      });


      /* $(document).on('click', '.info', function(){
    var codigo_convenio = $(this).attr("id");
    $.ajax({
        url: "Convenios.controller.php",
        method: "POST",
        data: {
            codigo_convenio: codigo_convenio,
            operacion: 'obtener_registro_estudiante'
        },
        dataType: "json",
        success: function(data){
            $('#codigo_estudiante').text(data.codigo_convenio.codigo_estudiante);
            $('#nombre_estudiante').text(data.nombre_estudiante);
            $('#apellidos_estudiante').text(data.apellidos_estudiante);
            $('fecha_nacimiento_estudiante').text(data.fecha_nacimiento_estudiante);
            
            // Asegúrate de ajustar esto según la estructura de tu tabla de estudiantes
            // Continúa con el resto de la información del estudiante (cedula, fecha de nacimiento, carrera, etc.)

            // Luego, actualiza la tabla de movimientos
            var tablaMovimientos = $('#tabla-pagos');
            tablaMovimientos.empty(); // Limpiar la tabla antes de agregar nuevos datos

            $.each(data.movimientos, function(index, movimiento){
                var fila = '<tr>' +
                               '<td>' + movimiento.codigo + '</td>' +
                               '<td>' + movimiento.fecha + '</td>' +
                               '<td>' + movimiento.descripcion + '</td>' +
                               '<td>' + movimiento.valor + '</td>' +
                           '</tr>';
                tablaMovimientos.append(fila);
            });

            $('#modalInfoEstudiante').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});*/






    });
  </script>

</body>

</html>