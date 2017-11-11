<?php
    $idUser = $_SESSION['idUsuario'];

    if($_POST){
        $buscar=trim($_POST['fkViajeR']);
    }
    if(empty($buscar)){
        $buscar="";
    } else {
        $datos = $obj -> consultar("SELECT *
            FROM Reporte
            WHERE fkViajeR LIKE '%".$buscar."%'
            ORDER BY tiempo");
    }

    $selectA = $obj -> consultar("SELECT DISTINCT R.fkViajeR Viaje, V.origen Origen, V.destino Destino, V.fecha Fecha
        FROM Reporte R
        JOIN Viaje V ON R.fkViajeR = V.idViaje
        ORDER BY Viaje");

    $selectC = $obj -> consultar("SELECT DISTINCT R.fkViajeR Viaje, V.origen Origen, V.destino Destino, V.fecha Fecha
        FROM Reporte R
        JOIN Viaje V ON R.fkViajeR = V.idViaje
        JOIN Vehiculo_chofer_viaje T ON V.idViaje = T.fkViajeT
        WHERE T.fkChoferT = '$idUser'
            OR T.fkAcompanianteT = '$idUser'
        ORDER BY Viaje");
?>