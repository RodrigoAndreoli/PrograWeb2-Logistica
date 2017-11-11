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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <!-- <th  class="text-center">idViaje</th> -->
                                                <th  class="text-center">Fecha de Partida</th>
                                                <th  class="text-center">Origen</th>
                                                <th  class="text-center">Destino</th>
                                                <th  class="text-center">Tipo de Carga</th>
                                                <th  class="text-center">Tiempo</th>
                                                <th  class="text-center">Combustible</th>
                                                <th  class="text-center">Km estimado</th>
                                                <?php if($_SESSION['rol'] == 'Administrador' || $_SESSION["rol"] == 'Supervisor') {?>   
                                                <th  class="text-center">Operacion</th>
                                                <?php } ?>
                                            </thead>

                                            <?php if($_SESSION['rol'] == 'Administrador' || $_SESSION["rol"] == 'Supervisor') {?>  
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <!-- <td><?php echo $td['VViaje']; ?></td> -->
                                                <td><?php echo $td['Fecha']; ?></td>
                                                <td><?php echo $td['Origen']; ?></td>
                                                <td><?php echo $td['Destino']; ?></td>
                                                <td><?php echo $td['Carga']; ?></td>
                                                <td><?php echo $td['Tiempo']; ?></td>
                                                <td><?php echo $td['Combustible']; ?></td>
                                                <td><?php echo $td['Km']; ?></td>

                                                <td class="text-center">
                                                    <?php if(!in_array($td['VViaje'], $asignar)) { ?>  
                                                    <a href="asignarViaje.php?id=<?php echo $td['VViaje']?>">
                                                        <button class="btn btn-success">Asignar</button>
                                                    </a>
                                                    <a href="bdViajes.php?id=<?php echo $td['VViaje']?>&funcion=eliminar"> 
                                                        <button class="btn btn-danger">Eliminar</button>
                                                    </a>
                                                    <br>
                                                    <?php } ?>  
                                                    
                                                    <a href="imprimirVIajeQR.php?id=<?php echo $td['VViaje']?>">
                                                        <button class="btn btn-info">Ver PDF</button>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php } else { }?> 

                                            
                                            <?php if(in_array($idUsuario, $asignarChofer) ||
                                            in_array($idUsuario, $asignarAcompaniante) ) {?>
                                            <?php foreach($datos3 as $td2){ ?>
                                            <tr>
                                                <!-- <td><?php echo $td['VViaje']; ?></td> -->
                                                <td><?php echo $td2['fecha']; ?></td>
                                                <td><?php echo $td2['origen']; ?></td>
                                                <td><?php echo $td2['destino']; ?></td>
                                                <td><?php echo $td2['carga']; ?></td>
                                                <td><?php echo $td2['tiempo']; ?></td>
                                                <td><?php echo $td2['combustible']; ?></td>
                                                <td><?php echo $td2['km']; ?></td>
                                            </tr>
                                            <?php } ?>
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
                            <?php if($_SESSION['rol'] == 'Administrador' || $_SESSION["rol"] == 'Supervisor') {?>   
                            <div class="col">
                                <a href="registrarViaje.php" class="btn btn-primary">Nuevo viaje</a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <a href="exportarViaje.php" target="_blank">
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