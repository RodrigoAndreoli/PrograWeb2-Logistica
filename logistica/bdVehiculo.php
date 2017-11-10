<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    if($funcion!="eliminar"){
        $tipo_vehiculo = $_POST['tipo_vehiculo'];
        $patente = $_POST['patente'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $nro_chasis = $_POST['nro_chasis'];
        $nro_motor = $_POST['nro_motor'];
        $km = $_POST['km'];
        $cod = $_POST['cod']; 
    }

    $obj = new controlDB();

    if($funcion == "modificar"){
        $sql = "UPDATE Vehiculo
            SET tipo_vehiculo = '$tipo_vehiculo',
                patente = '$patente',
                marca = '$marca',
                modelo = '$modelo',
                anio = '$anio',
                nro_chasis = '$nro_chasis',
                nro_motor = '$nro_motor',
                km = '$km'
            WHERE idVehiculo = '$cod'";
    }

    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM Vehiculo
            WHERE idVehiculo='$id'";
    } else {
        $sql = "INSERT INTO Vehiculo(tipo_vehiculo, patente, marca, modelo, anio, nro_chasis, nro_motor, km)
        VALUES('$tipo_vehiculo', '$patente', '$marca', '$modelo', '$anio', '$nro_chasis', '$nro_motor', '$km')";
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    $obj -> insertar($sql);
    header("Location: vista_vehiculos.php"); 
?>