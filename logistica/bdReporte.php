<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();

    $idChofer = $_SESSION['idUsuario'];
    
    $funcion = $_POST['funcion'];
    $idViaje = $_POST['idViaje'];
    $tiempo = $_POST['tiempo'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $motivo = $_POST['motivo'];
    $km = $_POST['km'];
    $combustible = $_POST['combustible'];
    $descripcion = $_POST['descripcion']; 

    $obj = new controlDB();

    if($funcion == "insertar") {
        $sql = "INSERT INTO Reporte_viaje(idViaje, idChofer, tiempo, latitud, longitud, motivo, km, combustible, descripcion) 
            VALUES ('$idViaje', '$idChofer', '$tiempo', '$latitud', '$longitud', '$motivo', '$km', '$combustible', '$descripcion')";
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    $obj -> insertar($sql);
    header("Location: vista_reportes.php"); 
    exit();
        
?>