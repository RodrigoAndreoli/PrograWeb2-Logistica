<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usuarios</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
//      $miSession -> permisos();
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
                                    <h1>Zona de Reportes</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <form action="vista_reportes.php" method="post" class="form-inline">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <select class="form-control" id="fkViajeR" name="fkViajeR">
                                                    <option selected disabled>Seleccione un Viaje:</option>  
                                                    <?php 
                                                        if($_SESSION['rol'] == 'Administrador' || $_SESSION["rol"] == 'Supervisor') {
                                                            foreach($selectA as $s){ ?>
                                                                <option value="<?php echo $s['Viaje']; ?>">
                                                                    <?php echo ($s['Viaje'].': '.$s['Fecha'].', '.$s['Origen'].'~'.$s['Destino']); ?>
                                                                </option>
                                                            <?php }
                                                        } else if($_SESSION['rol'] == 'Chofer') {
                                                            foreach($selectC as $s){ ?>
                                                                <option value="<?php echo $s['Viaje']; ?>">
                                                                    <?php echo ($s['Viaje'].': '.$s['Fecha'].', '.$s['Origen'].'~'.$s['Destino']); ?>
                                                                </option>
                                                        <?php }
                                                        } ?>
                                                </select>
                                                <input type="submit" value="fkViajeR" class="btn btn-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
<!--
                                                <th class="text-center">idReporte</th>
                                                <th class="text-center">fkViajeR</th>
-->
                                                <th class="text-center">Tiempo</th>
                                                <th class="text-center">Latitud</th>
                                                <th class="text-center">Longitud</th>
                                                <th class="text-center">Motivo</th>
                                                <th class="text-center">Descripci&oacute;n</th>
                                                <th class="text-center">Operaci&oacute;n</th>
                                            </thead>
                                            <?php if(isset($datos)) {
                                                foreach($datos as $td) { ?>
                                                <tr>
<!--
                                                    <td>
                                                        <?php //echo $td['idReporte']; ?>
                                                    </td>
                                                    <td>
                                                        <?php //echo $td['fkViajeR']; ?>
                                                    </td>
-->
                                                    <td>
                                                        <?php echo $td['tiempo']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['latitud']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['longitud']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['motivo']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['descripcion']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#<?php echo " ";?>">
                                                            <button class="btn btn-info">Editar</button>
                                                        </a>
                                                        <a href="#<?php echo " ";?>">
                                                            <button class="btn btn-danger">Eliminar</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }} ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php
                                /*
                                for($i = 1; $i <= $total_paginas; $i++){
                                    echo "<ul class='pagination'>
                                    <li><a href='?pagina=".$i."'>".$i."</a></li>
                                    </ul>";}
                                */
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