<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
	
    if($funcion!="eliminar"){
        $fkPresupuestoV = $_POST['fkPresupuestoV'];
        $fecha = $_POST['fecha'];
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $tipo_carga = $_POST['tipo_carga'];
        $cod = $_POST['cod']; 
    }
	
    $obj = new controlDB();
    
    if($funcion == "modificar"){
        $sql = "UPDATE Viaje
            SET fkPresupuestoV = '$fkPresupuestoV',
                fecha = '$fecha',
                origen = '$origen',
                destino = '$destino',
                tipo_carga = '$tipo_carga'
            WHERE idViaje = '$cod'";
    }else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM Viaje 
            WHERE idViaje='$id'";
    }else{
        $sql = "INSERT INTO Viaje(fkPresupuestoV, fecha, origen, destino, tipo_carga)
        VALUES('$fkPresupuestoV', '$fecha', '$origen', '$destino', '$tipo_carga')"; 
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);

    $obj -> insertar($sql);
    header("Location: vista_viajes.php");  
?>