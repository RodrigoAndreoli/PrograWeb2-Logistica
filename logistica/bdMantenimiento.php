<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    if($funcion!="eliminar"){
        $idVehiculo = $_POST['idVehiculo'];
        $idMecanico = $_POST['idMecanico'];
        $tipo_vehiculo = $_POST['tipo_vehiculo'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_salida = $_POST['fecha_salida'];
        $km_unidad = $_POST['km_unidad'];
        $costo = $_POST['costo'];
        $externo = $_POST['externo'];
        $repuestos = $_POST['repuestos'];
        $cod = $_POST['cod'];    
    }
    
    $obj = new controlDB();
    
    if($funcion == "modificar"){
        $sql = "UPDATE mantenimiento 
            SET idVehiculo = '$idVehiculo', 
            tipo_vehiculo = '$tipo_vehiculo', 
            fecha_entrada = '$fecha_entrada', 
            fecha_salida = '$fecha_salida', 
            km_unidad = '$km_unidad', 
            costo = '$costo',
            externo = '$externo',
            repuestos = '$repuestos'
            WHERE idMantenimiento = '$cod'";
    }
    
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM mantenimiento 
            WHERE idMantenimiento='$id'";
    } else {
       $sql = "INSERT INTO mantenimiento(idVehiculo,idMecanico,tipo_vehiculo,fecha_entrada,fecha_salida,km_unidad,costo,externo,repuestos)
       VALUES('$idVehiculo','$idMecanico','$tipo_vehiculo','$fecha_entrada','$fecha_salida','$km_unidad','$costo','$externo','$repuestos')";
    }  
    $obj -> insertar($sql);
    header("Location: vista_mantenimientos.php");

?>