<?php include_once '../componentes/navbar.php';?>

<div class="container">
        <h1>Institucion</h1>
        <form action="institucion.controller.php" method="post">
            <div class="mb-3">
                <label for="institutionName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="institutionName" aria-describedby="emailHelp" name="institutionName">
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
        