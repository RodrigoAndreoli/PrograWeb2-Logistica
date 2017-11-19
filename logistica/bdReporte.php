<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_POST['funcion'];

    $fkChoferR = $_POST['fkChoferR'];
    $fkViajeR = $_POST['fkViajeR'];
    $tiempo = $_POST['tiempo'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $motivo = $_POST['motivo'];
    $km = $_POST['km'];
    $combustible = $_POST['combustible'];
    $descripcion = $_POST['descripcion'];

    $obj = new controlDB();

    if($funcion == "insertar") {
        $sql = "INSERT INTO Reporte(fkViajeR, fkChoferR, tiempo, latitud, longitud, motivo, km, combustible, descripcion)
        VALUES ('$fkViajeR', '$fkChoferR', '$tiempo', '$latitud', '$longitud', '$motivo', '$km', '$combustible', '$descripcion')";
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    $obj -> insertar($sql);
    header("Location: vista_reportes.php"); 
    exit();
        
?>