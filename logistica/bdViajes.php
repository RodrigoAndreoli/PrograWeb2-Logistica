<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $idV = $_REQUEST['idV'];
	$idU = $_REQUEST['idU'];
	$idVe = $_REQUEST['idVe'];
	$obj = new controlDB();
    
	
	
	
    if($funcion=="guardar"){
		$sql= "INSERT INTO vehiculo_chofer_viaje (idChofer,idViaje,idVehiculo) VALUES ('$idU','$idV','$idVe')";
	}
	else
	{
		$fecha = $_POST['fecha'];
		$origen = $_POST['origen'];
		$destino = $_POST['destino'];
		$carga = $_POST['carga'];
		$sql = "INSERT INTO viaje (fecha,origen,destino,tipo_carga) VALUES ('$fecha','$origen','$destino','$carga')";
	}
	

    $obj -> insertar($sql);
    header("Location: vista_viajes.php");  

    
?>