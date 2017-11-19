<!DOCTYPE html>
<html lang="es">

<head>
    <title>Reportes</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Mecanico'){
            $miSession -> permisos();
        }  
        $obj = new controlDB();
        include $LIBRARY_PATH.'/reportes_pag.php';
    ?>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDZT1AooixAZ5wKBVyG-3nwMX3LyfqiyYY"></script>
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
                                                            foreach($selectAdmin as $s){ ?>
                                                                <option value="<?php echo $s['Viaje']; ?>">
                                                                    <?php echo ($s['Viaje'].': '.$s['Fecha'].', '.$s['Origen'].' ~ '.$s['Destino']); ?>
                                                                </option>
                                                            <?php }
                                                        } else if($_SESSION['rol'] == 'Chofer') {
                                                            foreach($selectChofer as $s){ ?>
                                                                <option value="<?php echo $s['Viaje']; ?>">
                                                                    <?php echo ($s['Viaje'].': '.$s['Fecha'].', '.$s['Origen'].' ~ '.$s['Destino']); ?>
                                                                </option>
                                                        <?php }
                                                        } ?>
                                                </select>
                                                <input type="submit" value="Buscar" class="btn btn-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <?php if(!empty($buscar)) { 
                                        if($_SESSION['rol'] == 'Administrador' || $_SESSION["rol"] == 'Supervisor') {?>
                                <div class="row">
                                <div class="col-xs-12">
                                    <div id="reportes">  
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <tr style="background-color:#2C3E50; color:white;">
                                                    <th colspan="8" class="text-center">
                                                    Viaje <?php foreach($titulo as $t) {
                                                               echo ($t['Viaje'].': '.$t['Fecha'].'<br>Desde: '.$t['Origen'].'<br>Hasta: '.$t['Destino']);
                                                           } ?>
                                                    </th>
                                                </tr>
                                                <tr>
<!--
                                                    <th class="text-center">idReporte</th>
                                                    <th class="text-center">fkViajeR</th>
-->
                                                    <th class="text-center">Nro.</th>
                                                    <th class="text-center">Chofer</th>
                                                    <th class="text-center">Tiempo</th>
                                                    <th class="text-center">Coordenadas</th>
<!--
                                                    <th class="text-center">Latitud</th>
                                                    <th class="text-center">Longitud</th>
-->
                                                    <th class="text-center">Motivo</th>
                                                    <th class="text-center">Descripci&oacute;n</th>
                                                    <th class="text-center">Kilometros</th>
                                                    <th class="text-center">Combustible</th>
<!--
                                                    <th class="text-center">Operaci&oacute;n</th>
-->
                                                </tr>
                                            </thead>
                                            <?php if(isset($datos)) {
                                                $x = 0;
                                                foreach($datos as $td) {
                                                    $x++; ?>
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
                                                        <?php echo $x; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['Nombre']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['Tiempo']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="https://www.google.com/maps/?q=<?php echo $td['Longitud'].','.$td['Latitud']; ?>" target="_blank">
                                                            <?php 
                                                                echo ('('.substr($td['Longitud'],0,6).' ; '.substr($td['Latitud'],0,6).')'); 
                                                            ?>
                                                            <?php 
                                                                //echo ('('.substr($td['longitud'],1,5).' S;'.substr($td['latitud'],1,5).' O)'); 
                                                            ?>
                                                        </a>
                                                    </td>
<!--
                                                    <td>
                                                        <?php echo $td['Latitud']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['Longitud']; ?>
                                                    </td>
-->
                                                    <td>
                                                        <?php echo $td['Motivo']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['Descripcion']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['Kilometros']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ('$ '.$td['Combustible']); ?>
                                                    </td>
<!--
                                                    <td class="text-center">
                                                        <a href="#<?php echo " ";?>">
                                                            <button class="btn btn-info">Editar</button>
                                                        </a>
                                                        <a href="#<?php echo " ";?>">
                                                            <button class="btn btn-danger">Eliminar</button>
                                                        </a>
                                                    </td>
-->
                                                </tr>
                                            <?php }} ?>
                                        </table>
                                    </div>
                                    </div> 
                                </div>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div id="map" style="height: 400px;" class="col-xs-12 col-md-6 col-md-offset-3"></div>
                                    <script>
                                        var locations = [
                                            <?php
                                                if($_SESSION['rol'] == 'Chofer') {
                                                    $y = 0;
                                                    foreach($datos as $td) {
                                                        $y++;
                                                        echo('["Nro. '.$y.'<br>Chofer: '.$td['Nombre'].'<br>Tiempo: '.$td['Tiempo'].'<br>Combustible: $ '.$td['Combustible'].'<br>Kilometraje: '.$td['Kilometros'].'", '.$td['Longitud'].', '.$td['Latitud'].', '.$y.'],');
                                                    } 
                                                } else {
                                                    $y = 0;
                                                    foreach($datos as $td) {
                                                        $y++;
                                                        echo('["Nro. '.$y.'", '.$td['Longitud'].', '.$td['Latitud'].', '.$y.'],');
                                                    }
                                                } ?>
                                        ];
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 5,
                                        center: new google.maps.LatLng(-35.095385, -65.104140),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                                        disableDefaultUI: true,
                                        fullscreenControl: true,
                                        zoomControl: true
                                        });
                                        var infowindow = new google.maps.InfoWindow();
                                        var marker, i;
                                        for (i = 0; i < locations.length; i++) {  
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                map: map
                                            });
                                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                                return function() {
                                                    infowindow.setContent(locations[i][0]);
                                                    infowindow.open(map, marker);
                                                }
                                            })(marker, i));
                                        }
                                    </script>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if(isset($datos)) { ?>
                            <br>
                            <div class="row">
                                <a href="exportarReporte.php?id=<?php echo $buscar; ?>" target="_blank">
                                    <button class="btn btn-primary">Exportar a PDF</button>
                                </a>
                            </div>
                        <?php } ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>