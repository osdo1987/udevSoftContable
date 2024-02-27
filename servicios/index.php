<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">




    <title>Crud servicios</title>
  </head>
  <body>

    <div class="container fondo">

        <h1 class="text-center">Servicios</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" 
                    data-bs-target="#modalServicio" id="botonCrear">
                    <i class="bi bi-plus-circle-fill"></i>Crear
                    </button>
                </div>
            </div>        
        </div>
        <br />
        <br />
        <div class="table-responsive">
            <table id="datos_servicio" class="table  table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Valor total</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalServicio" tabindex="-1" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear servicio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" 
                aria-label="Close"></button>
            </div>
            
                <form method="POST" id="formulario" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-body">

                            <label for="codigo_servicio">Codigo servicio</label>
                            <input type="number" name="codigo_servicio" id="codigo_servicio" class="form-control">
                            <br />

                            <label for="descripcion_servicio">Descripcion</label>
                            <input type="text" name="descripcion_servicio" id="descripcion_servicio" class="form-control">
                            <br />

                            <label for="valor_total_servicio">Valor total</label>
                            <input type="number" name="valor_total_servicio" id="valor_total_servicio" class="form-control">
                            <br />

                            <label for="estado">Estado</label>
                            <input type="text" name="estado" id="estado" class="form-control">
                            <br />
                            
                            <!--
                            <label for="imagen_servicio">Seleccione una imagen</label>
                            <input type="file" name="imagen_servicio" id="imagen_servicio" class="form-control">
                            <br />

                            <span id="imagen-subida"></span>
                            -->

                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="id_servicio" id="id_servicio">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="submit" name="action" id="action" class="btn btn-success"
                            value="Crear">
                        </div>
                    </div>
                </form>
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
            $(".modal-title").text("crear servicio");
            $("#action").val("crear");
            $("#operacion").val("crear");
            $("#imagen_subida").html("");



        });

        var dataTable = $('#servicios').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
            url: "obtener_registros.php",
            type: "POST"

            },

            "columnDefs": [{
            "targets": [0, 3, 4],
            "orderable": false,
            }, ]
        });

        $(document).on('submit', '#formulario', function(event) {
            event.preventDefault();
            var codigo_servicio = $("codigo_servicio").val();
            var descripcion_servicio = $("#descripcion_servicio").val();
            var valor_total_servicio = $("#valor_total_servicio").val();
            var estado = $("#estado").val();
            
            if (codigo_servicio != '' && descripcion_servicio != '' && valor_total_servicio != ''  && estado != '') {
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
        $(document).on('click','btn-secondary.editar', function(){

            var codigo_servicio = $(this).attr("id");
            $.ajax({
            url: "obtener_registro.php",
            method: "POST",
            data:{codigo_servicio:codigo_servicio},
            dataType: "json",
            success: function(data)
            {

                $('#modalUsuario').modal('show');
                $('#descripcion_servicio').val(data.descripcion_servicio);
                $('#valor_total_servicio').val(data.valor_total_servicio);
                $('#estado').val(data.estado);
                $('#modal-title').text("Editar servicio");
                $('#codigo_servicio').val(codigo_servicio);
                $('#action').val("Editar");
                $('#operacion').val("Editar");

            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            }
            })


        });

        //Funcionalida de borrar
        $(document).on('click', '.borrar', function(){
                    var codigo_servicio = $(this).attr("id");
                    if(confirm("Esta seguro de borrar este registro:" + codigo_servicio))
                    {
                        $.ajax({
                            url:"borrar.php",
                            method:"POST",
                            data:{codigo_servicio:codigo_servicio},
                            success:function(data)
                            {
                                alert(data);
                                dataTable.ajax.reload();
                            }
                        });
                    }
                    else
                    {
                        return false;	
                    }
                });

        });

    </script>
</body>
</html>