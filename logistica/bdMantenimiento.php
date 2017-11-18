<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    if($funcion!="eliminar"){
        $fkVehiculoM = $_POST['fkVehiculoM'];
        $fkMecanicoM = $_POST['fkMecanicoM'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_salida = $_POST['fecha_salida'];
        $costo = $_POST['costo'];
        $externo = $_POST['externo'];
        $repuestos = $_POST['repuestos'];
        $cod = $_POST['cod'];    
    }
    
    $obj = new controlDB();
    
    if($funcion == "modificar"){
        $sql = "UPDATE Mantenimiento 
            SET fkVehiculoM = '$fkVehiculoM',
                fecha_entrada = '$fecha_entrada',
                fecha_salida = '$fecha_salida',
                costo = '$costo',
                externo = '$externo',
                repuestos = '$repuestos'
            WHERE idMantenimiento = '$cod'";
    }
    
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM Mantenimiento 
            WHERE idMantenimiento = '$id'";
    } else {
       $sql = "INSERT INTO Mantenimiento(fkVehiculoM, fkMecanicoM, fecha_entrada, fecha_salida, costo, externo,repuestos)
       VALUES('$fkVehiculoM', '$fkMecanicoM', '$fecha_entrada', '$fecha_salida', '$costo', '$externo', '$repuestos')";
    }  
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    $obj -> insertar($sql);
    header("Location: vista_mantenimientos.php");

?>