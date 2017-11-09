<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $idViaje = $_REQUEST['id'];

    $idChofer = $_POST['idUsuario'];
    $tiempo = $_POST['tiempo'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $motivo = $_POST['motivo'];
    $km = $_POST['km'];
    $combustible = $_POST['combustible'];
    $descripcion = $_POST['descripcion']; 

    $obj = new controlDB();

    if($funcion == "insertar") {
        $sql = "INSERT INTO Reporte_viaje(idViaje, idChofer, tiempo, latitud, longitud, motivo, km, combustible, descripcion) 
            VALUES ('$idViaje', '$idChofer', '$tiempo', '$latitud', '$longitud', '$motivo', '$km', '$combustible', '$descripcion')";
    }
    $obj -> insertar($sql);
    header("Location: vista_reportes.php"); 
    exit();
        
?>