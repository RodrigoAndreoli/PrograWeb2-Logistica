<!DOCTYPE html>
<html lang="es">

<head>
    <title>Viajes</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        //$miSession -> permisos();
    
        $obj = new controlDB();
        include $LIBRARY_PATH.'/viajes_pag.php';
    ?>
</head>

<body>
    <!-- HEADER -->
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/templates/header.php');
    ?>
    <div id="wrapper">
    <!-- Sidebar -->
        <?php
            require_once($_SERVER['DOCUMENT_ROOT'].'/resources/templates/sidebar.php');        
        ?>
        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h1>Zona de Viajes</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th  class="text-center">Origen</th>
                                                <th  class="text-center">Destino</th>
                                                <th  class="text-center">Vehiculo</th>
                                                <th  class="text-center">Fehca</th>
                                                <th  class="text-center">Cliente</th>
                                                <th  class="text-center">Chofer</th>
                                                <th  class="text-center">Tiempo estimado</th>
                                                <th  class="text-center">km estimado</th>
                                                <th  class="text-center">Combustible previsto</th>
                                                <th  class="text-center">Tipo carga</th>
                                                <th  class="text-center">Km reales</th>
                                                <th  class="text-center">Combustible real</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['origen']; ?></td>
                                                <td><?php echo $td['destino']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="#" class="btn btn-danger">Eliminar</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>    
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                               <p>ACA PAGINACION</p>   
                            </div>
                        </div>
                        <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-primary">Nuevo viaje</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="#">
                                <button class="btn btn-link" target="_blank">Exportar a PDF</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>