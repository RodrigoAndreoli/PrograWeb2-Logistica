<!DOCTYPE html>
<html lang="es">

<head>
    <title>Clientes</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!='admin'){
            $miSession -> permisos();
        }    
        $obj = new controlDB();
        include $LIBRARY_PATH.'/clientes_pag.php';

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
                                    <h1>Zona de Clientes</h1>
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
                                                <th  class="text-center">Cuit</th>
                                                <th  class="text-center">Razón social</th>
                                                <th  class="text-center">Calle</th>
                                                <th  class="text-center">Número</th>
                                                <th  class="text-center">Piso</th>
                                                <th  class="text-center">Cód. Postal</th>
                                                <th  class="text-center">Teléfono</th>
                                                <th  class="text-center">Operación</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['cuit']; ?></td>
                                                <td><?php echo $td['razon']; ?></td>
                                                <td><?php echo $td['dom_calle']; ?></td>
                                                <td><?php echo $td['dom_numero']; ?></td>
                                                <td><?php echo $td['dom_piso']; ?></td>
                                                <td><?php echo $td['dom_cp']; ?></td>
                                                <td><?php echo $td['telefono']; ?></td>
                                                <td class="text-center">
                                                    <a href="editarCliente.php?id=<?php echo $td["idCliente"]?>">
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="bdCliente.php?id=<?php echo $td["idCliente"]?>&funcion=eliminar"> 
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
                                    <a href="registrarCliente.php" class="btn btn-primary">Nuevo Cliente</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="/logistica/exportarVehiculo.php">
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