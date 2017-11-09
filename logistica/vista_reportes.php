<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usuarios</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
                $miSession -> permisos();

    
        $obj = new controlDB();
        include $LIBRARY_PATH.'/reportes_pag.php';
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
                                    <h1>Zona de Reportes de Viajes</h1>
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
                                                <th  class="text-center">idReporteViaje</th>
                                                <th  class="text-center">idViaje</th>
                                                <th  class="text-center">Latitud</th>
                                                <th  class="text-center">Longitud</th>
                                                <th  class="text-center">Tiempo</th>
                                                <th  class="text-center">Operacion</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['idReporteViaje']; ?></td>
                                                <td><?php echo $td['idViaje']; ?></td>
                                                <td><?php echo $td['latitud']; ?></td>
                                                <td><?php echo $td['longitud']; ?></td>
                                                <td><?php echo $td['tiempo']; ?></td>
                                                <td class="text-center">
                                                    <a href="#<?php echo "";?>">
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="#<?php echo "";?>">
                                                        <button class="btn btn-danger">Eliminar</button>
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
                                <?php
                                    for($i = 1; $i <= $total_paginas; $i++){
                                    echo "<ul class='pagination'>
                                        <li><a href='?pagina=".$i."'>".$i."</a></li>
                                    </ul>";}
                                ?>    
                            </div>
                        </div>
                        <div class="row">
                                <div class="col">
                                    <a href="registrarReporte.php" class="btn btn-primary">Nuevo Reporte</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="#" target="_blank">
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