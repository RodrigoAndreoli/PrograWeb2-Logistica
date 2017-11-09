<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Reporte</title>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();

    $nombreUsuario = $_SESSION['usuario']; 
    $rolUsuario = $_SESSION['rol']; 
    
    $obj = new controlDB();
    $usuario = $obj -> consultar("SELECT idUsuario FROM usuario where rol = '$rolUsuario' AND nombre = '$nombreUsuario'");
    $viajes = $obj -> consultar("SELECT idViaje FROM viaje");
    $vehiculos = $obj -> consultar("SELECT idVehiculo,patente FROM vehiculo");
    $idViaje = $_REQUEST['id'];
    $hoy = date("Y-m-d H:i:s");
    ?>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDZT1AooixAZ5wKBVyG-3nwMX3LyfqiyYY"></script>
    <style> #map { width: 100%; height: 200px; } </style> 
    <script>

        function localize() { 
            if (navigator.geolocation) { 
                navigator.geolocation.getCurrentPosition(mapa,error); 
            } else { 
                alert('Tu navegador no soporta geolocalizacion.'); 
            } 
        } 
        
        function mapa(pos) {
            var latitud = pos.coords.latitude; 
            var longitud = pos.coords.longitude; 
            var contenedor = document.getElementById("map");

            document.getElementById("longitud").setAttribute("value",latitud);
            document.getElementById("latitud").setAttribute("value",longitud);

            var centro = new google.maps.LatLng(latitud,longitud); 
            var propiedades = { zoom: 15, center: centro, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
            var map = new google.maps.Map(contenedor, propiedades); 
            var marcador = new google.maps.Marker({ position: centro, map: map, title: "Tu posicion actual" }); 
        } 
        
        function error(errorCode) { 
            if(errorCode.code == 1) 
                alert("No has permitido buscar tu localizacion") ;
            else if (errorCode.code==2) 
                alert("Posicion no disponible") ;
            else 
                alert("Ha ocurrido un error") ;
        } 

        window.onload=localize();


    </script> 
    <script type="text/javascript" src="/resources/js/validReporte.js"></script>
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
                                    <h1>Reporte de Viaje</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>   
                        <div class="row">        
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <div id="map"></div> 
                                <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 .col-md-6">
                            <form action="bdReporte.php" method="post" name="form" id="form" onsubmit="return validar()">
                                        <div class="col-xs-12 col-md-6">  
                                            <div class="row">  
                                                <div class="form-group">
                                                    <label for="motivo">Motivo</label>
                                                    <select class="form-control" id="motivo" name="motivo" onblur="return validar()" >
                                                        <option value="Parada Tecnica" selected>Parada Tecnica</option>
                                                        <option value="Desvio">Desvio</option>
                                                        <option value="Accidente">Accidente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="form-group">
                                                    <label for="km">Kilometros</label>
                                                    <input type="number" class="form-control" id="km" name="km" onblur="return validar()" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="combustible">Combustible</label>
                                                    <input type="number" class="form-control" id="combustible" name="combustible" onblur="return validar()" >
                                                </div>
                                            </div>
                                        </div>                            
                                    <div class="col-xs-12 col-md-6">  
                                        <label for="descripcion">Descripción</label>
                                        <textarea id="descripcion" name="descripcion" class="form-control col-xs-12" rows="9" placeholder="Descripcion..." onblur="return validar()" ></textarea>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-md-12">  
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="latitud" id="latitud" readonly>
                                        </div>
                                    </div>  
                                    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="longitud" id="longitud" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="tiempo" value="<?php echo $hoy; ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="funcion" value="insertar">
                                </form>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>