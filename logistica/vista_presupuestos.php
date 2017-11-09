<!DOCTYPE html>
<html lang="es">

<head>
    <title>Presupuestos</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        $miSession -> permisos();
        
        $obj = new controlDB();
        include $LIBRARY_PATH.'/presupuestos_pag.php';
        
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
                                                <th  class="text-center">Supervisor</th>
                                                <th  class="text-center">Cliente</th>
                                                <th  class="text-center">Origen</th>
                                                <th  class="text-center">Destino</th>
                                                <th  class="text-center">Estado</th>
                                                <th  class="text-center">Aceptado</th>
                                                <th>Costo</th>
                                                <th>Operacion</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo utf8_decode(ucwords(strtolower($td['nombre']))); ?></td>
                                                <td><?php echo utf8_decode(ucwords(strtolower($td['razon']))); ?></td>
                                                <td><?php echo utf8_decode(ucwords(strtolower($td['origen']))); ?></td>
                                                <td><?php echo utf8_decode(ucwords(strtolower($td['destino']))); ?></td>
                                                <td><?php echo ucwords(strtolower($td['estado'])); ?></td>
                                                <td><?php echo ucwords(strtolower($td['aceptado'])); ?></td>
                                                <td><?php echo $td['costo_real']; ?></td>
                                                <td class="text-center">
                                                    <a href="editarPresupuesto.php?id=<?php echo $td["idPresupuesto"]?>"> 
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                     <a href="bdPresupuestos.php?id=<?php echo $td["idPresupuesto"]?>&funcion=eliminar"> 
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
                                    <a href="registrarPresupuesto.php" class="btn btn-primary">Nuevo Presupuesto</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="exportarPresupuestos.php">
                                <button class="btn btn-link">Exportar a PDF</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>