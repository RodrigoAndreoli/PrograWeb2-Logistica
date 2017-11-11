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
                                                                    <?php echo ($s['Viaje'].': '.$s['Fecha'].', '.$s['Origen'].'~'.$s['Destino']); ?>
                                                                </option>
                                                            <?php }
                                                        } else if($_SESSION['rol'] == 'Chofer') {
                                                            foreach($selectChofer as $s){ ?>
                                                                <option value="<?php echo $s['Viaje']; ?>">
                                                                    <?php echo ($s['Viaje'].': '.$s['Fecha'].', '.$s['Origen'].'~'.$s['Destino']); ?>
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
                                <?php if(!empty($buscar)) { ?>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <tr style="background-color:#2C3E50; color:white;">
                                                    <th colspan="4" class="text-center">
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

                                                    <th class="text-center">Tiempo</th>
                                                    <th class="text-center">Coordenadas</th>
<!--
                                                    <th class="text-center">Latitud</th>
                                                    <th class="text-center">Longitud</th>
-->
                                                    <th class="text-center">Motivo</th>
                                                    <th class="text-center">Descripci&oacute;n</th>
<!--
                                                    <th class="text-center">Operaci&oacute;n</th>
-->
                                                </tr>
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
                                                        <a href="https://www.google.com/maps/?q=<?php echo ($td['longitud'].','.$td['latitud']); ?>" target="_blank">
                                                            <?php 
                                                                echo ('('.substr($td['longitud'],0,6).' ; '.substr($td['latitud'],0,6).')'); 
                                                            ?>
                                                            <?php 
                                                                //echo ('('.substr($td['longitud'],1,5).' S;'.substr($td['latitud'],1,5).' O)'); 
                                                            ?>
                                                        </a>
                                                    </td>
<!--
                                                    <td>
                                                        <?php echo $td['latitud']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['longitud']; ?>
                                                    </td>
-->
                                                    <td>
                                                        <?php echo $td['motivo']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $td['descripcion']; ?>
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
                                
                                <div class="row">
                                <div id="map" style="height: 400px;" class="col-md-6 col-md-offset-3"></div>
                                <script>
                                    var locations = [
                                        ['Bondi Beach', -33.890542, 151.274856, 4],
                                        ['Coogee Beach', -33.923036, 151.259052, 5],
                                        ['Cronulla Beach', -34.028249, 151.157507, 3],
                                        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                                        ['Maroubra Beach', -33.950198, 151.259302, 1]
                                    ];
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 10,
                                    center: new google.maps.LatLng(-33.92, 151.25),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
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
                        <?php if($_SESSION['rol'] == 'Chofer') { ?>
                        <div class="row">
                            <div class="col">
                                <a href="registrarReporte.php" class="btn btn-primary">Nuevo Reporte</a>
                            </div>
                        </div>
                        <?php }
                            if(isset($datos)) { ?>
                        <div class="row">
                            <a href="#" target="_blank">
                                <button class="btn btn-link" target="_blank">Exportar a PDF</button>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>