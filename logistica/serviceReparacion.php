<!DOCTYPE html>
<html lang="es">
    
<head>
    <title>Service</title>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        $miSession -> permisos();
    
        $obj = new controlDB();
        //echo strftime("%A %d de %B del %Y");
        $order = isset($_GET['ordenar']);
        if($order == "fSal") {
            $datos = $obj -> consultar("SELECT m.fecha_entrada, m.fecha_salida, v.patente 
                FROM mantenimiento AS m 
                JOIN vehiculo AS v ON v.idVehiculo = m.idVehiculo 
                ORDER BY m.fecha_salida");
        } else {
            $datos = $obj -> consultar("SELECT m.fecha_entrada, m.fecha_salida, v.patente 
                FROM mantenimiento AS m 
                JOIN vehiculo AS v ON v.idVehiculo = m.idVehiculo 
                ORDER BY m.fecha_entrada");
        }
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
                                    <h1>Zona de Service</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>
<!-- Cambiar segun pregunte al profee hay que, mostrar por vehiculo, y km cuando debe hacerse los controles sobre el vehiculo ejemplo a los tantos km cambio de aceite -->
                        
                        <div class="col-lg-8 col-lg-offset-2">
                            <p class="text-right">Ordenar por: 
                                <a href="serviceReparacion.php?ordenar=fSal">Fecha de salida</a>,
                                <a href="serviceReparacion.php">Fecha de entrada</a>
                            </p>
                            <div class="table-responsive container-fluid">
                                <table class="table table-condensed table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fecha entrada</th>
                                            <th>Fecha salida</th>
                                            <th>Vehiculo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datos as $td){ ?>
                                        <tr>
                                            <td class="agenda-date" class="active">
                                                <div class="dayofmonth"><?php echo date("d", strtotime($td['fecha_entrada']));?></div>
                                                <div class="dayofweek"><?php echo strftime("%B",strtotime($td['fecha_entrada']));?></div>
                                                <div class="shortdate text-muted"><?php echo date("Y", strtotime($td['fecha_entrada']));?></div>
                                            </td>
                                            <td class="agenda-date" class="active">
                                                <div class="dayofmonth"><?php echo date("d", strtotime($td['fecha_salida']));?></div>
                                                <div class="dayofweek"><?php echo strftime("%B",strtotime($td['fecha_salida']));?></div>
                                                <div class="shortdate text-muted"><?php echo date("Y", strtotime($td['fecha_salida']));?></div>
                                            </td>
                                            <td class="agenda-events">
                                                <div class="agenda-event">
                                                    <p><?php echo $td['patente'];?></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>