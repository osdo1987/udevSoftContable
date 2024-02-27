<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDEV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container fondo">
    <h1 class="text-center">CARRERAS</h1>
    <div class="row">
      <div class="col-2 offset-10">
        <div class="text-center">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCarrera" id="botonCrear">
            <i class="bi bi-plus-circle-fill"></i> Crear
          </button>
        </div>
      </div>
    </div>
    <br>
    <div class="tabla-responsive">
      <table id="carreras" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Descripcion Carrera</th>
            <th>Valor Total</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="modal fade" id="modalCarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Carrera</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" id="formulario" enctype="multipart/form-data">
              <div class="modal-content">
                <label for="descripcion_carrera">Ingrese la descripción</label>
                <input type="text" name="descripcion_carrera" id="descripcion_carrera" class="form-control">
                <br>
                <label for="valor_total_carrera">Ingrese el valor total</label>
                <input type="number" name="valor_total_carrera" id="valor_total_carrera" class="form-control">
                <br>
  
                <label for="estado">Ingrese el estado</label>
                <select name="estado" id="estado" class="form-control">
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="codigo_carrera" id="codigo_carrera">
                <input  type="hidden" name="operacion" id="operacion" data-operacion="crear">
                <input type="submit" name="action" id="action" class="btn btn-success" value="Crear" data-operacion="crear">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    <script type="text/javascript">
      $(document).ready(function() {
        $("#botonCrear").click(function() {
        $("#formulario")[0].reset();
        $(".modal-title").text("crear carrera");
        $("#action").val("crear");
        $("#operacion").val("crear");
      });

      var dataTable = $('#carreras').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          url: "obtener.registros.php",
          type: "POST"
        },
        "columnDefs": [{
          "targets": [4, 5],
          "orderable": false,
        }]
      });

      $(document).on('submit', '#formulario', function(event) {
        event.preventDefault();
        var descri_carrera = $("#descripcion_carrera").val();
        var val_total = $("#valor_total_carrera").val();
        var status = $("#estado").val();

        if (descri_carrera != '' && val_total != '' && status != '') {
          $.ajax({
            url: "crear.php",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
              alert(data);
              $('#formulario')[0].reset();
              $('#modalCarrera').modal('hide');
              $('#carreras').DataTable().ajax.reload();
            }
          });
        } else {
          alert("Algunos campos son obligatorios");
        }
      });
    </script>
  </body>
</html>
