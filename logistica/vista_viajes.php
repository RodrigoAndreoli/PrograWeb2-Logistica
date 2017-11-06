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
                                                <th  class="text-center">idViaje</th>
                                                <th  class="text-center">Fecha</th>
                                                <th  class="text-center">Origen</th>
                                                <th  class="text-center">Destino</th>
                                                <th  class="text-center">Tipo de Carga</th>
                                                <th  class="text-center">Tiempo estimado</th>
                                                <th  class="text-center">Combustible</th>
                                                <th  class="text-center">km estimado</th>
                                                <!--<th  class="text-center">Combustible previsto</th>
                                                <th  class="text-center">Tipo carga</th>
                                                <th  class="text-center">Km reales</th>
                                                <th  class="text-center">Combustible real</th>-->
												<th  class="text-center" class="col-sm-6">Operacion</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['idViaje']; ?></td>
                                                <td><?php echo $td['fecha']; ?></td>
                                                <td><?php echo $td['origen']; ?></td>
                                                <td><?php echo $td['destino']; ?></td>
                                                <td><?php echo $td['tipo_carga']; ?></td>
                                                <td><?php echo $td['tiempo']; ?></td>
                                                <td><?php echo $td['combustible']; ?></td>
                                                <td><?php echo $td['km_totales']; ?></td>
												<!--<td></td>
												<td></td>
												<td></td>
												<td></td>-->
                                                <td class="text-center">
                                                    <a href="asignarViaje.php?id=<?php echo $td["idViaje"]?>">
                                                        <button class="btn btn-info">Asignar</button>
                                                    </a>
                                                    <a href="bdViajes.php?id=<?php echo $td["idViaje"]?>&funcion=eliminar"> 
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
                                    <a href="registrarViaje.php" class="btn btn-primary">Nuevo viaje</a>
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