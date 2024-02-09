<navbar>
  <?php 
    include_once '../componentes/navbar.php';
  ?>
</navbar>

<body>

  <h1>Convenios.</h1> 
  <p></p>
  <form class="row g-3" method="GET" action="Convenios.controller.php">
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
</body>

<footer>
  <?php 
    include_once '../componentes/pie.php';
  ?>
</footer>