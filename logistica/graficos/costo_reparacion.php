<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="  SELECT m.idVehiculo,v.patente AS patente,sum(m.costo) AS costo
            FROM mantenimiento m
            JOIN vehiculo v on v.idVehiculo = m.idVehiculo
            GROUP by m.idVehiculo";

    $resultado=$conexion->query($sql);
   // print_r($resultado);
    $dataTable=array(array("patente","costo"));

    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['patente'],(int)$fila['costo']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>