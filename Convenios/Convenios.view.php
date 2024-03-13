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
          <th>+</th>
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
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalExcelConvenio"
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

              <label for="nombre_convenio">Nombre</label>
              <input type="text" name="nombre_convenio" id="nombre_convenio" class="form-control">
              <br>

              <label for="tipo_convenio">Tipo %</label>
              <input type="text" name="tipo_convenio" id="tipo_convenio" class="form-control">
              <br>

              <label for="convenio_convenio">Convenio</label>
              <input type="text" name="convenio_convenio" id="convenio_convenio" class="form-control">
              <br>

              <label for="valor_total_convenio">Valor total</label>
              <input type="number" name="valor_total_convenio" id="valor_total_convenio" class="form-control">
              <br>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="estado_convenio" id="estado_convenio">
              <input type="submit" name="action" id="action" class="btn btn-primary" value="Crear">
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
        $("#action").val("Crear");
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
    });
  </script>

</body>

</html>