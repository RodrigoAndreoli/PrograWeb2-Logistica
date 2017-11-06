<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];

    $obj = new controlDB();
    
     if($funcion=="asignar"){
		$idViaje = $_POST['id'];
		$idUsuario1 = $_POST['chofer1'];
		$idVehiculo1 = $_POST['vehiculo1'];
		$idUsuario2 = $_POST['chofer2'];
		$idVehiculo2 = $_POST['vehiculo2'];
		$sql= "INSERT INTO vehiculo_chofer_viaje(idViaje,idUsuario,idVehiculo,idUsuario2,idVehiculo2) VALUES ('$idViaje','$idUsuario1','$idVehiculo1','$idUsuario2','$idVehiculo2')";
	}

    $obj -> insertar($sql);
    header("Location: vista_usuarios.php");  

?>