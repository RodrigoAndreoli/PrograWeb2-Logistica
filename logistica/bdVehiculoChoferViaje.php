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
		//nico: actualizo el estado a 1 (tres estados 0 sin asignar - 1 asignado - 2 cerrado)
		
		
        // SI NO COMENTO EL UPDATE NO ARMA EL PDF ¿?
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
    $actualizaEstadoViaje = "UPDATE Viaje 
            SET estado = 1 
            WHERE idViaje = '$fkViajeT'";
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	$log->escribir($actualizaEstadoViaje);
    // TENGO QUE COMENTAR EL UPDATE 
	$obj -> insertar($sql);
	$obj -> insertar($actualizaEstadoViaje);  
    header("Location: vista_viajes.php");  
?>