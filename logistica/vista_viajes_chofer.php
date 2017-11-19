<!DOCTYPE html>
<html lang="es">

<head>
    <title>Viajes</title>
    <?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    if($_SESSION['rol'] == 'Mecanico'){
        $miSession -> permisos();
        }
    $obj = new controlDB();
    include $LIBRARY_PATH.'/viajesChofer_pag.php';
    $idUsuario = $_SESSION['idUsuario'];
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
                                    <?php $cont = 0;
                                    foreach($datos4 as $td) { ?>
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#<?php echo ($cont)?>" style="margin-bottom: 2em;">
                                            <?php echo ('Salida: '.$td['fecha'].'<br>Desde: '.$td['origen'].'<br>Hasta: '.$td['destino']); ?>
                                        </button>
                                        <div class="modal fade" id="<?php echo ($cont)?>" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><?php echo ('Salida: '.$td['fecha'].'<br>Desde: '.$td['origen'].'<br>Hasta: '.$td['destino'].'<br>Carga: '.$td['carga'].'<br>Tiempo Total: '.$td['tiempo'].'h<br>Combustible Total: $ '.$td['combustible'].'<br>Kilometraje Total: '.$td['km']); ?></h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   <?php $cont ++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>