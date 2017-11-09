<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
	
    if($funcion!="eliminar"){
        $fecha = $_POST['fecha'];
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $carga = $_POST['carga'];
    }
	
    $obj = new controlDB();
    
     if($funcion == "modificar"){
        $sql = "UPDATE viaje
            SET fecha = '$fecha',
            origen = '$origen',
            destino = '$destino',
            WHERE idViaje = '$cod'";
    }else if($funcion == "eliminar"){
            $sql = "DELETE
                FROM viaje 
                WHERE idViaje='$id'";
    }else{
        $sql = "INSERT INTO viaje(fecha,origen,destino,tipo_carga) VALUES ('$fecha','$origen','$destino','$carga')"; 
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);

    $obj -> insertar($sql);
    header("Location: vista_viajes.php");  
?>