<!DOCTYPE html>
<html lang="es">
    
<head>
    <title>Alarma</title>
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
    ?>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyB9YfIPu98xke8YK2bH7eR30E-UKgP66X4"></script>
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
        var contenedor = document.getElementById("map") 	
        
        document.getElementById("long").setAttribute("value",latitud);
        document.getElementById("lat").setAttribute("value",longitud);
        
        var centro = new google.maps.LatLng(latitud,longitud); 
        var propiedades = { zoom: 15, center: centro, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
        var map = new google.maps.Map(contenedor, propiedades); 
        var marcador = new google.maps.Marker({ position: centro, map: map, title: "Tu posicion actual" }); 
    } 
        
    function error(errorCode) { 
        if(errorCode.code == 1) 
        alert("No has permitido buscar tu localizacion") 
        else if (errorCode.code==2) 
        alert("Posicion no disponible") 
        else 
        alert("Ha ocurrido un error") 
    } 
    </script> 
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
                                    <h1>Alarma</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>   
                        <div class="row">        
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <div id="map"></div> 
                            <br>
                            <button onclick="localize()" class="btn btn-success">click</button>
                            <p class="text-muted">Obtener coordenadas.</p>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 .col-md-6">
                            <form action="bdAlarma.php" method="post">
                                <table class="table">
                                   <!-- <?php foreach($usuario as $usr){ ?>
                                        <input type="hidden" name="idUsuario" value="<?php echo $usr['idUsuario']; ?>" readonly>
                                    <?php } ?> -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Latitud</label>
                                            <input type="text" class="form-control" name="latitud" id="lat" readonly>
                                        </div>
                                    </div>  
                                    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="">Longitud</label>
                                            <input type="text" class="form-control" name="longitud" id="long" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="">Combustible</label>
                                            <input type="number" class="form-control" name="combustible">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6"> 
                                        <div class="form-group">
                                            <label for="">Kilometros</label>
                                            <input type="number" class="form-control" name="km">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="">Tiempo</label>
                                            <input type="text" class="form-control" name="tiempo" placeholder="00:00:00">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="">Motivo</label>
                                            <select class="form-control" id="sel1" name="motivo">
                                                <option value="cargaCombustible">Carga de combustible</option>
                                                <option value="desvio">Desvío</option>
                                                <option value="fallaTecnica">Falla técnica</option>
                                            </select>
                                        </div>
                                    </div>
                                <!--    <div class="col-xs-12 col-md-6">  
                                        <div class="form-group">
                                            <label for="">Id Viaje</label>
                                            <input type="text" class="form-control" name="viaje" placeholder=  <?php echo $idViaje ?>      
                                            >
                                        </div>
                                    </div>      -->                              
                                    <div class="col-xs-12 col-md-6">  
                                        <textarea name="paradas" class="form-control col-xs-12" rows="9" placeholder="Descripcion..."></textarea>
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-md-12">  
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                        </div>
                                    </div>
                                </table>
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