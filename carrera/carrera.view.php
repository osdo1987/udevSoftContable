<?php include_once '../componentes/navbar.php';?>

  <div class="container">
        <h1>Carrera</h1>
         <form action="carrera.controller.php" method="post">
             <div class="mb-3">
                 <label for="carreraName" class="form-label">Nombre</label>
                 <input type="text" class="form-control" id="carreraName" name="carreraName">
              </div>
             <div class="mb-3">
                 <label for="carreraDescription" class="form-label">Descripcion</label>
                  <textarea class="form-control" id="carreraDescription" name="carreraDescription" rows="3"></textarea>
             </div>
             <div class="mb-3">
                 <label for="estado" class="form-label">Estado</label>
                  <select class="form-select" id="estado" name="estado">
                     <option selected>Seleccion...</option>
                      <option value="1">Activa</option>
                      <option value="2">Inactiva</option>
                  </select>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
         </form>
  </div>
<?php include_once '../componentes/pie.php';?>