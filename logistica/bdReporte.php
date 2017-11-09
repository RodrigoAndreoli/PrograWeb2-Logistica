<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];

    
    if($funcion!="eliminar"){
        $idUsuario = $_POST['idUsuario'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];
        $idViaje = $_POST['idViaje'];
        $idVehiculo = $_POST['idVehiculo'];
        $km = $_POST['km'];
        $combustible = $_POST['combustible'];
        $tiempo = $_POST['tiempo'];
        $paradas = $_POST['paradas'];    
    }

    $obj = new controlDB();

    if($funcion == "modificar"){
        $sql = "UPDATE reporte_viaje
        SET idUsuario = '$idUsuario', 
        latitud = '$latitud', 
        longitud = '$longitud', 
        idViaje = '$idViaje', 
        idVehiculo = '$idVehiculo', 
        km = '$km',
        combustible = '$combustible',
        tiempo = '$tiempo',
        paradas = '$paradas'
        WHERE idReporteViaje = '$cod'";
    }
        
    
    
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM reporte_viaje 
            WHERE idReporteViaje='$id'";
    } else {
        $sql = "INSERT INTO reporte_viaje(idChofer,latitud,longitud,idViaje,idVehiculo,km,combustible,tiempo,paradas)
        VALUES('$idUsuario','$latitud','$longitud','$idViaje','$idVehiculo','$km','$combustible','$tiempo','$paradas')";
           
    }

    $obj -> insertar($sql);
    header("Location: alarmas.php"); 
    
?>