<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];

    if($funcion != "eliminar"){
        $fkPresupuestoV = $_POST['fkPresupuestoV'];
        $fecha = $_POST['fecha'];
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $tipo_carga = $_POST['tipo_carga'];
        $cod = $_POST['cod']; 
    }
	
    $obj = new controlDB();
    
    if($funcion == "eliminar"){
        $idPresupuesto = $_REQUEST['presupuesto'];
        $sql = "DELETE
            FROM Viaje 
            WHERE idViaje='$id'";
        $sql2 = "UPDATE Presupuesto
            SET aceptado = 'No'
            WHERE idPresupuesto = '$idPresupuesto'";
    } else {
        $sql = "INSERT INTO Viaje(fkPresupuestoV, fecha, origen, destino, tipo_carga, tiempo_total, combustible_total, km_total)
            VALUES('$fkPresupuestoV', '$fecha', '$origen', '$destino', '$tipo_carga', '00:00:00', 0.00, 0)"; 
        $sql2 = "UPDATE Presupuesto
            SET aceptado = 'Si'
            WHERE idPresupuesto = '$fkPresupuestoV'";
                 
    }
    
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
    $log->escribir($sql2);

    $obj -> insertar($sql);
    $obj -> insertar($sql2);
    header("Location: vista_presupuestos.php");  
?>