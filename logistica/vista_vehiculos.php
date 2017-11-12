<!DOCTYPE html>
<html lang="es">

<head>
    <title>Vehiculos</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer'){
                $miSession -> permisos();
            } 
        $obj = new controlDB();
        include $LIBRARY_PATH.'/vehiculo_pag.php';

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
                                    <h1>Zona de Veh&iacute;culos</h1>
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
                                                <th  class="text-center">Tipo de veh&iacute;culo</th>
                                                <th  class="text-center">Patente</th>
                                                <th  class="text-center">Marca</th>
                                                <th  class="text-center">Modelo</th>
                                                <th  class="text-center">A&ntilde;o</th>
                                                <th  class="text-center">N&uacute;mero de chasis</th>
                                                <th  class="text-center">N&uacute;mero de motor</th>
                                                <th  class="text-center">Kilometros</th>
                                                <?php if($_SESSION["rol"]!='Supervisor' && $_SESSION["rol"]!='Mecanico'){?>  
                                                <th  class="text-center">Operaci&oacute;n</th>
                                                <?php } ?>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['tipo_vehiculo']; ?></td>
                                                <td><?php echo $td['patente']; ?></td>
                                                <td><?php echo $td['marca']; ?></td>
                                                <td><?php echo $td['modelo']; ?></td>
                                                <td><?php echo $td['anio']; ?></td>
                                                <td><?php echo $td['nro_chasis']; ?></td>
                                                <td><?php echo $td['nro_motor']; ?></td>
                                                <td><?php echo $td['km']; ?></td>
                                                <?php if($_SESSION["rol"]!='Supervisor' && $_SESSION["rol"]!='Mecanico'){?>  
                                                <td class="text-center">
                                                    <a href="editarVehiculo.php?id=<?php echo $td["idVehiculo"]?>">
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="bdVehiculo.php?id=<?php echo $td["idVehiculo"]?>&funcion=eliminar"> 
                                                        <button class="btn btn-danger">Eliminar</button>
                                                    </a>
                                                </td>
                                                <?php } ?>
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
                                <?php if($_SESSION["rol"]!='Supervisor' && $_SESSION["rol"]!='Mecanico'){?>  
                                <div class="col">
                                    <a href="registrarVehiculo.php" class="btn btn-primary">Nuevo veh&iacute;culo</a>
                                </div>
                                <?php } ?>
                        </div>
                        <div class="row">
                            <a href="/logistica/exportarVehiculo.php" target="_blank">
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