<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    if($funcion!="eliminar"){
        $fkMecanicoS = $_POST['fkMecanicoS'];
        $idVehiculo = $_POST['idVehiculo'];
        $fecha = $_POST['fecha'];
        $service = $_POST['service'];
        $km_service= $_POST['km_service'];
    }
    
    $obj = new controlDB();
    
    if($funcion == "insertar"){
        $sql = "INSERT INTO Service(fkMecanicoS, fkVehiculoS, fecha, service, km_service)
       VALUES('$fkMecanicoS', '$idVehiculo', '$fecha', '$service', '$km_service')";
    } 
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    $obj -> insertar($sql);
    header("Location: service.php");

?>