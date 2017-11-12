<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];

    $obj = new controlDB();
    
     if($funcion=="asignar"){
		$fkViajeT = $_POST['fkViajeT'];
		$fkChoferT = $_POST['fkChoferT'];
		$fkAcompanianteT = $_POST['fkAcompanianteT'];
		$fkCamionT = $_POST['fkCamionT'];
		$fkAcopladoT = $_POST['fkAcopladoT'];
        $sql= "INSERT INTO Vehiculo_Chofer_viaje(fkViajeT, fkChoferT, fkAcompanianteT, fkCamionT, fkAcopladoT)
            VALUES('$fkViajeT', '$fkChoferT', '$fkAcompanianteT', '$fkCamionT', '$fkAcopladoT')";
        if($fkAcompanianteT == '0') {
            $sql= "INSERT INTO Vehiculo_Chofer_viaje(fkViajeT, fkChoferT, fkCamionT, fkAcopladoT)
                VALUES('$fkViajeT', '$fkChoferT', '$fkCamionT', '$fkAcopladoT')";
        }
        if($fkAcopladoT == '0') {
            $sql= "INSERT INTO Vehiculo_Chofer_viaje(fkViajeT, fkChoferT, fkAcompanianteT, fkCamionT)
                VALUES('$fkViajeT', '$fkChoferT', '$fkAcompanianteT', '$fkCamionT')";
        }
        if($fkAcompanianteT == '0' && $fkAcopladoT == '0') {
            $sql= "INSERT INTO Vehiculo_Chofer_viaje(fkViajeT, fkChoferT, fkCamionT)
                VALUES('$fkViajeT', '$fkChoferT', '$fkCamionT')";
        }
     }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);

    $obj -> insertar($sql);
    header("Location: vista_viajes.php");  
?>