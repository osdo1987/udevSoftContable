<?php include_once '../componentes/navbar.php';?>

<div class="h1 mb-0 font-weight-bold text-gray-800">PAGOS UDEV</div>
 
<div id="wrapper">
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<div class="container-fluid">

   
    <div>
        <div class="h5 mb-0 font-weight-bold text-gray-800">Buscar por Identificacion: </div>
        <div class="form-group row">
            <div class="col-sm-2 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Ej: 100993889">
            </div>
            
        </div>
        <i class="bi bi-plus-circle-fill"></i>
    </div>
   
    
    <!-- VISTA DE LA FECHA -->
    <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                FECHA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">01/01/24</div> 
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i> <!-- NO MUESTRA EL ICONO -->
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    

    <!-- DIAGRAMA PASTEL PROGRESO CURSO -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Progreso Curso</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
<?php include_once '../componentes/pie.php';?>