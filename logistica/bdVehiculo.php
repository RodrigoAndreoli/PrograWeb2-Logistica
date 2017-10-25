<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    $obj = new controlDB();
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo_vehi = $_POST['tipo_vehi'];
    $patente = $_POST['patente'];
    $num_chasis = $_POST['num_chasis'];
    $num_motor = $_POST['num_motor'];
    $anio = $_POST['anio'];
    $kilometros = $_POST['kilometros'];   
    $cod = $_POST['cod']; 
    switch($funcion) {
        case 'modificar':
            $sql = "UPDATE Vehiculo
                SET marca = '$marca',
                    modelo = '$modelo',
                    tipo_vehiculo = '$tipo_vehi',
                    patente = '$patente',
                    nro_chasis = '$num_chasis',
                    km = '$kilometros',
                    anio = '$anio',
                    nro_motor = '$num_motor'
                WHERE idVehiculo = '$cod'";
            break;
        case 'eliminar':
            $sql = "DELETE
                FROM Vehiculo
                WHERE idVehiculo='$id'";
            break;
        case 'insertar':
            $sql = "INSERT INTO Vehiculo (marca,modelo,tipo_vehiculo,patente,nro_chasis,km,anio,nro_motor)
                VALUES('$marca','$modelo','$tipo_vehi','$patente','$num_chasis','$kilometros','$anio','$num_motor')";
            break;
    }
    $obj -> insertar($sql);
    header("Location: vehiculos.php"); 
?>