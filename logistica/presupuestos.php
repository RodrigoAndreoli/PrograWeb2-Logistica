<!DOCTYPE html>
<html lang="es">

<head>
    <title>Presupuestos</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        $miSession -> permisos();
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
                                    <h1>Zona de Presupuestos</h1>
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
                                                <th  class="text-center">XX</th>
                                                <th  class="text-center">XX</th>
                                                <th  class="text-center">XX</th>
                                                <th  class="text-center">XX</th>
                                                <th  class="text-center">XX</th>
                                                <th  class="text-center">XX</th>
                                            </thead>
                                            
                                            <tr>
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
                                    <a href="#" class="btn btn-primary">Nuevo Presupuesto</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="#">
                                <button class="btn btn-link">Exportar a PDF</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>