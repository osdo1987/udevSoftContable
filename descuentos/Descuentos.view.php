<navbar>

  <?php 
  include_once '../navbar/navbar.php';
  ?>

</navbar>

<body>
  

    <h1>Formulario descuentos</h1> 
    <p></p>
    <div class="mb-3" >
      <form action="Descuento.controller.php" method = "GET">
          <label for="codigo_descuento" class="form-label">Codigo descuento</label>
          <input type="number" class="form-control" name="codigo_descuento" >
        </div>
        <div class="mb-3">
          <label for="valor_descuento" class="form-label">Valor descuento</label>
          <input type="number" class="form-control" name="valor_descuento">
        </div>
        <p></p>
        <input type="submit" class="btn btn-primary"></input>
      </form>
</body>

<footer>

  <?php 
  
  include_once "../pie/pie.php";
  
  ?>

</footer>