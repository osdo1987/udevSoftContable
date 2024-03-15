<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONVENIOS</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
  <div class="table-responsive">
    <table id="datos_convenios" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>CODIGO</th>
          <th>DESCRIPCION</th>
          <th>VALOR TOTAL </th>
          <th>SALDO TOTAL</th>
          <th>CODIGO CARRERA</th>
          <th>CODIGO ESTUDIANTE</th>
          <th>ESTADO</th>
          <th>Edición</th>
          <th>+Infos</th>
        </tr>
      </thead>
    </table>
  </div>
  </div>
  <div class="text-center">
  
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearConvenio"
      id="botonCrear">
      Crear
    </button>
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarConvenio"
      id="botonEditar">
      Editar
    </button>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalExcelConveni"
      id="botonExcel">
      Excel
    </button>
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
              <label for="codigo_convenio">Codigo</label>
              <input type="text" name="codigo_convenio" id="codigo_convenio" class="form-control">
              <br>

              <label for="descripcion_convenio">descripcion_convenio</label>
              <input type="text" name="descripcion_convenio" id="descripcion_convenio" class="form-control">
              <br>

              <label for="valor_total_convenio">Valor total</label>
              <input type="number" name="valor_total_convenio" id="valor_total_convenio" class="form-control">
              <br>

              <label for="saldo_convenio">saldo total</label>
              <input type="number" name="saldo_convenio" id="saldo_convenio" class="form-control">
              <br>

              <label for="codigo_carrera">codigo carrera</label>
              <input type="text" name="codigo_carrera" id="codigo_carrera" class="form-control">
              <br>

              <label for="codigo_estudiante">codigo estudiante</label>
              <input type="text" name="codigo_estudiante" id="codigo_estudiante" class="form-control">
              <br>
              <br>
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                  <option value="2">Seleccione una opciones</option>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
                <br>


              
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
            <h5>Código: <span id="codigo"></span></h5>
          </div>
          <div class="col-md-6 text-end">
            <img src="" alt="Imagen del estudiante" id="imagen" class="img-fluid">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>Nombre: <span id="nombre"></span></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>Cédula: <span id="cedula"></span></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>Fecha de nacimiento: <span id="fecha_nacimiento"></span></h5>
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
              <th>Saldo</th>
              <th>Seleccionar</th>
            </tr>
          </thead>
          <tbody id="tabla-pagos">
            <!-- Aquí se mostrarán los pagos -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn-pagar" data-bs-toggle="modal" data-bs-target="#modalExcelConvenio" >Pagar</button>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- DataTables JavaScript -->
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>



  <script type="text/javascript">
    $(document).ready(function () {
      $("#botonCrear").click(function () {
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Convenio");
        $("#action").val("crear");
        $("#operacion").val("crear");
      });

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
          "targets": "_all", "className": "text-center"
        },
        {
          "targets": 2, // Índice de la columna "valor total"
          "render": function (data, type, row) {
            // Formato de moneda con el símbolo "$" y puntuación de miles
            return '$' + parseFloat(data).toLocaleString('es-ES', { minimumFractionDigits: 2 });
          }
        }, {
          "targets": [4, 5],
          "orderable": false,
        }]

      });

      $(document).on('submit', '#formulario', function(event)
      {event.preventDefault();
        var codigo_convenio =$("#codigo_convenio").val();
        var descripcion_convenio=$("#descripcion_convenio").val();
        var valor_total_convenio=$("#valor_total_convenio");
        var saldo_convenio=$("#saldo_convenio").val();
        var codigo_carrera=$("#codigo_carrera");
        var codigo_estudiante=$("#codigo_estudiante").val();
        var estado=$("#estado").val();

        if (codigo_convenio !='' &&  descripcion_convenio!= '' && valor_total_convenio != '' && codigo_estudiante !=''){

          $.ajax({
            url:"Convenios.controller.php",
            method:"POST",
            data: new FormData(this),
            processData:false,
            contentType:false,
            success:function(data){
              alert(data);
              $('#formulario')[0].reset();
              $('#modalCrearConvenio').modal('hide');
              dataTable.ajax.reload();
            }


          });
        }else{
          alert("Algunos campos son obligatorios");
        }
      
      });

      $(document).on('click', '.editar', function(){
      //$("#botonEditar").click(function(){  
        var codigo_convenio=$(this).attr("id");
        $.ajax({

          url:"Convenios.controller.php",
          method:"POST",
          data:{
            codigo_convenio:codigo_convenio,
            operacion:'obtener_registro'

          },
          dataType:"json",
          success:function(data){

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






    });
  </script>

</body>

</html>