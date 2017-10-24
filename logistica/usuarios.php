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
        include $LIBRARY_PATH.'/usuarios_pag.php';
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
                                    <h1>Zona de Usuarios</h1>
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
                                                <th  class="text-center">Nombre</th>
                                                <th  class="text-center">Documento</th>
                                                <th  class="text-center">Nro documento</th>
                                                <th  class="text-center">Nacimiento</th>
                                                <th  class="text-center">Rol</th>
                                                <th  class="text-center">Operacion</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['nombre']; ?></td>
                                                <td><?php echo $td['tipo_doc']; ?></td>
                                                <td><?php echo $td['num_doc']; ?></td>
                                                <td><?php echo $td['fecha_nacimiento']; ?></td>
                                                <td><?php echo $td['rol']; ?></td>
                                                <td class="text-center">
                                                    <a href="editarUser.php?id=<?php echo $td["idUsuario"]?>">
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="bdUser.php?id=<?php echo $td["idUsuario"]?>&funcion=eliminar"> 
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
                                    <a href="registrarUser.php" class="btn btn-primary">Nuevo usuario</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="/logistica/exportarUser.php">
                                <button class="btn btn-link">Exportar a PDF</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
||</html>