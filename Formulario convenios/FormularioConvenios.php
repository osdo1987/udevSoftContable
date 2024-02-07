<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario convenios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <h1>Formulario convenios.</h1> 
    <p></p>
    <form class="row g-3" method="GET" action="Controlador.php">
        <div class="col-md-6">
          <label for="codigo_convenio" class="form-label">Codigo convenio</label>
          <input type="number" class="form-control" name="codigo_convenio">
        </div>
        <div class="col-md-6">
          <label for="valor" class="form-label">Valor</label>
          <input type="number" class="form-control" name="valor">
        </div>
        <div class="col-md-6">
          <label for="saldo_convenios" class="form-label">Saldo convenio</label>
          <input type="number" class="form-control" name="saldo_convenios" >
        </div>
        <div class="col-md-6">
          <label for="codigo_alumno" class="form-label">Codigo alumno</label>
          <input type="number" class="form-control" name="codigo_alumno" >
        </div>
        <div class="col-md-6">
          <label for="codigo_carrera" class="form-label">Codigo carrera</label>
          <input type="number" class="form-control" name="codigo_carrera">
        </div>
        <div class="col-md-3">
          <label for="codigo_descuento" class="form-label">Codigo descuento</label>
            <input type="number" class="form-control" name="codigo_descuento">
          </select>
        </div>
        <div class="col-md-3">
          <label for="codigo_institucion" class="form-label">Codigo institucion</label>
          <input type="number" class="form-control" name="codigo_institucion">
        </div>
        <p></p>
        <div>
          <input type="submit" class="btn btn-primary"></input>
        </div>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>