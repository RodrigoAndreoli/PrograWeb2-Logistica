<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
	$obj = new controlDB();
    
	
	
	
    if($funcion=="asignar"){
		
		$idViaje = $_GET['id'];
		$idUsuario1 = $_GET['chofer1'];
		$idVehiculo1 = $_GET['vehiculo1'];
		$idUsuario2 = $_GET['chofer2'];
		$idVehiculo2 = $_GET['vehiculo2'];
		$sql= "INSERT INTO vehiculo_chofer_viaje(idViaje,idChofer1,idVehiculo1,idChofer2,idVehiculo2) VALUES ('$idViaje','$idUsuario1','$idVehiculo1','$idUsuario2','$idVehiculo2')";
	}
	if($funcion=="insertar")
	{	
		$fecha = $_GET['fecha'];
		$origen = $_GET['origen'];
		$destino = $_GET['destino'];
		$carga = $_GET['carga'];
		$sql = "INSERT INTO viaje(fecha,origen,destino,tipo_carga) VALUES ('$fecha','$origen','$destino','$carga')";
	}
	
	

    $obj -> insertar($sql);
    header("Location: vista_viajes.php");  

    
?>