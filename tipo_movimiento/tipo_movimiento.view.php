<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tipo movimiento</title>
</head>
<body>
<?php include_once '../componentes/navbar.php' ?>

<div class="card">
  <div class="card-header">
    tipo movimiento
  </div>
  <div class="card-body">

  <form name='form_tipo_movimiento' method='post' action='tipo_movimiento.controller.php'>
  <div class="mb-3">
    <label for="Tipo_movimiento" class="form-label">Tipo de movimiento</label>
    <input type="text" class="form-control" id="tipo_movimiento" name='tipo_movimiento' value="">
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    
  </div>
</div>
<?php include_once '../componentes/pie.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>