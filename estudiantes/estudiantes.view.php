<?php

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDEV</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
  <div class="container fondo">
    <h1 class="text-center">CRUD en PHP, PDO,Ajax y datatable</h1>



    <div class="row">
      <div class="col-2 offset-10">
        <div class="text-center">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
            <i class="bi bi-plus-circle-fill"></i> Crear
          </button>



        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="tabla-responsive">
      <table id="estudiantes" class="table table-bordered table-striped">

        <thead>
          <tr>

            <th>Codigo estudiante</th>
            <th>nombre estudiante</th>
            <th>apellido estudiante</th>
            <th>fecha nacimiento estudiante</th>
            <th>Imagen</th>
            <th>editar</th>
            <th>borrar</th>

          </tr>
        </thead>
      </table>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de estudiante</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form method="post" id="formulario" enctype="multipart/form-data">
            <div class="modal-contant">
              <div class="modal-body">


                <label for="codigo_estudiante">Ingrese el codigo</label>
                <input type="number" name="codigo_estudiante" id="codigo_estudiante" class="form-control">
                <br>

                <label for="nombre">Ingrese el nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <br>
                <label for="apellidos">Ingrese los apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control">
                <br>
                <label for="fecha_nacimiento_estudiante">Ingrese la fecha_nacimiento</label>
                <input type="text" name="fecha_nacimiento_estudiante" id="fecha_nacimiento_estudiante" class="form-control">
                <br>

                <label for="imagen_estudiante">Seleccione una imagen</label>
                <input type="file" name="imagen_estudiante" id="imagen_estudiante" class="form-control">
                <span id="imagen_subida"></span>




              </div>
              <div class="modal-footer">
              <input type="hidden" name="imagen_estudiante_oculta" id="imagen_estudiante_oculta" value="<?php echo $fila['imagen']; ?>">

                <input type="hidden" name="codigo_estudiante" id="codigo_estudiante">
                <input type="hidden" name="operacion" id="operacion">
                <input type="submit" name="action" id="action" class="btn btn-success" value="Ingresar">

              </div>
          </form>
        </div>

      </div>
    </div>
  </div>








  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#botonCrear").click(function() {
        $("#formulario")[0].reset();
        $(".modal-title").text("crear estudiante");
        $("#action").val("crear");
        $("#operacion").val("crear");
        $("#imagen_subida").html("");



      });

      var dataTable = $('#estudiantes').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          url: "obtener.registros.php",
          type: "POST"

        },

        "columnDefs": [{
          "targets": [0, 3, 4],
          "orderable": false,
        }, ]
      });

      $(document).on('submit', '#formulario', function(event) {
        event.preventDefault();
        var nombres = $("#codigo_estudiante").val();
        var nombres = $("#nombre_estudiante").val();
        var apellidos = $("#apellidos_estudiante").val();
        var fecha_nacimiento_estudiante = $("#fecha_nacimiento_estudiante").val();
        var extension = $('#imagen_estudiante').val().split('.').pop().toLowerCase();
        if (extension != '') {
          if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("formato de imagen invalido");
            $('#imagen_estudiante').val('');
            return false;

          }


        }
        if (nombres != '' && apellidos != '' && fecha_nacimiento_estudiante != '') {
          $.ajax({
            url: "crear.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data)

            {

              alert(data);
              $('#formulario')[0].reset();
              $('#modalUsuario').modal('hide');
              dataTable.ajax.reload();
            }

          });
        } else {
          alert("algunos campos son obligatorios");
        }
      });

      //funcionanlidad editar




      $(document).on('click', '.editar', function() {

        var codigo_estudiante = $(this).attr("id");
        $.ajax({
          url: "obtener.registro.php",
          method: "POST",
          data: {
            codigo_estudiante: codigo_estudiante
          },
          dataType: "json",
          success: function(data) {

            $('#modalUsuario').modal('show');
            $('#nombre').val(data.nombre_estudiante);
            $('#apellidos').val(data.apellidos_estudiante);
            $('#fecha_nacimiento_estudiante').val(data.fecha_nacimiento_estudiante);
           
            $('#imagen_subida').html(data.imagen_estudiante);

            $('#modal-title').text("Editar estudiante");
            $('#action').val("editar");
            $('#operacion').val("editar");
            $('#codigo_estudiante').val(codigo_estudiante);

            // Asegúrate de reiniciar el campo de imagen oculta si es necesario
            $('#imagen_estudiante_oculta').val(data.imagen_estudiante);

          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        })


      });

      //Funcionalida de borrar
      $(document).on('click', '.borrar', function() {
        var codigo_estudiante = $(this).attr("id");
        if (confirm("Esta seguro de borrar este registro:" + codigo_estudiante)) {
          $.ajax({
            url: "borrar.php",
            method: "POST",
            data: {
              codigo_estudiante: codigo_estudiante
            },
            success: function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
      });








    });
  </script>


</body>

</html>