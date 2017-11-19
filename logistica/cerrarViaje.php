<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $id = $_REQUEST['id'];
    $obj = new controlDB();

    $first = $obj -> consultar("SELECT km, tiempo
        FROM Reporte
        WHERE fkViajeR = '$id'
        ORDER BY idReporte ASC
        LIMIT 0,1");
    $last = $obj -> consultar("SELECT km, tiempo
        FROM Reporte
        WHERE fkViajeR = '$id'
        ORDER BY idReporte DESC
        LIMIT 0,1");
    $dato = $obj -> consultar("SELECT SUM(combustible) 
        FROM Reporte 
        WHERE fkViajeR = '$id'");
    
    $primer_tiempo = $first[0]['tiempo'];
    $ultimo_tiempo = $last[0]['tiempo'];
    $parser = $obj -> consultar("SELECT TIMEDIFF('$ultimo_tiempo', '$primer_tiempo')");
    $tiempo_total = $parser[0][0];
    $combustible_total = $dato[0][0];
    $km_total = $last[0]['km'] - $first[0]['km'];

    $sql = "UPDATE Viaje
        SET tiempo_total = '$tiempo_total',
            combustible_total = '$combustible_total',
            km_total = '$km_total',
            cerrado = 'Si'
        WHERE idViaje='$id'";

	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);

    $obj -> insertar($sql);
    header("Location: vista_viajes.php");

?>