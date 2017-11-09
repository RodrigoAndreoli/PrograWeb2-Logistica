<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mantenimiento</title>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='chofer'){
            $miSession -> permisos();
        }
        
        $obj = new controlDB();
        include $LIBRARY_PATH.'/mantenimiento_pag.php';
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
                                    <h1>Zona de Mantenimiento</h1>
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
                                                <th  class="text-center">Mecanico</th>
                                                <th  class="text-center">Patente</th>
                                                <th  class="text-center">Tipo Vehiculo</th>
                                                <th  class="text-center">Km</th>
                                                <th  class="text-center">Fecha entrada</th>
                                                <th  class="text-center">Repuestos</th>
                                                <th  class="text-center">Service externo</th>
                                                <th  class="text-center">Costo</th>
                                                <?php if($_SESSION["rol"]!='supervisor'){?> 
                                                <th  class="text-center">Operacion</th>
                                                <?php } ?>  
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo ($td['nombre']);?></td>
                                                <td><?php echo strtoupper($td['patente']);?></td>
                                                <td><?php echo ucwords(strtolower($td['tipo_vehiculo']));?></td>
                                                <td><?php echo $td['km_unidad'];?></td>
                                                <td><?php echo $td['fecha_entrada'];?></td>
                                                <td><?php echo ucwords(strtolower($td['repuestos']));?></td>
                                                <td><?php echo ucwords(strtolower($td['externo']));?></td>
                                                <td><?php echo $td['costo'];?></td>
                                                <?php if($_SESSION["rol"]!='supervisor'){?>  
                                                <td class="text-center">
                                                    <a href="editarMantenimiento.php?id=<?php echo $td["idMantenimiento"]?>">
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="bdMantenimiento.php?id=<?php echo $td["idMantenimiento"]?>&funcion=eliminar"> 
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
                            <?php if($_SESSION["rol"]!='supervisor'){?>  
                            <div class="col">
                                <a href="registrarMantenimiento.php" class="btn btn-primary">Nuevo mantenimiento</a>
                            </div>
                            <?php } ?> 
                        </div>
                        <div class="row">
                            <a href="/logistica/exportarMantenimientos.php" class="btn btn-link" target="_blank" >Exportar a PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>