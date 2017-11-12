<?php
    $idUser = $_SESSION['idUsuario'];

    if($_POST){
        $buscar=trim($_POST['fkViajeR']);
    }
    if(empty($buscar)){
        $buscar="";
    } else {
        $datos = $obj -> consultar("SELECT U.nombre Nombre, R.tiempo Tiempo, R.longitud Longitud, R.latitud Latitud, R.motivo Motivo, R.descripcion Descripcion, R.km Kilometros, R.combustible Combustible
            FROM Reporte R
            JOIN Usuario U ON R.fkChoferR = U.idUsuario
            WHERE fkViajeR LIKE '%".$buscar."%'
            ORDER BY tiempo");
        $titulo = $obj -> consultar("SELECT DISTINCT R.fkViajeR Viaje, V.origen Origen, V.destino Destino, V.fecha Fecha
        FROM Reporte R
        JOIN Viaje V ON R.fkViajeR = V.idViaje
        WHERE fkViajeR LIKE '%".$buscar."%'");
    }

    $selectAdmin = $obj -> consultar("SELECT DISTINCT R.fkViajeR Viaje, V.origen Origen, V.destino Destino, V.fecha Fecha
        FROM Reporte R
        JOIN Viaje V ON R.fkViajeR = V.idViaje
        ORDER BY Viaje");

    $selectChofer = $obj -> consultar("SELECT DISTINCT R.fkViajeR Viaje, V.origen Origen, V.destino Destino, V.fecha Fecha
        FROM Reporte R
        JOIN Viaje V ON R.fkViajeR = V.idViaje
        JOIN Vehiculo_chofer_viaje T ON V.idViaje = T.fkViajeT
        WHERE T.fkChoferT = '$idUser'
            OR T.fkAcompanianteT = '$idUser'
        ORDER BY Viaje");
?>